<?php

// Include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();



//Grab variables from POST request
$versicherungsnummer = '';
if(isset($_POST['versicherungsnummer']))
{
    $versicherungsnummer = $_POST['versicherungsnummer'];
}

$ecsts_anzahl = '';
if(isset($_POST['ecsts_anzahl']))
{
    $ecsts_anzahl = $_POST['ecsts_anzahl'];
}

 

$bachelorstudent_array = $database->selectAllBachelorStudents();

?>




 
<h2>BachelorStudentliste:</h2>
<table>
    <tr>
        <th>Versicherungsnummer</th>
        <th>Ects_anzahl</th>
    </tr>
    <?php foreach ($bachelorstudent_array as $bachelorstudent) : ?>                                      
        <tr>
            <td><?php echo $bachelorstudent['VERSICHERUNGSNUMMER']; ?>  </td>
            <td><?php echo $bachelorstudent['ECTS_ANZAHL']; ?>  </td>
        </tr>
    <?php endforeach; ?>
</table>
 
<br>
 <div>
        <a href='index.php'>go back =></a> 
    </div>
    
  

