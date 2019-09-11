<?php

define('E_MAIL_ADMIN', '');
define('SERVER', '');
define('USER', '');
define('PASSWORD', '');
define('DB', ''); // nazwa bazy
define('WITRYNA', '');

function __autoload($className)
{
    require 'class/' . $className . '.php';
}