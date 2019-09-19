<?php

use Mozesz\MozeszNamespace\Can;

$can = new Can();
$users = $can->getAllUsers();
$today = $date = date("d-m-Y");
echo "today: " . $today . "<hr>";

foreach ($users as $row) {


    // ZABEZPIECZENIE PRZED WIELOKROTNYM ODPALANIEM CRON'A

    // Pobieram historię wszystkich wysłanych do osoby afirmacji @uha uszeregowane od ostatniej wysłanej z datą wysłania
    $uha = $can->getLastUserAffirmations($row['id_user']);
    // Ostania wysłana afirmacja - najświeższa

    if ($uha) {
        $uha_latest = $uha[0];
    } else {
        $uha_latest = null;
    }

    // WYSYŁKA AFIRMACJI

    // Wysyłaj, jeżeli data wysyłki ostatniej afirmacji ($uha_latest[6]) jest wcześniejsza od dzisiejszej $today

    if (strtotime($uha_latest['hua_date']) < strtotime($today) OR !$uha) {
        $next_affirmation = $can->sendNextAffirmationToUser($row['id_user'], $row['mail'], $row['security'], $row['genitive'], $row['sex']);

        // ZAPIS WYSŁANEJ AFIMRACJI W HISTORII UŻYTKOWNIKA
        if ($next_affirmation) {
            $can->saveSentAffirmationInHistory($row['id_user'], $next_affirmation);
        }
    }
}
