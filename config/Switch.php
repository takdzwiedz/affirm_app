<?php

$page = 'form';
$title = '';

if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {

        case('cron_card_test'):

            $page = 'cron_card_test';
            $title = 'Test karty i krona';
            break;

        case('mailing'):

            $page = 'mailing';
            $title = 'Mailing';
            break;

        case('goodbye'):

            $page = 'goodbye';
            $title = 'Strona na do widzenia';
            break;


        case('form'):

            $page = 'form';
            $title = 'Formularz';
            break;

        case('thx');

            $page = 'thx';
            $title = 'Podziękowanie za rejestrację';
            break;

        case('confirmation');

            $page = 'confirmation';
            $title = 'Potwierdzenie rejestracji';
            break;

        case('login');

            $page = 'login';
            $title = 'Logowanie do PA';
            break;

        case('admin_panel');

            $page = 'admin_panel';
            $title = 'Panel Administracyjny';
            break;

        default:

            $page = 'form';
            $title = 'Formularz zgłoszeniowy';
    }
}