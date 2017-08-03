<?php
require_once 'config/Config.php';

if(isset($_POST['send'])&& !empty($_POST['name'])&& !empty($_POST['city'])&& !empty($mail=$_POST['mail'])){
    
    $name= htmlentities(trim($_POST['name']));
    $city=htmlentities(trim($_POST['city']));
    $mail=htmlentities(trim($_POST['mail']));
    $date = date("Y-m-d");
    
    //Validation
    
    $validate = new Validate();
    $validate->goodEmail($mail, 'e-mail');
    
    //Data collection to insert to database
    
    $db_connection = new DbConnect();
    $insert = "INSERT INTO `user`(`name`, `city`, `mail`, `date`) VALUES ('$name','$city','$mail','$date')";
    
    //If validation is fine then affirm_app inserts new user into database
    
    if($validate->countErrors==0){
        
        $save =  $db_connection->db->query($insert);
        
        // and sends e-mail to user with request for confirmation
        
        $sendMail = new SendMail(E_MAIL_ADMIN);
        $subject = "Możesz potwierdzić rejestrację na stronie mogę.org.pl";
        $to = $mail;
        $message = "Cześć!<br><br>"
                . "Aby potwierdzić swoją rejestrację kliknij na <b><a href=\"".WITRYNA."index.php?page=confirmation\">link</a></b>.<br><br>"
                . "Artur<br><br>"
                . "PS. Jeżeli nie rejestrowałeś się na stronie moge.org.pl ale zaciekawiło Cię co możesz, też możesz kliknąć na link.<br>"
                . "PPS. Jeśli nie rejestrowałeś się na stronie moge.org.pl i nie chcesz tego robić, po prostu zignoruj tego mejla. <br>";
        $sendMail->send($to, $subject, $message);      
        // in the and it displays user page with greetings
        header('Location:index.php?page=thx');
    }  
}


?>

<h4>A teraz MOŻESZ się zarejstrować:</h4>

<form method="POST">
    <input type="text" name="name" placeholder="imie"><br><br>
    <input type="text" name="city" placeholder="miasto"><br><br>
    <input type="text" name="mail" id="mail" placeholder="e-mail"><?php unset ($validate); ?><span id="mailSpan"></span><br><br>
    <input type="submit" name="send" value="Wyślij">
</form>

