<?php

$mail = htmlentities($_GET['mail']);
$security = htmlentities($_GET['security']);
$security_check="SELECT `id_user` FROM `user` WHERE `mail`='$mail' AND `security`='$security' AND `is_active`=0";
$account = new Account();
$account->confAccount($security_check, $mail);

?>


<h4>Brawo!</h4>
<p>
    To wspaniała decyzja!<br> 
    Rozpoczynasz dziś niesamowitą podróż, która odmieni Twoje życie. Zaczynamy?!<br> 
    Jasne, że tak! A teraz przeczytaj i zapamętaj:<br>
</p>
    <h3>Możesz zmienić swoje życie!</h3>
<p>
    Od dzisiaj możesz zacząć przyzwyczajać się do tej myśli.<br>
    Dobrego,<br>
    Artur
</p>