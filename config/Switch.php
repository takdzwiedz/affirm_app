<?php

$page = 'form';
$title = '';
    
if(isset($_GET['page'])){
  $page = $_GET['page'];

    switch ($page){

        case('form'):

            $page = 'form';
            $title = '';
            break;
        
        case('thx');
            
            $page = 'thx';
            $title = '';
            break;
        
        case('confirmation');
            
            $page = 'confirmation';
            $title = '';
            break;
        
        default:
          
            $page = 'form';
            $title = '';
    }
    
}