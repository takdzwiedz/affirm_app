<?php

class MySession {
    
    function __construct() { 
        session_start();
    }
    
    function sessStart($login, $haslo){

        $connect = new DbConnect();
        $request = "SELECT * FROM `user` WHERE `name` = '$login' AND `password` = '$haslo' AND `is_admin` = 1";
//        var_dump($request);
        $result = $connect->db->query($request);
        $catch = $result->fetch_object();

        if ($result->num_rows==1){

            $_SESSION['session_id'] = session_id();
//            print_r($_SESSION['session_id']); die();
            $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
            $_SESSION['login'] = $catch->name;
            $_SESSION['client'] = $_SERVER['HTTP_USER_AGENT'];
            $_SESSION['is_admin'] = $catch->is_admin;

            header('Location:index.php?page=admin_panel');
            exit();
            
        } else {

            header('Location:index.php?page=login');
            exit();
        }
        
    }
    
    function sessVer () {
//        echo "<pre>";
//        print_r($_SESSION);die();
//        echo "<pre>";
        if(!isset($_SESSION['is_admin'])
        || $_SESSION['session_id'] != session_id() 
        || $_SESSION['ip'] != $_SERVER['REMOTE_ADDR']
        || $_SESSION['client'] != $_SERVER['HTTP_USER_AGENT'])
        {
            header('Location:index.php');
            exit();
        }

        
    }
    
    function sessEnd () {

        $_SESSION[] = array();
        session_regenerate_id();
        session_destroy();
        header('Location:index.php');
        exit();
        }

    
}
