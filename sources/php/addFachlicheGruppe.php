<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variables from POST request
$gruppennummer = '';
if(isset($_POST['gruppennummer'])){
    $gruppennummer = $_POST['gruppennummer'];
}

$bezeichnung = '';
if(isset($_POST['bezeichnung'])){
    $bezeichnung = $_POST['bezeichnung'];
}

// Insert method
$success = $database->insertIntoFachlicheGruppe($gruppennummer, $bezeichnung);

// Check result
if ($success){
    echo "FachlicheGruppe '{$gruppennummer} {$bezeichnung}' successfully added!'";
}
else{
    echo "Error can't insert FachlicheGruppe '{$gruppennummer} {$bezeichnung}'!";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>
