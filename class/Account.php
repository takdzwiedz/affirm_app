<?php

class Account extends DbConnect
{
    function confAccount($security_check, $mail)
    {
        $wynik = $this->db->query($security_check);

        //function confAccount checks if user exist and if true ...

        if ($wynik->num_rows == 1) {

            // ...activates user account
            $user_confirmation = "UPDATE `user` SET `is_active` = 1 WHERE `mail`='$mail'";
            $confirmation = $this->db->query($user_confirmation);
            // ...and send confiramtion e-mail to user
            $to = $mail;
            $confirmation_mail = new SendMail(E_MAIL_ADMIN);
            $confirmation_mail->send($to, CONFIRMATION_MAIL_SUBJECT, CONFIRMATION_MAIL_MESSAGE);

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