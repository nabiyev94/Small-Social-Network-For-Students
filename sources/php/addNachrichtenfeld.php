<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variables from POST request

$anzahl_von_online_nutzerinnen = '';
if(isset($_POST['anzahl_von_online_nutzerinnen'])){
    $anzahl_von_online_nutzerinnen = $_POST['anzahl_von_online_nutzerinnen'];
}

$anzahl_von_ungelesenen_nachrichten = '';
if(isset($_POST['anzahl_von_ungelesenen_nachrichten'])){
    $anzahl_von_ungelesenen_nachrichten = $_POST['anzahl_von_ungelesenen_nachrichten'];
}


// Insert method
$success = $database->insertIntoNachrichtenfeld($anzahl_von_online_nutzerinnen,  $anzahl_von_ungelesenen_nachrichten);

// Check result
if ($success)
{
    echo "Nachrichtenfeld {$anzahl_von_online_nutzerinnen} {$anzahl_von_ungelesenen_nachrichten}' successfully added!'";
}
else
{
    echo "Error can't insert Nachrichtenfeld '{$nachrichtenfeld_id} {$anzahl_von_online_nutzerinnen} {$anzahl_von_ungelesenen_nachrichten}'!";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>
