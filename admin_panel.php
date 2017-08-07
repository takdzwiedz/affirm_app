<?php
ob_start();  
require_once 'config/Config.php';
require_once 'config/Switch.php';
require_once 'lib/function.php';
?>

<html>
<head>
    <title>Możesz</title>
    <meta charset="UTF-8">
    <meta name="affirm_app" content="description and registration form for those who wants to believe they can">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="script/check_mail.js"></script>
    <style>
        body{
          background-color: skyblue;
          color: white;
          text-shadow: 2px 2px 2px rgba(150, 150, 150, 1);
        }
    </style>
</head>
<body>
    <h1>Możesz - skieruj myśli ku dobremu</h1>
    <h2>Panel Administracyjny</h2>

<table class="table table-bordered table-striped"> 
    <thead>  
        <tr>
            <th>#</th>
            <td>Imie</td>
            <td>Miasto</td>
            <td>E-mail</td>
            <td>Data rejestracji</td>
        </tr>
    </thead>
    <tbody>   
<?php
// Displaying users

$connection = new DbConnect();
$request = "SELECT * FROM `user`";

$result = $connection->db->query($request);
$lp=0;
while($row = $result->fetch_object()){
    $lp++;
    echo " 
        <tr>
            <th scope=\"row\">$lp</th>
            <td>$row->name</td>
            <td>$row->city</td>
            <td>$row->mail</td>
            <td>$row->date</td>
        </tr>
        ";
}
// End of displaying users
    ob_end_flush();

?>
           
    </tbody> 
</table>
