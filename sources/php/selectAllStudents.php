<?php

// Include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();



//Grab variables from POST request
$matrikelnummer = '';
if(isset($_POST['matrikelnummer']))
{
    $matrikelnummer = $_POST['matrikelnummer'];
}

$studentname = '';
if(isset($_POST['studentname']))
{
    $studentname = $_POST['studentname'];
}

$zugriffkennzahl = '';
if(isset($_POST['zugriffkennzahl']))
{
    $zugriffkennzahl = $_POST['zugriffkennzahl'];
}

$nachrichtenfeld_id = '';
if(isset($_POST['nachrichtenfeld_id']))
{
    $nachrichtenfeld_id = $_POST['nachrichtenfeld_id'];
}


$student_array = $database->selectAllStudents($matrikelnummer, $studentname, $zugriffkennzahl, $nachrichtenfeld_id);

?>




 
<h2>Studentliste:</h2>
<table>
    <tr>
        <th>Matrikelnummer</th>
        <th>Studentname</th>
        <th>Zugriffkennzahl</th>
		<th>Nachrichtenfeld_id</th>
    </tr>
    <?php foreach ($student_array as $student) : ?>                                      
        <tr>
            <td><?php echo $student['MATRIKELNUMMER']; ?>  </td>
            <td><?php echo $student['STUDENTNAME']; ?>  </td>
            <td><?php echo $student['ZUGRIFFKENNZAHL']; ?>  </td>
            <td><?php echo $student['NACHRICHTENFELD_ID']; ?>  </td>
        </tr>
    <?php endforeach; ?>
</table>
 
<br>
 <div>
        <a href='index.php'>go back =></a> 
    </div>
    
  

