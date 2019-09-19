<?php

namespace Mozesz\MozeszNamespace;

class Account
{
    function confAccount($security_check, $mail)
    {
        $db = new DbConnect();
        $con = $db->openConnection();
        $stm =$con->prepare($security_check);
        $stm->execute();

        //function confAccount checks if user exist and if true ...

        $confirmationMailMessage = "Voila!<br>"
            . "<p>Od dzisja, każdego dnia spodziewaj się od mnie jednego inspirującego, dodającego Ci sił \"Możesz\". Specjalnie dla Ciebie!<br><br>"
            . "Dobrego!<br><br>"
            . "Artur<br><br>"
            . "PS. <a href=\"https://www.youtube.com/watch?v=h5rMfLJKwIE&index=3&list=RDoImj_Wuh_UI\">Dedykacja dla Ciebie</a></p>";


        if ($stm->rowCount() == 1) {

            // ...activates user account
            $query = "UPDATE `user` SET `is_active` = 1 WHERE `mail`= :mail";
            $request = $con->prepare($query);
            $request->bindValue(':mail', $mail);
            $request->execute();
            // ...and send confiramtion e-mail to user
            $to = $mail;

            $conf_mail = new Send();
            $conf_mail->sendMail($to, "[MOŻESZ] Potwierdzenie rejestracji", $confirmationMailMessage);

            $notification_mail = new Send();
            $notification_mail_text = "Do projektu \"Możesz.eu - skieruj myśli ku najlepszemu\" doąłczyła nowa osoba. <br>" . "<a href='https://mysql-sh221499.super-host.pl/'>Sprawdź kto to, dodaj formę wołacza i określ, czy jest to kobieta, czy mężczyzna.</a><br>Administrator Systemu";
            $notification_mail->sendMail("a.kacprzak@mozesz.eu", "[MOŻESZ] - nowa osoba w systemie", $notification_mail_text);

            if (!$db) {
                echo '<span style="color:orange;">Błąd potwiedzenia. Skontaktuj się ze mną.</span>';
                die();
            }
        } else {
            echo '<span style="color:orange;">Konto zostało już potwierdzone lub niewłaściwe dane potwierdzenia.</span>';
            die();
        }
        $db->closeConnection();
    }

    /*
     * Function to delete account
     * */
    function deleteAccount($security_check)
    {
        $db = new DbConnect();
        $con = $db->openConnection();
        $rows =$con->prepare($security_check);
        $rows->execute();
        $id_user = $rows->fetch(\PDO::FETCH_ASSOC);
        if ($rows->rowCount() == 1) {

            $query = "DELETE FROM `user` WHERE `id_user` = :id_user";
            $row = $con->prepare($query);
            $row->bindValue(':id_user', $id_user['id_user']);
            $row->execute();
        }
        $db->closeConnection();
    }
}
