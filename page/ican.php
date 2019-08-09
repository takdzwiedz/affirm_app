<?php
/*
 * Natychmiastowe wysyłanie nowego możesz.
 *
 * */
require_once 'class/DbConnect.php';

if (isset($_POST['send_ican']) && !empty($_POST['ican_male']) && !empty($_POST['ican_female'])) {

    $ican = trim($_POST['ican_male']);
    $icanFemale = trim($_POST['ican_female']);
    $date = date("d-m-Y");
    $time = date("H:i:s");

    $icanQuery = "INSERT INTO `affirmation_male`(`affirmation`, `date`, `time`) VALUES ('$ican', '$date', '$time')";
    $connection = new DbConnect();
    $save = $connection->db->query($icanQuery);

    // Pobieram id affrimacji w tabeli z afirmacjami w rodzaju męskim

    $lastAffirmation = "SELECT * FROM `affirmation_male` ORDER BY `affirmation_male`.`id_affirmation` DESC LIMIT 1";
    $execute = $connection->db->query($lastAffirmation);
    $lastAffirmDetails = $execute->fetch_object();
    $lastAffirmId = $lastAffirmDetails->id_affirmation;

    // Umieszczam afirmację w tabeli z afirmacjami w rodzaju żeńskim

    $icanQuery = "INSERT INTO `affirmation_female`(`affirmation`, `date`, `time`, `affirmation_male_id`) VALUES ('$icanFemale', '$date', '$time', '$lastAffirmId')";

    $connection = new DbConnect();
    $save = $connection->db->query($icanQuery);

    // Pobieram wszystkich użytkowników

    $request = "SELECT `mail`, `security`, `name`, `sex`, `genitive` FROM `user` WHERE `is_active` = 1";
    $result = $connection->db->query($request);
    $lp = 0;

    // Rozsyłam wszystkim użytkownikom "możesz"
    $sendICan = new SendMail(E_MAIL_ADMIN);

    while ($row = $result->fetch_object()) {

        $to = $row->mail;
        $security = $row->security;
        $genitive = $row->genitive;
        $sex = $row->sex;

        // Warunkuję formę afirmacji w zależności od płci

        $icanText = '';
        if ($sex == 'k') {
            $icanText = $icanFemale;
        } else {
            $icanText = $ican;
        }

        $sexFunc = new Sex();
        $text1 = $sexFunc->maleFemale($sex, 'Dostałaś', 'Dostałeś');
        $text2 = $sexFunc->maleFemale($sex, 'zapisałaś', 'zapisałeś');

        $subject = "[MOŻESZ] Skieruj myśli ku najlepszemu";
        $message = "Cześć $genitive," . "<h3>" . $icanText . "</h3>" . "Dobrego dnia,<br>Artur Kacprzak<br><br>

        $text1 tę wiadomość, bo $text2 się na stronie mozesz.eu. 
        Jeśli nie chcesz więcej otrzymywać ode mnie afirmacji, możesz wypisać się z projektu klikając na <a href=\"" . WITRYNA . "index.php?page=goodbye&mail=$to&security=$security\">ten link</a>.";

        $sendICan->send($to, $subject, $message);
    }

    echo "<span> Brawo! <br> \"Możesz\" zostało wysłane!</span>";
}
?>
<div>
    <form method="post">
        <p class="send-ican">Treść "MOGĘ:</p>
        <input class="ican" type="text" name="ican_female" placeholder="forma żeńska"><br>
        <input class="ican" type="text" name="ican_male" placeholder="forma męska"><br><br>
        <button class="" type="submit" name="send_ican" value="wyslij">Wyślij</button>
    </form>
</div>

<?php
include_once 'ican_list.php';
?>