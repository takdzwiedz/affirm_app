<?php

class Account extends DbConnect
{
    function confAccount($security_check, $mail)
    {
        $wynik = $this->db->query($security_check);

        //function confAccount checks if user exist and if true ...

        $confirmationMailMessage = "Voila!<br><br>"
            . "<p>Od dzisja, każdego dnia MOŻESZ spodziewać się od mnie jednego inspirującego, dodającego Ci sił \"MOŻESZ\". Specjalnie dla Ciebie!<br><br>"
            . "Dobrego!<br><br>"
            . "Artur<br><br>"
            . "PS. Acha! Jestem też miłośnikiem muzyki. <a href=\"https://www.youtube.com/watch?v=h5rMfLJKwIE&index=3&list=RDoImj_Wuh_UI\">Dedykacja dla Ciebie</a> :)</p>";


        if ($wynik->num_rows == 1) {

            // ...activates user account
            $user_confirmation = "UPDATE `user` SET `is_active` = 1 WHERE `mail`='$mail'";
            $confirmation = $this->db->query($user_confirmation);
            // ...and send confiramtion e-mail to user
            $to = $mail;
            $confirmation_mail = new SendMail(E_MAIL_ADMIN);
            $confirmation_mail->send($to, "[MOŻESZ] Potwierdzenie rejestracji", $confirmationMailMessage);

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