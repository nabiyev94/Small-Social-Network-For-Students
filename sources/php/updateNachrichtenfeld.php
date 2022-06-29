<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class 
$database = new DatabaseHelper();

//Grab variable id from POST request
$nachrichtenfeld_id = '';
if(isset($_POST['nachrichtenfeld_id'])){
    $nachrichtenfeld_id = $_POST['nachrichtenfeld_id'];
}

$anzahl_von_online_nutzerinnen = '';
if(isset($_POST['anzahl_von_online_nutzerinnen'])){
    $anzahl_von_online_nutzerinnen = $_POST['anzahl_von_online_nutzerinnen'];
}

// Update method
$success = $database->updateNachrichtenfeld($nachrichtenfeld_id, $anzahl_von_online_nutzerinnen); 

// Check result
if ($success){
    echo "Nachrichtenfeld with N_feld_id: '{$nachrichtenfeld_id} {$anzahl_von_online_nutzerinnen}' successfully updated!'";
}
else{
    echo "Error can't update Nachrichtenfeld_id with N_feld_id: '{$nachrichtenfeld_id} {$anzahl_von_online_nutzerinnen}'";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>
