<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variables from POST request

$ects_anzahl = '';
if (isset($_POST['ects_anzahl'])) {
    $ects_anzahl = $_POST['ects_anzahl'];
}
// Insert method
$success = $database->insertIntoBachelorStudent($ects_anzahl);

// Check result
if ($success)
{
    echo "BachelorStudent '{$ects_anzahl}' successfully added!'";
}
else
{
    echo "Error can't insert BachelorStudent '{$ects_anzahl}'!";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>
