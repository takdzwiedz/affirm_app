<?php

define('E_MAIL_ADMIN','artur@moge.org.pl');
define('SERVER','localhost');
define('USER','root');
define('PASSWORD','');
define('DB','affirm_app');
define('WITRYNA','http://localhost/affirm_app/');


function __autoload($className){ // funkcja zaczytuje klasy zaczytuje pliki 

    require 'class/'.$className.'.php';
    
}