<?php

// Include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();



//Grab variables from POST request
$gruppennummer = '';
if(isset($_POST['gruppennummer']))
{
    $gruppennummer = $_POST['gruppennummer'];
}

$bezeichnung = '';
if(isset($_POST['bezeichnung']))
{
    $bezeichnung = $_POST['bezeichnung'];
}

 

$fachlichegruppe_array = $database->selectAllGroups();

?>




 
<h2>FachlicheGruppenliste:</h2>
<table>
    <tr>
        <th>Gruppennummer</th>
        <th>Bezeichnung</th>
    </tr>
    <?php foreach ($fachlichegruppe_array as $fachlichegruppe) : ?>                                      
        <tr>
            <td><?php echo $fachlichegruppe['GRUPPENNUMMER']; ?>  </td>
            <td><?php echo $fachlichegruppe['BEZEICHNUNG']; ?>  </td>
        </tr>
    <?php endforeach; ?>
</table>
 
<br>
 <div>
        <a href='index.php'>go back =></a> 
    </div>
    
  

