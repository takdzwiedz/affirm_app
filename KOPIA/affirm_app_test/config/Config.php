<?php

define('E_MAIL_ADMIN','artur@mozesz.eu');
define('SERVER','localhost');
define('USER','23062460_mozesz');
define('PASSWORD','UwierzZeMozesz2017!@#$');
define('DB','23062460_mozesz');
define('WITRYNA',"http://serwer1765054.home.pl/affirm_app/");

define('GREETINGS_MAIL_SUBJECT',"Możesz potwierdzić rejestrację na stronie mogę.org.pl");

define('CONFIRMATION_MAIL_SUBJECT',"[MOŻESZ] Potwierdzenie rejestracji");
define('CONFIRMATION_MAIL_MESSAGE',"Voila!<br><br>"
    ."<p>Od dzisja, każdego dnia MOŻESZ spodziewać się od mnie jednego inspirującego, dodającego Ci sił \"MOGĘ\". Specjalnie dla Ciebie!<br><br>"
    ."Dobrego!<br><br>"
    ."Artur<br><br>"
    ."PS. Acha! Jestem też miłośnikiem muzyki. <a href=\"https://www.youtube.com/watch?v=h5rMfLJKwIE&index=3&list=RDoImj_Wuh_UI\">Dedykacja dla Ciebie</a> :)</p>");

function __autoload($className){ // funkcja zaczytuje klasy zaczytuje pliki 

    require 'class/'.$className.'.php';
    
}