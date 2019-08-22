<?php
ob_start();
require_once 'config/Config.php';
require_once 'config/Switch.php';
require_once 'lib/function.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Możesz</title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon"/>
    <link href="MyCookie/MyCookie.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <title>Możesz</title>
</head>


<body cz-shortcut-listen="true">

<div>
    <a href="<?php echo WITRYNA ?>" style="text-decoration: none"><h1>Możesz</h1></a>
    <p class="claim">"Skieruj myśli ku najlepszemu"</p>
</div>

<div class="container">

    <div class="left">
        <p>Cel</p>
        <p>
            1. Wsparcie w wychodzeniu z życiowego klinczu<br>
            2. Zamiana negatywnych myśli na pozytywne<br>
            3. Wygrywanie z własnymi ograniczeniami<br>
            4. Inspirowanie do rozwoju<br>
        </p>

        <p>Jak to działa?</p>

        <p>U podstaw działania programu leżą dwie
            myśli: <q>Człowiek jest tym, o czym myśli przez
                cały dzień</q> Ralpha Waldo Emersona oraz <q>Jeżeli myślisz,
                że coś możesz lub czegoś nie możesz, to w obu przypadkach masz rację</q> Henry'ego
            Forda. Proste, prawda?
        </p>
        <p>Obietnica</p>
        <p>
            Wierzę, w zmianę swojego życia przez zmianę swojego
            myślenia. Służy temu wiele technik. Ta, którą
            udostępniam polega na codziennym wprowadzaniu
            pozytywnych treści do umysłu. Po zarejestrowaniu na stronie
            codziennie otrzymasz ode mnie jedną dobrą
            myśl dodającą Ci wiary w Twoje możliwości.
            Ja w Ciebie wierzę. Będę Ci o tym przypominał
            tak długo, aż Ty uwierzysz w siebie. Technikę tę stosuję
            z powodzeniem od trzech lat. Zmieniła moje życie w sposób
            niewyobrażalny. Chętnie opowiem o mojej
            zmianie w trakcie naszej znajomości.</p>
        <p class="podpis">Artur Kacprzak</p>
    </div>

    <div class="right">
        <?php
        require "page/$page.php";
        ob_end_flush();
        ?>
    </div>
    <div>
        <a target="_blank" rel="noopener noreferrer" href="http://elakrolikowska.pl/index.html" style="text-decoration: none">Projekt lejałtu: elakrolikowska.pl</a> </p>
    </div>
</div>


<script src="script/jquery-3.2.1.slim.min.js.pobrane"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="script/popper.min.js.pobrane"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="script/bootstrap.min.js.pobrane"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script>
<script src="script/check_mail.js"></script>

<script src="script/jquery-3.1.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="../script/check_mail.js"></script>

<div id="MyCookie">
    <div id="tekst"></div>
    <div id="close"></div>
</div>
<script src="MyCookie/MyCookie.js"></script>



</body>

</html>