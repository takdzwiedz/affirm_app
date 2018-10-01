<?php

/*
 * autor: @takdzwiedz
 * 
 * DATA VALIDATION FILE
 * 
 */

class Validate {
    
    //Variables keeping messages about mistakes
    
    private $error;
    public $countErrors;
    
    function __construct() {
        
        $this->error='';
        $this->countErrors=0;
    }
    
    function ifEmpty ($ciag, $pole) {
        
        if (empty(trim($ciag))){
            $this->addError(" $pole");
            $this->countErrors++;
        }
        
    }
    
    function goodEmail ($ciag, $pole){
        if (!filter_var($ciag, FILTER_VALIDATE_EMAIL)) {
            $this->addError(" poprawny adres $pole");
            $this->countErrors++;
        }
    }
    
    function ifExist ($ciag)  {
        
        $request = "SELECT `id_user` FROM `user` WHERE `mail`='$ciag'";
        $db = new DbConnect();
        $result = $db->db->query($request);
        
        if($result->num_rows >=1 ){
            $this->addError(" inny adres mejlowy, ten jest już w naszej bazie");
            $this->countErrors++;
        }
    }
    
    function addError($text){
        $this->error.=$text;
    }
    
    function __destruct(){
        if(!empty($this->error)){
            echo '<span class="error" style="color:orange; font-weight:bold"> Podaj'.$this->error.' :)</span>';
        }
    }
    
}