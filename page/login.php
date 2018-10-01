<form method="post" id="MyForm">
    <h2 class="form-signin-heading">Panel administracyjny aplikacji<br> "Możesz - skieruj myśli ku dobremu"</h2><br>

    <?php

    require_once 'config/Config.php';

    if (isset($_POST['login']) && isset($_POST['haslo'])) {

        $login = htmlentities($_POST['login']);
        $haslo = htmlentities($_POST['haslo']);



        $validation = new Validate();
//        var_dump($login);die();
        $validation->ifEmpty($login, 'login');
        $validation->ifEmpty($haslo, 'password');

        if ($validation->countErrors == 0) {

            $sess = new MySession();
            $sess->sessStart($login, $haslo);
        }
    }
    ?>
    <input name="login" id="login" class="form-control" placeholder="Imię"><span id="loginSpan"></span><br>
    <input type="password" id="haslo" name="haslo" class="form-control" placeholder="Hasło"><br>
    <input type="submit" id="zaloguj" name="zaloguj" value="Log in" class="btn btn-lg btn-primary btn-block">
</form>


