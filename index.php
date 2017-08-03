<?php
ob_start();  
require_once 'config/Config.php';
require_once 'config/Switch.php';
require_once 'lib/function.php';
?>

<html>
<head>
    <title>Mogę</title>
    <meta charset="UTF-8">
    <meta name="affirm_app" content="description and registration form for those who wants to believe they can">
    <meta name="keywords" content="">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="script/check_mail.js"></script>
</head>
<body>
    <h1>Mogę - skieruj myśli ku dobremu</h1>
    <h2>Słowa mają potężną moc</h2>
    <h4>Misja</h4>
    <p>
        Moje życie nigdy nie było tak dobre. Mój rozwój nigdy przedtem nie był 
        tak dynamiczny. Dostałem od ludzi bardzo wiele dobrego. Dziś chcę dawać 
        coś dobrego innym.  
    </p>     
    <h4>Cel</h4>
    <ul>
        <li>zamiana negatywnych nawyków myślowych na pozytywne</li>
        <li>inspirowanie do rozwoju</li>
        <li>pomaganie w wychodzeniu z czarnej d***</li>
    </ul>
    <h4>Jak to działa?</h4>
    <p>
        <i>„Człowiek jest tym, o czym myśli przez cały dzień”.</i> Te słowa 
        Ralpha Waldo Emersona, leżą u podstaw działania niniejszego programu. 
        Wierzę, że możemy zmienić swoje życie, poprzez zmianę swojego myślenia. 
        Służy temu wiele technik. Niniejsza polega na wprowadzaniu pozytywnych 
        treści do naszego umysłu. Po zarejestrowaniu na stronie codziennie 
        otrzymasz ode mnie jedną dobrą myśl dodającą Ci wiary w Twoje 
        możliwości. Technikę, którą się z Tobą dzielę stosuję od dwóch i pół 
        roku. Chętnie opowiem Ci jak zmieniła moje życie.
    </p>

    <?php
    require "page/$page.php";
    ob_end_flush();
    ?>
    
</body>
</html>

