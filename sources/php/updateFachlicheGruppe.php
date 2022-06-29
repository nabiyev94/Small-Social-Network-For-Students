<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class 
$database = new DatabaseHelper();

//Grab variable id from POST request
$gruppennummer = '';
if(isset($_POST['gruppennummer'])){
    $gruppennummer = $_POST['gruppennummer'];
}

$bezeichnung = '';
if(isset($_POST['bezeichnung'])){
    $bezeichnung = $_POST['bezeichnung'];
}

// Update method
$success = $database->updateFachlicheGruppe($gruppennummer, $bezeichnung);

// Check result
if ($success){
    echo "FachlicheGruppe with G_nr: '{$gruppennummer} {$bezeichnung}' successfully updated!'";
}
else{
    echo "Error can't update FachlicheGruppe with G_nr: '{$gruppennummer} {$bezeichnung}'";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>
