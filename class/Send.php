<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

class Send
{


    function sendMail ($email, $subject, $message, $attachment_path = 'image/cards/mozesz.jpg')

    {
        echo $email, $subject, $message, $attachment_path;

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
        $mail->SetLanguage("pl", 'includes/phpMailer/language/');
        $mail->CharSet = "utf-8";

        try {
            //Server settings
            $mail->SMTPDebug = 2;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = '';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = '';                     // SMTP username
            $mail->Password   = '';                               // SMTP password
            $mail->SMTPSecure = '';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = '';                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('', '');
            $mail->addAddress($email);     // Add a recipient

            // Attachments
            $mail->addAttachment($attachment_path);         // Add attachments

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;
            $mail->AltBody = $message;

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
