<?php

$page = 'form';
$title = '';

if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {

        case('goodbye'):

            $page = 'goodbye';
            $title = '';
            break;


        case('form'):

            $page = 'form';
            $title = '';
            break;

        case('thx');

            $page = 'thx';
            $title = '';
            break;

        case('confirmation');

            $page = 'confirmation';
            $title = '';
            break;

        case('login');

            $page = 'login';
            $title = '';
            break;

        case('admin_panel');

            $page = 'admin_panel';
            $title = '';
            break;

        default:

            $page = 'form';
            $title = '';
    }
}