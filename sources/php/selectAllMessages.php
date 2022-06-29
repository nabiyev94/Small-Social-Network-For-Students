<?php

// Include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();



//Grab variables from POST request
 

$nachrichtenfeld_id = '';
if(isset($_POST['nachrichtenfeld_id'])){
    $nachrichtenfeld_id = $_POST['nachrichtenfeld_id'];
}

$anzahl_von_online_nutzerinnen = '';
if (isset($_POST['anzahl_von_online_nutzerinnen'])) {
    $anzahl_von_online_nutzerinnen = $_POST['anzahl_von_online_nutzerinnen'];
}

$anzahl_von_ungelesenen_nachrichten = '';
if (isset($_POST['anzahl_von_ungelesenen_nachrichten'])) {
    $anzahl_von_ungelesenen_nachrichten = $_POST['anzahl_von_ungelesenen_nachrichten'];
}



$nachrichtenfeld_array = $database->selectAllMessages();

?>




 
<h2>Nachrichtenfeldliste:</h2>
<table>
    <tr>
        <th>Nachrichtenfeld_id</th>
        <th>Anzahl_von_online_nutzerinnen</th>
        <th>Anzahl_von_ungelesenen_nachrichten</th>
    </tr>
    <?php foreach ($nachrichtenfeld_array as $nachrichtenfeld) : ?>                                      
        <tr>
            <td><?php echo $nachrichtenfeld['NACHRICHTENFELD_ID']; ?>  </td>
            <td><?php echo $nachrichtenfeld['ANZAHL_VON_ONLINE_NUTZERINNEN']; ?>  </td>
            <td><?php echo $nachrichtenfeld['ANZAHL_VON_UNGELESENEN_NACHRICHTEN']; ?>  </td>
        </tr>
    <?php endforeach; ?>
</table>


<br>
 <div>
        <a href='index.php'>go back =></a> 
    </div>

 
