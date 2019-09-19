<?php

namespace Mozesz\MozeszNamespace;

class MySession
{
    function __construct()
    {
        session_start();
    }

    function sessStart($login, $pass)
    {
        $db = new DbConnect();
        $con = $db->openConnection();
        $sql = "SELECT * FROM `user` WHERE `name` = :login AND `password` = :pass AND `is_admin` = 1";
        $rows = $con->prepare($sql);
        $rows->bindValue(':login', $login);
        $rows->bindValue('pass', $pass);
        $rows->execute();
        $result = $rows->fetchObject();
        $db->closeConnection();

        if ($rows->rowCount() == 1)
        {
            $_SESSION['session_id'] = session_id();
            $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
            $_SESSION['login'] = $result->name;
            $_SESSION['client'] = $_SERVER['HTTP_USER_AGENT'];
            $_SESSION['is_admin'] = $result->is_admin;

            header('Location:index.php?page=admin_panel');
            exit();
        } else {

            header('Location:index.php?page=login');
            exit();
        }
    }

    function sessVer()
    {
        if (!isset($_SESSION['is_admin'])
            || $_SESSION['session_id'] != session_id()
            || $_SESSION['ip'] != $_SERVER['REMOTE_ADDR']
            || $_SESSION['client'] != $_SERVER['HTTP_USER_AGENT']) {
            header('Location:index.php');
            exit();
        }
    }

    function sessEnd()
    {
        $_SESSION[] = array();
        session_regenerate_id();
        session_destroy();
        header('Location:index.php');
        exit();
    }
}
