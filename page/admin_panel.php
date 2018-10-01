<<<<<<< HEAD
<?php
ob_start();

require_once 'config/Config.php';
require_once 'config/Switch.php';
require_once 'lib/function.php';

$sess = new MySession();
$sess->sessVer();

?>


<meta charset="UTF-8">
<meta name="affirm_app" content="description and registration form for those who wants to believe they can">
<meta name="keywords" content="">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="../script/check_mail.js"></script>
<link rel="stylesheet" href="../style/style.css">


<?php
if (isset ($_GET['action']) && $_GET['action'] == 'logout' && !empty($_GET['action'])) {

    $sess->sessEnd();
}
?>

<h3>Panel Administracyjny</h3>
<a href="?page=admin_panel&action=logout">
    <button type="button" class="btn btn-info btn-sm">Log out</button>
</a>
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">WYŚLIJ "MOGĘ"</a></li>
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

=======
<?php
ob_start();

require_once 'config/Config.php';
require_once 'config/Switch.php';
require_once 'lib/function.php';

$sess = new MySession();
$sess->sessVer();

?>


<meta charset="UTF-8">
<meta name="affirm_app" content="description and registration form for those who wants to believe they can">
<meta name="keywords" content="">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="../script/check_mail.js"></script>
<link rel="stylesheet" href="../style/style.css">


<?php
if (isset ($_GET['action']) && $_GET['action'] == 'logout' && !empty($_GET['action'])) {

    $sess->sessEnd();
}
?>

<h3>Panel Administracyjny</h3>
<a href="?page=admin_panel&action=logout">
    <button type="button" class="btn btn-info btn-sm">Log out</button>
</a>
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">WYŚLIJ "MOGĘ"</a></li>
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

>>>>>>> eb6469bb21ac537d4165bb85426722ec139273a2
