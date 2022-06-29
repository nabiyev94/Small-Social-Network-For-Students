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
    <form id='searchform' action='searchStudent.php' method='get'>
        <div><h2> Student nach Matrikelnummer suchen   </h2></div>
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
    $sql = "SELECT * FROM STUDENT WHERE matrikelnummer like '%" . $_GET['search'] . "%'";
} else{
    echo "Fuegen Sie eine Matrikelnummer ein! ";
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
	    <th>Matrikelnummer</th>
        <th>Studentname</th>
         <th>Zugriffkennzahl</th>
          <th>Nachrichtenfeld_id</th>
          
		</thead>
		<tbody>";
}
?>
<?php
// fetch rows of the executed sql query
if(isset($_GET['search'])){
    while ($row = oci_fetch_assoc($stmt)) {
        echo "<tr>";
        echo "<td>" . $row['MATRIKELNUMMER'] . "</td>";
        echo "<td>" . $row['STUDENTNAME'] .        			"</td>";
        echo "<td>" . $row['ZUGRIFFKENNZAHL'] .    		"</td>";
        echo "<td>" . $row['NACHRICHTENFELD_ID'] .    		"</td>";
        echo "</tr>";
    }
}
?>
</tbody>
</table>

<?php
if(isset($_GET['search'])){
    $sume=oci_num_rows($stmt);
    if($sume==0){echo"Kein Student mit dieser Matrikelnummer gefunden!";}
    elseif($sume==1){echo"Eine Kunde mit dieser Matrikelnummer gefunden!";}
    else{echo"Insgesamt sind ".$sume." Studenten mit dieser Matrikelnummer gefunden! ";}
}
?>
<?php
if(isset($_GET['search'])){
    oci_free_statement($stmt);
}
?>
</body>
</html>
