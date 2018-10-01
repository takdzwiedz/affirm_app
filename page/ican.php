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
        $message = "Cześć $genitive,<br>" . "<h3>" . $ican . "</h3>" . "<br>Dobrego dnia,<br>Artur Kacprzak<br><br>Dostałaś / Dostałeś tą wiadomość, bo zapisałaś / zapisałeś się na stronie mozesz.eu. Jeśli nie chcesz otrzymywać
        więcej afirmacji rozpoczynającej się od słowa \"możesz\", napisz do mnie majla na adres a.kacprzak@mozesz.eu<br><br>
        <i>P.S. Wiem, że majl wygląda bardzo surowo. Ale to absoutnie pierwsze wysyłane przeze mnie afirmacje od chwili, w której zrodził się ten pomysł.
        Z każdym tygodniem będę poprawiał stronę wizualną i funkcjonalną strony mozesz.eu. Po prostu chciałem wykonać ten pierwszy krok. Jest może jeszcze chwiejny i niepewny, 
        ale jest i każdy następny bedzie lepszy. Dziękuję Ci za to, że jesteś ze mną w chwili kolejnej fazy narodzin tego pomysłu - pierwszej wysyłki. Początkowa seria \"Możesz\" będzie miała charakter  testowy.
        Proszę pozostań ze mną, nawet, jeśli niekiedy zdarzy się błąd, dostaniesz kilka mejli naraz lub afiramcje będą się powtarzać. Dzięki temu projektowi uczę się także programowania. Cóż mogę dodać na koniec.
        Jestem bardzo szczęśliwy i chcę Cię tym obdarować.</i>";
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