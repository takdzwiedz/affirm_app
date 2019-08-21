<?php

class Account extends DbConnect
{
    function confAccount($security_check, $mail)
    {
        $wynik = $this->db->query($security_check);

        //function confAccount checks if user exist and if true ...

        $confirmationMailMessage = "Voila!<br>"
            . "<p>Od dzisja, każdego dnia spodziewaj się od mnie jednego inspirującego, dodającego Ci sił \"Możesz\". Specjalnie dla Ciebie!<br><br>"
            . "Dobrego!<br><br>"
            . "Artur<br><br>"
            . "PS. <a href=\"https://www.youtube.com/watch?v=h5rMfLJKwIE&index=3&list=RDoImj_Wuh_UI\">Dedykacja dla Ciebie</a></p>";


        if ($wynik->num_rows == 1) {

            // ...activates user account
            $user_confirmation = "UPDATE `user` SET `is_active` = 1 WHERE `mail`='$mail'";
            $confirmation = $this->db->query($user_confirmation);
            // ...and send confiramtion e-mail to user
            $to = $mail;
            $confirmation_mail = new SendMail(E_MAIL_ADMIN);
            $confirmation_mail->send($to, "[MOŻESZ] Potwierdzenie rejestracji", $confirmationMailMessage);

            $notification_mail = new SendMail(E_MAIL_ADMIN);
            $notification_mail_text = "Do projektu \"Możesz.eu - skieruj myśli ku najlepszemu\" doąłczyła nowa osoba. <br>" . "<a href='https://mysql-sh221499.super-host.pl/'>Sprawdź kto to, dodaj formę wołacza i określ, czy jest to kobieta, czy mężczyzna.</a><br>Administrator Systemu";
            $notification_mail->send("a.kacprzak@tu-i-teraz.com.pl", "[MOŻESZ] - nowa osoba w systemie", $notification_mail_text);

            if (!$confirmation) {
                echo '<span style="color:orange;">Błąd potwiedzenia. Skontaktuj się ze mną.</span>';
                die();
            }
        } else {
            echo '<span style="color:orange;">Konto zostało już potwierdzone lub niewłaściwe dane potwierdzenia.</span>';
            die();
        }
    }

    /*
     * Function to delete account
     * */
    function deleteAccount($security_check)
    {
        $wynik = $this->db->query($security_check);
        $result = $wynik->fetch_row();
        if ($wynik->num_rows == 1) {
            $user_delete = "DELETE FROM `user` WHERE `id_user` = '" . $result[0] . "'";
            $this->db->query($user_delete);
        }
    }
}