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

// Delete method
$error_code = $database->deleteStudent($matrikelnummer);

// Check result
if ($error_code == 1){
    echo "Student with NR: '{$matrikelnummer}' successfully deleted!'";
}
else{
    echo "Error can't delete Student with Matrikelnummer: '{$matrikelnummer}'. Errorcode: {$error_code}";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>
