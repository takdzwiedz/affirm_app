<?php

$mail = htmlentities($_GET['mail']);
$security = htmlentities($_GET['security']);
$security_check="SELECT `id_user` FROM `user` WHERE `mail`='$mail' AND `security`='$security' AND `is_active`=0";
$account = new Account();
$account->confAccount($security_check, $mail);

?>


<p>Brawo!</p>
<p>
    To wspaniała decyzja!<br> 
    Rozpoczynasz dziś niesamowitą podróż, która odmieni Twoje życie. Zaczynamy?!<br> 
    Jasne, że tak! A teraz przeczytaj i zapamętaj:<br>
</p>
<p><b>Możesz zmienić swoje życie!</b></p>
<p>
    Zacznij przyzwyczajać się do najlepszego!<br>
   
<p class="podpis">Artur</p>
</p>