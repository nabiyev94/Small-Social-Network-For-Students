<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class 
$database = new DatabaseHelper();

//Grab variable id from POST request
$versicherungsnummer = '';
if(isset($_POST['id'])){
    $versicherungsnummer = $_POST['id'];
}

// Delete method
$error_code = $database->deleteBachelorStudent($versicherungsnummer);

// Check result
if ($error_code == 1){
    echo "BachelorStudent with V_NR: '{$versicherungsnummer}' successfully deleted!'";
}
else{
    echo "Error can't delete BachelorStudent with V_nummer: '{$versicherungsnummer}'. Errorcode: {$error_code}";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>
