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
    <form id='searchform' action='searchFachlicheGruppe.php' method='get'>
        <div><h2> FachlicheGruppe nach Gruppennummer suchen   </h2></div>
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
    $sql = "SELECT * FROM FACHLICHEGRUPPE WHERE gruppennummer  = '{$_GET['search']}' ";
} else{
    echo "Fuegen Sie eine gruppennummer ein! ";
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
		<thead>
		  <tr>
	    <th>Gruppennummer</th>
        <th>Bezeichnung</th>
		</thead>
		<tbody>";
}
?>
<?php
// fetch rows of the executed sql query
if(isset($_GET['search'])){
    while ($row = oci_fetch_assoc($stmt)) {
        echo "<tr>";
        echo "<td>" . $row['GRUPPENNUMMER'] . "</td>";
        echo "<td>" . $row['BEZEICHNUNG'] . "</td>";
        echo "</tr>";
    }
}
?>
</tbody>
</table>

<?php
if(isset($_GET['search'])){
    $sume=oci_num_rows($stmt);
    if($sume==0){echo"Kein FachlicheGruppe mit dieser Gruppennummer gefunden!";}
    elseif($sume==1){echo"Eine FachlicheGruppe mit dieser Gruppennummer gefunden!";}
    else{echo"Insgesamt sind ".$sume." FachlicheGruppen mit dieser Gruppennummer gefunden! ";}
}
?>
<?php
if(isset($_GET['search'])){
    oci_free_statement($stmt);
}
?>
</body>
</html>
