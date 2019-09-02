<?php

require 'class/Card.php';
require 'class/DbConnect.php';
require 'class/Send.php';
require 'class/Sex.php';
require 'class/Text.php';


class Can

{
    private $users;
    private $affirmations_male;
    private $affirmations_female;

    public function __construct()
    {
        $connection = new DbConnect();

        $request = "SELECT * FROM `user` WHERE `is_active` = 1";
        $this->users = $connection->db->query($request);

        $request2 = "SELECT * FROM `affirmation_male`";
        $response = $connection->db->query($request2);
        $this->affirmations_male = $response->fetch_all();


        $request3 = "SELECT * FROM `affirmation_female`";
        $this->affirmations_female = $connection->db->query($request3);
    }

    /*
     * Zwraca wszystkich użytkowników
     * */
    function getAllUsers()
    {
        return $this->users;
    }

    /*
     * Zwraca wszystkie afirmacje w rodzaju męskim
     * */
    function getAllAffirmationsMale()
    {
        return $this->affirmations_male;
    }

    /*
     * Zwraca wszystkie afirmacje w rodzaju żeńskim
     * */
    function getAllAffirmationsFemale()
    {
        return $this->affirmations_female;
    }

    /*
     * Pobiera wszystkie afirmacje otrzymane przez użytkownika z historii od początku
     * */
    private function getUserAffirmations($id_user)
    {
        $connection = new DbConnect();
        $user_affirmations = array();
        $query = "SELECT `id_affirmation`, `affirmation`, `author`, `user_rate`, am.date, am.time FROM `affirmation_male` am JOIN `history_user_affirmation` hua ON am.id_affirmation = hua.affirmation_id WHERE hua.user_id = '" . $id_user . "'";
        $exec = $connection->db->query($query);
        if ($exec) {
            $user_affirmations = $exec->fetch_all();
        }
        // Potrzebuję tutaj wynik przeszukania tabeli affirmation_male ze wszystkimi rekordami where user = $id_user and affirmation_id z przedziału wyznaczonego przez poprzednie zapytanie
        return $user_affirmations;
    }
    /*
     * Pobiera wszystkie afirmacje otrzymane przez użytkownika z historii od początku uszeregowane od  najnowszej
     * */
    function getLastUserAffirmations($id_user)
    {
        $connection = new DbConnect();
        $user_affirmations = array();
        $query = "SELECT 
                        `id_affirmation`, 
                        `affirmation`, 
                        `author`, 
                        `user_rate`, 
                        am.date, 
                        am.time, 
                        hua.date, 
                        hua.time 
                    FROM `affirmation_male` am 
                    JOIN `history_user_affirmation` hua 
                    ON am.id_affirmation = hua.affirmation_id 
                    WHERE hua.user_id = '" . $id_user . "' 
                    ORDER BY 
                        STR_TO_DATE(hua.date, '%d-%m-%Y') DESC, 
                        hua.time DESC";
        $exec = $connection->db->query($query);
        if ($exec) {
            $user_affirmations = $exec->fetch_all();
        }
        // Potrzebuję tutaj wynik przeszukania tabeli affirmation_male ze wszystkimi rekordami where user = $id_user and affirmation_id z przedziału wyznaczonego przez poprzednie zapytanie
        return $user_affirmations;
    }

    /*
     * Sprawdza, jakie afirmacje zostały użytkownikowi do wysłania.
     * Bierze tablicę wszystkich affirmacji ($arr) i afirmacji wysłanych użytkownikowi ($sent_to_user).
     * Usuwa z $arr afirmacje wysłane już do użytkownikowi na podstawie danych z funkcji getUserAffirmations
     * Jesli tablica wysłanych $sent_to_user jest pusta to przypisuje do niej wszystkie affirmacje do wysłania.
     * Zwraca tablicę z afirmacjami do niewysłanymi z wyzerowanymi indexami.
     * */
    function affirmationForUserToSent($id_user)
    {
        $affirmations = $this->affirmations_male;
        $sent_to_user = $this->getUserAffirmations($id_user);
        $arr = $affirmations;

        if ($sent_to_user) {
            foreach ($sent_to_user as $key => $value) {

                $sent = $value[0];
                foreach ($arr as $key2 => $value2) {
                    $affirm = $value2[0];
                    if($sent === $affirm) {
                        unset($arr[$key2]);
                    }
                }
            }
        } else {
            $arr = $affirmations;
        }
        return array_values($arr);
    }

    /*
     * Wysyła następną afirmację z listy danej osobie
     * zwraca id wysyłanej afirmacji
     * */
    function sendNextAffirmationToUser($id_user, $mail, $security, $genitive, $sex)
    {
        $send = new Send();
        $affirmation_left = $this->affirmationForUserToSent($id_user);

        // Jeśli wyczerpały się afirmację, to wyślij standardową i powiadomienie do administratora

        if ($affirmation_left){
            $affirmation_id = $affirmation_left[0][0];

            // Jeśli mężczyzna to wyślij werję męską.
            if($sex === 'm') {
                $affirmation_name = $affirmation_left[0][1];
            } else {
                // Jesli kobieta pobierz wersję żeńską afirmacji.
                $affirmation_name = $this->getFemaleVersionAffirmation($affirmation_id);
            }
        } else {
            $affirmation_name = "Możesz zmienić swoje życie.";
            $affirmation_id = null;
            $send->sendMail("a.kacprzak@mozesz.eu", "Brak nowych afirmacji",
                "Brak nowych afirmacji dla użytkownika o id = $id_user");
        }

        $subject = "[MOŻESZ] Skieruj myśli ku najlepszemu";
        $text = new Text();
        $message = $text->message($genitive, $affirmation_name, $mail, $security, $sex);

        // Tworzę jpeg z treścią afirmacji dla danej osoby.
        $card = new Card();
        $card->createCardWithCan($affirmation_name);

        // Przesyłam mejla z załącznikiem
        $send->sendMail($mail, $subject, $message, 'image/cards/mozesz.jpg');

        return $affirmation_id;
    }

    /*
     * Zapisuje wysłaną afirmację w tabeli z historią
     * */
    function saveSentAffirmationInHistory($user_id, $affirmation_id)
    {
        $date = date("d-m-Y");
        $time = date("H:i:s");
        $connection = new DbConnect();

        $query = "INSERT INTO `history_user_affirmation` SET `user_id` = '" . $user_id
            . "', `affirmation_id` = '" . $affirmation_id . "', `date` = '" . $date . "', `time`= '" . $time . "'";
        $connection->db->query($query);
    }

    /*
     * Pobiera żeńską wersję afirmacji z bazy w oparciu o $affirmation_id z affirmation_male
     * Zwracając żęńską formę afirmacji
     * */
    private function getFemaleVersionAffirmation($id_affirmation)
    {
        $connection = new DbConnect();
        $query = "SELECT * FROM `affirmation_female` WHERE `affirmation_male_id` = '" . $id_affirmation ."'";
        $response = $connection->db->query($query);
        $fem_affirm = $response->fetch_row();
        $fem_affirm_name = $fem_affirm[1];
        return $fem_affirm_name;
    }
}
