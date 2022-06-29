<?php
$username = 'a11739713';
$password = 'dbs20';
$database = 'lab';

// establish database connection
$conn = oci_connect($username, $password, $database);
if (!$conn) exit;
?>
<html>
<body>
<div>
    <form id='searchform' action='searchNachrichtenfeld.php' method='get'>
        <div><h2> Nachrichtenfeld nach Nachrichtenfeld_id suchen   </h2></div>
        <input id='search' name='search' type='text' size='20' value='<?php if(isset($_GET['search'])) echo $_GET['search']; ?>' />
        <input id='submit' type='submit' value='Los!' />
    </form>
</div>
<div>
    <a href='index.php'>go back</a>
</div>
<?php
// check if search view of list view 
if(isset($_GET['search'])){
    $sql = "SELECT * FROM nachrichtenfeld WHERE nachrichtenfeld_id like '%" . $_GET['search'] . "%'";
} else{
    echo "Fuegen Sie eine Nachrichtenfeld_id ein! ";
}
// execute sql statement
if(isset($_GET['search'])){
    $stmt = oci_parse($conn, $sql);
    oci_execute($stmt);
}
?>
<?php
if(isset ($_GET['search'])){
    echo"<table style='border: 1px solid #DDDDDD'>
		<tbody>		
		<thead>
		  <tr>
	    <th>Nachrichtenfeld_id</th>
        <th>Anzahl_von_online_nutzerinnen</th>
        <th>Anzahl_von_ungelesenen_nachrichten</th>    
		 </tr>     
		</thead>
		</tbody>";
}
?>
<?php
// fetch rows of the executed sql query
if(isset($_GET['search'])){
    while ($row = oci_fetch_assoc($stmt)) {
        echo "<tr>";
        echo "<td>" . $row['NACHRICHTENFELD_ID'] . "</td>";
        echo "<td>" . $row['ANZAHL_VON_ONLINE_NUTZERINNEN'] ."</td>";
        echo "<td>" . $row['ANZAHL_VON_UNGELESENEN_NACHRICHTEN'] ."</td>";
        echo "</tr>";
    }
}
?>
</tbody>
</table>

<?php
if(isset($_GET['search'])){
    $sume=oci_num_rows($stmt);
    if($sume==0){echo"Kein Nachrichtenfeld mit dieser Nachrichtenfeld_id gefunden!";}
    elseif($sume==1){echo"Eine Nachrichtenfeld mit dieser Nachrichtenfeld_id gefunden!";}
    else{echo"Insgesamt sind ".$sume." Nachrichtenfeld mit dieser Nachrichtenfeld_id gefunden! ";}
}
?>
<?php
if(isset($_GET['search'])){
    oci_free_statement($stmt);
}
?>
</body>
</html>
