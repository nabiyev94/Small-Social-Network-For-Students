<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variables from POST request
$matrikelnummer = '';
if(isset($_POST['matrikelnummer'])){
    $matrikelnummer = $_POST['matrikelnummer'];
}

$studentname = '';
if(isset($_POST['studentname']))
{
    $studentname = $_POST['studentname'];
}

$zugriffkennzahl = '';
if(isset($_POST['zugriffkennzahl']))
{
    $zugriffkennzahl = $_POST['zugriffkennzahl'];
}

$nachrichtenfeld_id = '';
if(isset($_POST['nachrichtenfeld_id'])){
    $nachrichtenfeld_id = $_POST['nachrichtenfeld_id'];
}

// Insert method
$success = $database->insertIntoStudent($matrikelnummer, $studentname, $zugriffkennzahl, $nachrichtenfeld_id);

// Check result
if ($success)
{
    echo "Student '{$matrikelnummer} {$studentname} {$zugriffkennzahl} {$nachrichtenfeld_id}' successfully added!'";
}
else
{
    echo "Error can't insert Student '{$matrikelnummer} {$studentname} {$zugriffkennzahl} {$nachrichtenfeld_id}'!";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>
