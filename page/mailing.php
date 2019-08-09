<?php


$can = new Can();
$users = $can->getAllUsers();

while ($row = $users->fetch_object()) {

    $next_affiramtion = $can->sendNextAffirmationToUser($row->id_user, $row->mail, $row->security, $row->genitive, $row->sex);
    if($next_affiramtion) {
        $can->saveSentAffirmationInHistory($row->id_user, $next_affiramtion);
    }
}

