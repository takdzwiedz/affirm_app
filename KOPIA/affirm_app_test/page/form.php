<?php
require_once 'config/Config.php';
if(isset($_POST['send'])){
    
    $name= htmlentities(trim($_POST['name']));
    $city=htmlentities(trim($_POST['city']));
    $mail=htmlentities(trim($_POST['mail']));
    $security = sha1(uniqid());
    $date = date("Y-m-d H:i:s");
    
    //Validation
    
    $validate = new Validate();
    $validate->ifEmpty($name, 'imie');
    $validate->ifEmpty($city, 'miasto');
    $validate->goodEmail($mail, 'e-mail');
    $validate->ifExist($mail);
    
    //Data collection to insert to database
    
    $db_connection = new DbConnect();
    $insert = "INSERT INTO `user`(`name`, `city`, `mail`, `date`, `is_active`, `security`) VALUES ('$name','$city','$mail','$date','0','$security')";
    
    //If validation is fine new user is saved in database ...  
    
    if($validate->countErrors==0){
        $save =  $db_connection->db->query($insert);
        
        // ... and sends e-mail to user with request for confirmation
        
        $sendMail = new SendMail(E_MAIL_ADMIN);
        $to = $mail;
        $message = "Witaj ponownie!<br><br>"
                . "Aby potwierdzić swoją rejestrację kliknij na <b><a href=\"".WITRYNA."index.php?page=confirmation&mail=$mail&security=$security\">link</a></b>.<br><br>"
                . "Artur<br><br>"
                . "PS. Jeżeli nie rejestrowałeś się na stronie moge.org.pl ale zaciekawiło Cię co możesz, też możesz kliknąć na link.<br>"
                . "PPS. Jeśli nie rejestrowałeś się na stronie moge.org.pl i nie chcesz tego robić, po prostu zignoruj tego mejla. <br>";
        $sendMail->send($to, GREETINGS_MAIL_SUBJECT, $message);    
        // In the and it displays user page with greetings
        header('Location:index.php?page=thx');
    }  
}
?>

<h4>A teraz MOŻESZ się zarejstrować:</h4>
<?php unset ($validate); ?>
<form method="POST">
    <input type="text" name="name" placeholder="imię"><br><br>
    <input type="text" name="city" placeholder="miasto"><br><br>
    <input type="text" name="mail" id="mail" placeholder="e-mail"><span id="mailSpan"></span><br><br>
    <button type="submit" class="btn btn-primary" type="submit" name="send" value="Wyślij">Wyślij</button>
</form>

