<?php

namespace Mozesz\MozeszNamespace;

class Validate
{

    //Variables keeping messages about mistakes

    private $error;
    public $countErrors;

    function __construct()
    {

        $this->error = '';
        $this->countErrors = 0;
    }

    function ifEmpty($ciag, $pole)
    {

        if (empty(trim($ciag))) {
            $this->addError("Podaj $pole");
            $this->countErrors++;
        }

    }

    function goodEmail($ciag, $pole)
    {
        if (!filter_var($ciag, FILTER_VALIDATE_EMAIL)) {
            $this->addError("Podaj poprawny adres $pole");
            $this->countErrors++;
        }
    }

    function ifExist($ciag)
    {
        $con = new DbConnect();
        $db = $con->openConnection();
        $query = "SELECT `id_user` FROM `user` WHERE `mail`=:ciag";
        $rows = $db->prepare($query);
        $rows->bindValue(':ciag', $ciag);
        $rows->execute();

        if ($rows->rowCount() >= 1) {
            $this->addError("Podany e-mail jest już w naszej bazie");
            $this->countErrors++;
        }
    }

    function isChecked($pole, $nazwa)
    {
        if ($pole == 0) {
            $this->addError("Nasza współpraca wymaga zgody na $nazwa.");
            $this->countErrors++;
        }
    }

    function addError($text)
    {
        $this->error .= $text . "<br>";
    }

    function __destruct()
    {
        if (!empty($this->error)) {
            echo '<span class="error" style="color:orange; font-weight:bold">' . $this->error . '</span>';
        }
    }

}