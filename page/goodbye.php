<?php
$mail = htmlentities($_GET['mail']);
$security = htmlentities($_GET['security']);
$security_check = "SELECT `id_user` FROM `user` WHERE `mail`='$mail' AND `security`='$security' AND `is_active`=1";
$account = new Account();
$account->deleteAccount($security_check);

?>

<p>Dziękuję Ci, za wspólnie spędzony czas.</p>
<p>Jestem pewien, że odnajdziesz to czego szukasz, w innym miejscu.</p>
<p>A w przypadku zmiany zdania, zapraszam z powrotem.</p>
<p>Wszystkiego dobrego!</p>
<p>Artur Kacprzak</p>
