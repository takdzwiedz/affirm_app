<?php
require_once 'config/Config.php';

if (isset($_POST['send'])) {

    $name = htmlentities(trim($_POST['name']));
    $city = htmlentities(trim($_POST['city']));
    $mail = htmlentities(trim($_POST['mail']));
    $regulations_1 = isset($_POST['regulations-1']) ? 1 : 0;
    $regulations_2 = isset($_POST['regulations-2']) ? 1 : 0;
    $security = sha1(uniqid());
    $date = date("Y-m-d H:i:s");

    //Validation

    $validate = new Validate();
    $validate->ifEmpty($name, 'imię');
    $validate->ifEmpty($city, 'miasto');
    $validate->goodEmail($mail, 'e-mail');
    $validate->ifExist($mail);
    $validate->isChecked($regulations_1, "przetwarzanie danych");
    $validate->isChecked($regulations_2, "otrzymywanie informacji");

    //Data collection to insert to database

    $db_connection = new DbConnect();
    $insert = "INSERT INTO `user`(`name`, `city`, `mail`, `date`, `is_active`, `security`) VALUES ('$name','$city','$mail','$date','0','$security')";

    //If validation is fine new user is saved in database ...  

    if ($validate->countErrors == 0) {
        $save = $db_connection->db->query($insert);

        // ... and sends e-mail to user with request for confirmation

        $sendMail = new SendMail(E_MAIL_ADMIN);
        $to = $mail;
        $message = "Witaj ponownie!<br><br>"
            . "Aby potwierdzić swoją rejestrację kliknij na <b><a href=\"" . WITRYNA . "index.php?page=confirmation&mail=$mail&security=$security\">link</a></b>.<br><br>"
            . "Artur<br><br>"
            . "PS. Jeżeli nie rejestrowałeś się na stronie mozesz.eu ale zaciekawiło Cię co możesz, też możesz kliknąć na link.<br>"
            . "PPS. Jeśli nie rejestrowałeś się na stronie mozesz.eu i nie chcesz tego robić, po prostu zignoruj tego mejla. <br>";
        $sendMail->send($to, "[Możesz]Możesz potwierdzić rejestrację na stronie mozesz.eu", $message);
        // In the and it displays user page with greetings
        header('Location:index.php?page=thx');
    }
}
?>


<?php unset ($validate); ?>

<p>A teraz możesz się zarejstrować:</p>
<p>Nie musisz. Możesz.</p>
<form method="POST">
    <input type="text" name="name" placeholder="imię" class="name" value="<?php if (isset($_POST['name'])) { echo $_POST['name'];} ?>">
    <input type="text" name="city" placeholder="miasto" class="city" value="<?php if (isset($_POST['city'])) { echo $_POST['city'];} ?>">
    <input type="text" name="mail" id="mail" placeholder="e-mail" class="mail" value="<?php if (isset($_POST['mail'])) { echo $_POST['mail'];} ?>"><span id="mailSpan"></span><br><br>
    <div style="">



    </div>
    <div class="regulation-title">
        Administratorem Twoich danych osobowych jest “Tu i teraz - Artur Kacprzak” z siedzibą w Łodzi przy ul. Eliasza
        Chaima Majzela 7/7. Masz prawo dostępu do treści swoich danych osobowych, możesz je w każdej chwili zmienić lub usunąć.<br><br>
<!--        pisząc na adres mejlowy <a href="mailto:a.kacprzak@mozesz.eu">a.kacprzak@mozesz.eu</a>.-->
        Więcej w <a href="../Regulamin_v1_0.pdf" download="Regulamin">regulaminie strony</a>.

        <br><br>
    </div>
    <input type="checkbox" name="regulations-1" id="regulations" class="regulation-checkbox" value="1" <?php if (isset($_POST['regulations-1'])) { echo "checked";} ?>>

    <div class="regulation-acceptance">
        Wyrażam zgodę na przetwarzanie danych celem objęcia mnie projektem “Możesz - skieruj myśli ku najlepszemu”.<br><br>

    </div>
    <input type="checkbox" name="regulations-2" id="regulations" class="regulation-checkbox" value="1" <?php if (isset($_POST['regulations-2'])) { echo "checked";} ?>>

    <div class="regulation-acceptance">
        Wyrażam zgodę na użycie danych do otrzymywania informacji o dostępnych produktach oraz do celów statystycznych.
    </div>
    <br>
    <button type="submit" type="submit" name="send" value="Wyślij">Rejestruję się</button>
</form>

