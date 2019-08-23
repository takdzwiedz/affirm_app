<?php


class Text
{
    function message($genitive, $affirmation_name, $mail, $security, $sex)
    {
        $text = "Cześć $genitive," . "<h3>" . $affirmation_name . "</h3>" . "Dobrego dnia,<br>Artur Kacprzak<br><br>";
        $message = $this->footer($text, $sex, $mail, $security);
        return $message;
    }

    function footer($text, $sex, $mail, $security)
    {
        $sexFunc = new Sex();
        $text1 = $sexFunc->maleFemale($sex, 'Dostałaś', 'Dostałeś');
        $text2 = $sexFunc->maleFemale($sex, 'zapisałaś', 'zapisałeś');

        $footer = "<p style='font-size: 0.8em; color: gray'>$text1 tę wiadomość, bo $text2 się na stronie <a href=\"" . WITRYNA . "\" style='color: darkgray'>mozesz.eu</a>.<br>
        Jeśli nie chcesz więcej otrzymywać ode mnie afirmacji, możesz wypisać się z projektu klikając na <a style='color: darkgray' href=\"" . WITRYNA . "index.php?page=pre_goodbye&mail=$mail&security=$security\">ten link</a>.</p>";

        return $text . $footer;
    }
}
