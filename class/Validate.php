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
    
    function goodEmail ($ciag, $pole){
        if (!filter_var($ciag, FILTER_VALIDATE_EMAIL)) {
            $this->addError("wprowadź poprawny adres $pole");
            $this->countErrors++;
        }
    }

    
    function addError($text){
        $this->error.=$text;
    }
    
    function __destruct(){
        if(!empty($this->error)){
            echo '<span class="error" style="color:orange; font-weight:bold"> Proszę: '.$this->error.' :)</span>';
        }
    }
    
}