<<<<<<< HEAD
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

        case('login');

            $page = 'login';
            $title = '';
            break;

        case('admin_panel');

            $page = 'admin_panel';
            $title = '';
            break;

        default:
          
            $page = 'form';
            $title = '';
    }
    
=======
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

        case('login');

            $page = 'login';
            $title = '';
            break;

        case('admin_panel');

            $page = 'admin_panel';
            $title = '';
            break;

        default:
          
            $page = 'form';
            $title = '';
    }
    
>>>>>>> eb6469bb21ac537d4165bb85426722ec139273a2
}