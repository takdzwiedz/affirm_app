<?php
$mail = htmlentities($_GET['mail']);
$security = htmlentities($_GET['security']);
$security_check = "SELECT `id_user` FROM `user` WHERE `mail`='$mail' AND `security`='$security' AND `is_active`=1";

if(isset($_POST['unsubscribe'])) {
    $account = new Account();
    $account->deleteAccount($security_check);
    header("Location:index.php?page=goodbye");
}
if (isset($_POST['istay'])) {
    header("Location:index.php");
}
?>

<h3>Możesz wypisać się z projektu "Możesz - skieruj myśli ku najlepszemu"?</h3>

<form method="post">
    <button name="istay" type="">Mogę zostać</button>
    <button name="unsubscribe" type="submit">Mogę się wypisać</button>
</form>
