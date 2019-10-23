<?php

namespace Mozesz\MozeszNamespace;

use PDO;

class Can

{
    private $users;
    private $affirmations_male;

    public function __construct()
    {
        $db = new DbConnect();
        $con = $db->openConnection();

        $query1 = "SELECT * FROM `user` WHERE `is_active` = 1";
        $request = $con->prepare($query1);
        $request->execute();
        $this->users = $request->fetchAll();

        $query2 = "SELECT * FROM `affirmation_male`";
        $request2 = $con->prepare($query2);
        $request2->execute();
        $this->affirmations_male = $request2->fetchAll();

        $db->closeConnection();
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
     * Pobiera wszystkie afirmacje otrzymane przez użytkownika z historii od początku
     * */
    private function getUserAffirmations($id_user)
    {
        $db = new DbConnect();
        $con = $db->openConnection();
        $user_affirmations = array();
        $query = "  SELECT 
                        `id_affirmation`, 
                        `affirmation`, 
                        `author`, 
                        `user_rate`, 
                        am.date, 
                        am.time 
                    FROM 
                         `affirmation_male` am 
                    JOIN `history_user_affirmation` hua 
                    ON am.id_affirmation = hua.affirmation_id 
                    WHERE hua.user_id = :id_user";

        $rows = $con->prepare($query);
        $rows->bindValue(':id_user', $id_user);
        $rows->execute();
        $result = $rows->fetchAll();
        if ($result) {
            $user_affirmations = $result;
        }
        // Potrzebuję tutaj wynik przeszukania tabeli affirmation_male ze wszystkimi rekordami where user = $id_user and affirmation_id z przedziału wyznaczonego przez poprzednie zapytanie
        $db->closeConnection();

        return $user_affirmations;
    }

    /*
     * Pobiera wszystkie afirmacje otrzymane przez użytkownika z historii od początku uszeregowane od  najnowszej
     * */
    function getLastUserAffirmations($id_user)
    {
        $db = new DbConnect();
        $con = $db->openConnection();
        $user_affirmations = array();
        $query = "SELECT 
                        `id_affirmation`, 
                        `affirmation`, 
                        `author`, 
                        `user_rate`, 
                        am.date as am_date, 
                        am.time as am_time, 
                        hua.date as hua_date, 
                        hua.time as hua_time
                    FROM `affirmation_male` am 
                    JOIN `history_user_affirmation` hua 
                    ON am.id_affirmation = hua.affirmation_id 
                    WHERE hua.user_id = :id_user
                    ORDER BY 
                        STR_TO_DATE(hua.date, '%d-%m-%Y') DESC, 
                        hua.time DESC";
        $request = $con->prepare($query);
        $request->bindValue(':id_user', $id_user);
        $request->execute();
        $result = $request->fetchAll();
        if ($result) {
            $user_affirmations = $result;
        }
        $db->closeConnection();
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
                $sent = $value['id_affirmation'];
                foreach ($arr as $key2 => $value2) {
                    $affirm = $value2['id_affirmation'];
                    if ($sent === $affirm) {
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
        if ($affirmation_left) {
            $affirmation_id = $affirmation_left[0]['id_affirmation'];

            // Jeśli mężczyzna to wyślij werję męską.
            if ($sex === 'm') {
                $affirmation_name = $affirmation_left[0]['affirmation'];
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

        $db = new DbConnect();
        $con = $db->openConnection();
        $query = "  INSERT INTO 
                        `history_user_affirmation` 
                    SET `user_id` = :user_id,
                        `affirmation_id` = :affirmation_id,
                        `date` = :date,
                        `time`= :time ";
        $request = $con->prepare($query);
        $request->bindValue(':user_id', $user_id);
        $request->bindValue(':affirmation_id', $affirmation_id);
        $request->bindValue(':date', $date);
        $request->bindValue(':time', $time);
        $request->execute();
        $db->closeConnection();
    }

    /*
     * Pobiera żeńską wersję afirmacji z bazy w oparciu o $affirmation_id z affirmation_male
     * Zwracając żęńską formę afirmacji
     * */
    private function getFemaleVersionAffirmation($id_affirmation)
    {
        $db = new DbConnect();
        $con = $db->openConnection();
        $query = "SELECT * FROM `affirmation_female` WHERE `affirmation_male_id` = :id_affirmation";
        $rows = $con->prepare($query);
        $rows->bindValue(':id_affirmation', $id_affirmation);
        $rows->execute();
        $fem_affirm = $rows->fetch(PDO::FETCH_ASSOC);
        $fem_affirm_name = $fem_affirm['affirmation'];
        $db->closeConnection();
        return $fem_affirm_name;
    }
}
