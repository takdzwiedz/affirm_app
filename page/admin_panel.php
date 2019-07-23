<?php
ob_start();

require_once 'config/Config.php';
require_once 'config/Switch.php';
require_once 'lib/function.php';

$sess = new MySession();
$sess->sessVer();

if (isset ($_GET['action']) && $_GET['action'] == 'logout' && !empty($_GET['action'])) {

    $sess->sessEnd();
}
?>

<h3>Panel Administracyjny</h3>
<a href="?page=admin_panel&action=logout">
    <button type="button">Wyloguj</button>
</a>
<ul class="nav nav-tabs nav-justified">
    <li class="active"><a data-toggle="tab" href="#home">WYŚLIJ "MOGĘ"</a></li>
    <li><a data-toggle="tab" href="#menu1">UŻYTKOWNICY</a></li>
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

</div>