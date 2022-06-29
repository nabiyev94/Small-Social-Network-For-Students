<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class 
$database = new DatabaseHelper();

//Grab variable id from POST request
$matrikelnummer = '';
if(isset($_POST['id'])){
    $matrikelnummer = $_POST['id'];
}

$zugriffkennzahl = '';
if(isset($_POST['zugriffkennzahl'])){
    $zugriffkennzahl = $_POST['zugriffkennzahl'];
}

// Update method
$success = $database->updateStudent($matrikelnummer, $zugriffkennzahl);

// Check result
if ($success){
    echo "Student with M_nr: '{$matrikelnummer} {$zugriffkennzahl}' successfully updated!'";
}
else{
    echo "Error can't update Student with Matrikelnummer: '{$matrikelnummer} {$zugriffkennzahl}'";
}
?>
<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>
