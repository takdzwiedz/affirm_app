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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="script/check_mail.js"></script>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <h1>Możesz - skieruj myśli ku dobremu</h1>
    <h2>Panel Administracyjny</h2>

    <ul class="nav nav-tabs" >
        <li class="active" ><a data-toggle="tab" href="#home" >WYŚLIJ "MOGĘ"</a></li>
        <li><a data-toggle="tab" href="#menu1">UŻYTKOWNICY</a></li>
        <li><a data-toggle="tab" href="#menu2">MOGĘ WYSŁANE</a></li>
        
    </ul>

    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <?php 
            include_once 'ican.php'; 
            ?>
        </div>
        
        <div id="menu1" class="tab-pane fade">
            <?php 
            include_once 'users.php'; 
            ?>
        </div>

        <div id="menu2" class="tab-pane fade">
            <?php 
            include_once 'ican_list.php'; 
            ?>
        </div>
    </div>
</body>