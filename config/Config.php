<?php


/*
 * Stałe
 * */

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


/*
 * Autoloader do pakietów z kompozera
 * */

require 'vendor/autoload.php';

/*
 * Autoloader do klas, źródło: https://www.php-fig.org/psr/psr-4/
 * */

spl_autoload_register(function ($class) {

    // project-specific namespace prefix
    $prefix = 'Mozesz\\MozeszNamespace\\';
    // base directory for the namespace prefix
    $base_dir = __DIR__ . '/class/';

    // Local
    $new_base_dir = strstr(__DIR__, '\\config', true). '/class/';
    // Production
    // $new_base_dir = strstr(__DIR__, '/config', true). '/class/';

    $len = strlen($prefix);

    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }
    // get the relative class name
    $relative_class = substr($class, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $new_base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});
