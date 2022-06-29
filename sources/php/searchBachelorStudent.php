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
    <form id='searchform' action='searchBachelorStudent.php' method='get'>
        <div><h2> BachelorStudent nach Versicherungsnummer suchen   </h2></div>
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
    $sql = "SELECT * FROM BACHELORSTUDENT WHERE versicherungsnummer  = '{$_GET['search']}' ";
} else{
    echo "Fuegen Sie eine Versicherungsnummer ein! ";
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
	    <th>Versicherungsnummer</th>
        <th>Ects_anzahl</th>
		</thead>
		<tbody>";
}
?>
<?php
// fetch rows of the executed sql query
if(isset($_GET['search'])){
    while ($row = oci_fetch_assoc($stmt)) {
        echo "<tr>";
        echo "<td>" . $row['VERSICHERUNGSNUMMER'] . "</td>";
        echo "<td>" . $row['ECTS_ANZAHL'] . "</td>";
        echo "</tr>";
    }
}
?>
</tbody>
</table>

<?php
if(isset($_GET['search'])){
    $sume=oci_num_rows($stmt);
    if($sume==0){echo"Kein BachelorStudent mit dieser Versicherungsnummer gefunden!";}
    elseif($sume==1){echo"Eine BachelorStudent mit dieser Versicherungsnummer gefunden!";}
    else{echo"Insgesamt sind ".$sume." BachelorStudent mit dieser Versicherungsnummer gefunden! ";}
}
?>
<?php
if(isset($_GET['search'])){
    oci_free_statement($stmt);
}
?>
</body>
</html>
