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

    $db = new DbConnect();
    $con = $db->openConnection();
    $query1 = "INSERT INTO `affirmation_male`(`affirmation`, `date`, `time`) VALUES ('$ican', '$date', '$time')";
    $request = $con->prepare($query1);
    $request->execute();

    // Pobieram id affrimacji w tabeli z afirmacjami w rodzaju męskim

    $query2 = "SELECT * FROM `affirmation_male` ORDER BY `affirmation_male`.`id_affirmation` DESC LIMIT 1";
    $request2 = $con->prepare($query2);
    $request2->execute();
    $result = $request2->fetchObject();

    $lastAffirmId = $result->id_affirmation;

    // Umieszczam afirmację w tabeli z afirmacjami w rodzaju żeńskim

    $query3 = "INSERT INTO `affirmation_female`(`affirmation`, `date`, `time`, `affirmation_male_id`) 
                VALUES (:icanFemale, :date, :time, :lastAffirmId)";
    $request3 = $con->prepare($query3);
    $request3->execute(array(
            ':icanFemale' => $icanFemale,
            ':date' => $date,
            ':time' => $time,
            ':lastAffirmId' => $lastAffirmId
    ));

    // Pobieram wszystkich użytkowników

    $query4 = "SELECT `id_user`, `mail`, `security`, `name`, `sex`, `genitive` FROM `user` WHERE `is_active` = 1";
    $request4 = $con->prepare($query4);
    $request4->execute();

    // Rozsyłam wszystkim użytkownikom "możesz"

    while ($row = $request4->fetch(PDO::FETCH_ASSOC)) {

        $id_user = $row['id_user'];
        $mail = $row['mail'];
        $security = $row['security'];
        $genitive = $row['genitive'];
        $sex = $row['sex'];

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
    $db->closeConnection();

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
