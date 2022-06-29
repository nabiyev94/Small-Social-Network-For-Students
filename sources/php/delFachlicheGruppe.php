<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variable id from POST request
$gruppennummer = '';
if(isset($_POST['nummer'])){
    $gruppennummer = $_POST['nummer'];
}

// Delete method
$errorcode = $database->deleteFachlicheGruppe($gruppennummer); 

// Check result
if ($errorcode == 1)
{
    echo "FachlicheGruppe with G_NR : '{$gruppennummer}  ' successfully deleted!'";
}
else
{
    echo "It can't delete FachlicheGruppe with G_NR: '{$gruppennummer}' ";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>
