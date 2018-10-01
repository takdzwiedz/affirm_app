<?php

class DbConnect{ 
    
    public $db;

    function __construct() {

        $this->db = new mysqli(SERVER,USER,PASSWORD,DB);
        $this->db->set_charset('utf8');
        
    }
    
    function __destruct() {
        
        $this->db->close();
        
    }
    
}