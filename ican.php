<!-- FORM DISPLAY -->
<?php

if(isset($_POST['send_ican']) && !empty($_POST['ican'])){
    
    $ican = trim($_POST['ican']);
    $date = date("d-m-Y");
    $time = date("H:i:s");
    
    $ican = "INSERT INTO `affirmation`(`affirmation`, `date`, `time`) VALUES ('$ican', '$date', '$time')";
    $insert = new DbConnect();
    $save = $insert->db->query($ican);
    
    echo "<span> Brawo! <br> \"Mogę\" zostało wysłane!</span>";
}
?>
<form method="post">
    <p>Treść "MOGĘ:</p>
    <input class="ican" type="text" name="ican"><br><br>
    <button type="submit" class="btn btn-primary" type="submit" name="send_ican" value="wyslij">Wyślij</button>
</form>