<?php
/*
 * Natychmiastowe wysyłanie nowego możesz.
 *
 * */

use Mozesz\MozeszNamespace\Can;
use Mozesz\MozeszNamespace\DbConnect;
use Mozesz\MozeszNamespace\Text;
use Mozesz\MozeszNamespace\Card;
use Mozesz\MozeszNamespace\Send;


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
    $save = $connection->db->query($icanQuery);

    // Pobieram wszystkich użytkowników

    $request = "SELECT `id_user`, `mail`, `security`, `name`, `sex`, `genitive` FROM `user` WHERE `is_active` = 1";
    $result = $connection->db->query($request);

    // Rozsyłam wszystkim użytkownikom "możesz"

    while ($row = $result->fetch_object()) {

        $id_user = $row->id_user;
        $mail = $row->mail;
        $security = $row->security;
        $genitive = $row->genitive;
        $sex = $row->sex;

        // Warunkuję formę afirmacji w zależności od płci

        $affirmation_name = '';
        if ($sex == 'k') {
            $affirmation_name = $icanFemale;
        } else {
            $affirmation_name = $ican;
        }

        $subject = "[MOŻESZ] Skieruj myśli ku najlepszemu";

        $text = new Text();
        $message = $text->message($genitive, $affirmation_name, $mail, $security, $sex);

        $card = new Card();
        $card->createCardWithCan($affirmation_name);

        $send = new Send();
        $send->sendMail($mail, $subject, $message, 'image/cards/mozesz.jpg');

        $save = new Can();
        $save->saveSentAffirmationInHistory($id_user, $lastAffirmId);
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
