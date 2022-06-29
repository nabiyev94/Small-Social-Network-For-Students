<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variables from POST request

$physische_adresse = '';
if (isset($_POST['physische_adresse'])) {
    $physische_adresse = $_POST['physische_adresse'];
}
// Insert method
$success = $database->insertIntoMasterStudent($physische_adresse); 

// Check result
if ($success)
{
    echo "MasterStudent '{$physische_adresse}' successfully added!'";
}
else
{
    echo "Error can't insert MasterStudent '{$physische_adresse}'!";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>
