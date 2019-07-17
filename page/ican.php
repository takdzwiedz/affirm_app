<?php

require_once 'class/DbConnect.php';

if (isset($_POST['send_ican']) && !empty($_POST['ican'])) {

    $ican = trim($_POST['ican']);
    $date = date("d-m-Y");
    $time = date("H:i:s");

    $icanQuery = "INSERT INTO `affirmation`(`affirmation`, `date`, `time`) VALUES ('$ican', '$date', '$time')";
    $insert = new DbConnect();
    $save = $insert->db->query($icanQuery);

    $connection = new DbConnect();
    $request = "SELECT `mail`, `security`, `name`, `genitive` FROM `user` WHERE `is_active` = 1";
    $result = $connection->db->query($request);
    $lp = 0;


    $sendICan = new SendMail(E_MAIL_ADMIN);

    while ($row = $result->fetch_object()) {


        $to = $row->mail;
        $name = $row->name;
        $security = $row->security;
        $genitive = $row->genitive;

        $subject = "[MOŻESZ] od Artura Kacprzaka";
        $message = "Cześć $genitive," . "<h3>" . $ican . "</h3>" . "Dobrego dnia,<br>Artur Kacprzak<br><br>

        Dostałaś / Dostałeś tą wiadomość, bo zapisałaś / zapisałeś się na stronie mozesz.eu. 
        Jeśli nie chcesz więcej otrzymywać \"możesz\" ode mnie, możesz wypisać się z mozesz.eu klikając na <a href=\"" . WITRYNA . "index.php?page=goodbye&mail=$to&security=$security\">ten link</a>.";

        $sendICan->send($to, $subject, $message);
    }


//    $sendMail->send($to, , $message);

    echo "<span> Brawo! <br> \"Możesz\" zostało wysłane!</span>";
}
?>
<form method="post">
    <p>Treść "MOGĘ:</p>
    <input class="ican" type="text" name="ican"><br><br>
    <button class="" type="submit" name="send_ican" value="wyslij">Wyślij</button>
</form>