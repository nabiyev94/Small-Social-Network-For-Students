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

// Delete method
$error_code = $database->deleteNachrichtenfeld($nachrichtenfeld_id); 


// Check result
if ($error_code == 1){
    echo "Nachrichtenfeld with ID: '{$nachrichtenfeld_id}' successfully deleted!'";
}
else {
    echo "Error can't delete Nachrichtenfeld with ID: '{$nachrichtenfeld_id}'. Errorcode: {$error_code}";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>
