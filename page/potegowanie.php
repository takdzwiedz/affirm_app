<form action="" method="POST">
Podaj potęgę: <input type="text" name="potega"> <br>
Podaj wykładnik: <input type="text" name="wykladnik"> <br>
<input type="submit" value="Licz" name="licz">
</form>
 
<?php
//potegowanie
//www.algorytm.org
if ( isset ( $_POST['licz'] ) )
{
$potega = $_POST['potega'];
$wykladnik = $_POST['wykladnik'];
$wynik= 1;
 
while($wykladnik--)
{
$wynik *= $potega;
echo $wynik."<br>";
}
echo "<hr>"; 
echo $potega.' ^ '.$_POST['wykladnik'].' = '.$wynik;
}
 
?>