<!-- FORM DISPLAY -->
<?php

require_once 'config/Config.php';

if (isset($_POST['send_ican']) && !empty($_POST['ican'])) {

    $ican = trim($_POST['ican']);
    $date = date("d-m-Y");
    $time = date("H:i:s");

    $icanQuery = "INSERT INTO `affirmation`(`affirmation`, `date`, `time`) VALUES ('$ican', '$date', '$time')";
    $insert = new DbConnect();
    $save = $insert->db->query($icanQuery);

    $connection = new DbConnect();
    $request = "SELECT `mail` FROM `user` WHERE `is_active` = 1";
    $result = $connection->db->query($request);
    $lp = 0;

    $sendICan = new SendMail(E_MAIL_ADMIN);

    while ($row = $result->fetch_object()) {
        $to=$row->mail;
        $message = "Cześć!";
        $subject = $ican;
        $sendICan->send($to, $subject, $message);
    }


//    $sendMail->send($to, , $message);

    echo "<span> Brawo! <br> \"Mogę\" zostało wysłane!</span>";
}
?>
<form method="post">
    <p>Treść "MOGĘ:</p>
    <input class="ican" type="text" name="ican"><br><br>
    <button type="submit" class="btn btn-primary" type="submit" name="send_ican" value="wyslij">Wyślij</button>
</form>