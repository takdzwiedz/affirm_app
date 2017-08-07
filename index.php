<?php
ob_start();  
require_once 'config/Config.php';
require_once 'config/Switch.php';
require_once 'lib/function.php';
?>

<html>
<head>
    <title>Możesz</title>
    <meta charset="UTF-8">
    <meta name="affirm_app" content="description and registration form for those who wants to believe they can">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="script/check_mail.js"></script>
    <style>
        body{
          background-color: skyblue;
          color: white;
          text-shadow: 2px 2px 2px rgba(150, 150, 150, 1);
        }
    </style>
</head>
<body>
    <h1>Możesz - skieruj myśli ku dobremu</h1>
    <h2>Słowa mają potężną moc</h2>
    <h4>Misja</h4>
    <p>
        Moje życie nigdy nie było tak dobre. Mój rozwój nigdy przedtem nie był 
        tak dynamiczny. Dostałem od ludzi bardzo wiele dobrego. Dziś chcę dawać 
        coś dobrego innym.  
    </p>     
    <h4>Cel</h4>
    <ul>
        <li><u>wsparcie</u> w wychodzeniu z czarnej d***</li>
        <li><u>zamiana</u> negatywnych nawyków myślowych na <u>pozytywne</u></li>
        <li><u>wygrywanie</u> z własnymi ograniczeniami</li>
        <li><u>inspirowanie</u> do rozwoju</li>
    </ul>
    <h4>Jak to działa?</h4>
    <p>
        U podstaw działania tego programu leżą dwie myśli: <i>Jeżeli myślisz, 
        że coś możesz lub czegoś nie możesz, za każdym razem masz rację</i> 
        Henry'ego Forda oraz <i>„Człowiek jest tym, o czym myśli przez cały 
        dzień”.</i> Ralpha Waldo Emersona. 
        Wierzę, że możemy zmienić swoje życie przez zmianę swojego myślenia.
        Służy temu wiele technik. Ta, którą Ci dziś udostępniam polega na 
        wprowadzaniu pozytywnych treści do naszego umysłu. Stale i systematycznie. 
        Po zarejestrowaniu na stronie codziennie otrzymasz ode mnie jedną dobrą 
        myśl dodającą Ci wiary w Twoje możliwości. Ja w Ciebie wierzę. I będę 
        Ci o tym przypominał tak długo, jak Ty uwierzysz w sebie. Technikę którą
        Ci dziś udostępniam stosuję z powodzeniem od dwóch i pół roku. Zmieniła 
        moje życie w sposób niewyobrażalny. Chętnie opowiem o mojej zmianie w 
        trakcie naszej znajomości.
    </p>

    <?php
    require "page/$page.php";
    ob_end_flush();
    ?>
    
</body>
</html>