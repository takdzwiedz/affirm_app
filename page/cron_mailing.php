<?php


$notification_mail = new SendMail(E_MAIL_ADMIN);
$notification_mail_text = "Test crona ".date("H:i:s, d-m-Y");
$notification_mail->send("art.kacprza@gmail.com", "[MOŻESZ] - test crona", $notification_mail_text);

echo date("H:i:s, d-m-Y");