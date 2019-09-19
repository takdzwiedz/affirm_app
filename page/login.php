<form method="post" id="MyForm">
    <h2 class="form-signin-heading">Panel administracyjny aplikacji<br> "Możesz - skieruj myśli ku najlepszemu"</h2><br>

    <?php

    use Mozesz\MozeszNamespace\Validate;
    use Mozesz\MozeszNamespace\MySession;

    if (isset($_POST['login']) && isset($_POST['haslo'])) {

        $login = htmlentities($_POST['login']);
        $haslo = htmlentities($_POST['haslo']);


        $validation = new Validate();
        $validation->ifEmpty($login, 'login');
        $validation->ifEmpty($haslo, 'password');

        if ($validation->countErrors == 0) {

            $sess = new MySession();
            $sess->sessStart($login, $haslo);
        }
    }
    ?>
    <input name="login" id="login"  placeholder="Imię" class="login"><span id="loginSpan"></span><br>
    <input type="password" id="haslo" name="haslo" class="pass" placeholder="Hasło"><br>
    <button type="submit" id="zaloguj" name="zaloguj">Zaloguj</button>
</form>


