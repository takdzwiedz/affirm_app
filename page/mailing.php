<?php

$can = new Can();
$users = $can->getAllUsers();
$today = $date = date("d-m-Y");
echo "today:" . $today;

while ($row = $users->fetch_object()) {

    // ZABEZPIECZENIE PRZED WIELOKROTNYM ODPALANIEM CRON'A

    // Pobieram historię wszystkich wysłanych do osoby afirmacji @uha uszeregowane od ostatniej wysłanej z datą wysłania
    $uha = $can->getLastUserAffirmations($row->id_user);
debug($uha);
    // Ostania wysłana afirmacja - najświeższa
    if($uha) {
        $uha_latest = $uha[0];
    }

    echo "<br>". $uha_latest[8];
    // WYSYŁKA AFIRMACJI

    // Wysyłaj, jeżeli data wysyłki ostatniej afirmacji ($uha_latest[6]) jest wcześniejsza od dzisiejszej $today

    if ($uha_latest[6] < $today OR !$uha) {
        echo "Hurra!<br>";
        $next_affiramtion = $can->sendNextAffirmationToUser($row->id_user, $row->mail, $row->security, $row->genitive, $row->sex);

        // ZAPIS WYSŁANEJ AFIMRACJI W HISTORII UŻYTKOWNIKA
        if($next_affiramtion) {
            $can->saveSentAffirmationInHistory($row->id_user, $next_affiramtion);
        }
    }
}
