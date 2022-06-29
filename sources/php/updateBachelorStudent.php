<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class 
$database = new DatabaseHelper();

//Grab variable id from POST request
$versicherungsnummer = '';
if(isset($_POST['versicherungsnummer'])){
    $versicherungsnummer = $_POST['versicherungsnummer'];
}

$ects_anzahl = '';
if(isset($_POST['ects_anzahl'])){
    $ects_anzahl = $_POST['ects_anzahl'];
}

// Update method
$success = $database->updateBachelorStudent($versicherungsnummer, $ects_anzahl);

// Check result
if ($success){
    echo "BachelorStudent with V_nr: '{$versicherungsnummer} {$ects_anzahl}' successfully updated!'";
}
else{
    echo "Error can't update BachelorStudent with Versicherungsnummer: '{$versicherungsnummer} {$ects_anzahl}'";
}
?>
<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>
