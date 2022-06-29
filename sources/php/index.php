<?php

// Include DatabaseHelper.php file
require_once('DatabaseHelper.php');

// Instantiate DatabaseHelper class
$database = new DatabaseHelper();

// Student
$matrikelnummer = '';
if (isset($_GET['matrikelnummer'])) {
    $matrikelnummer = $_GET['matrikelnummer'];
}

$studentname = '';
if (isset($_GET['studentname'])) {
    $studentname = $_GET['studentname'];
}

$zugriffkennzahl = '';
if (isset($_GET['zugriffkennzahl'])) {
    $zugriffkennzahl = $_GET['zugriffkennzahl'];
}

$nachrichtenfeld_id = '';
if (isset($_GET['nachrichtenfeld_id'])) {
    $nachrichtenfeld_id = $_GET['nachrichtenfeld_id'];
}

//Nachrichtenfeld

$anzahl_von_online_nutzerinnen = '';
if (isset($_GET['anzahl_von_online_nutzerinnen'])) {
    $anzahl_von_online_nutzerinnen = $_GET['anzahl_von_online_nutzerinnen'];
}

$anzahl_von_ungelesenen_nachrichten = '';
if (isset($_GET['anzahl_von_ungelesenen_nachrichten'])) {
    $anzahl_von_ungelesenen_nachrichten = $_GET['anzahl_von_ungelesenen_nachrichten'];
}

//Fachliche Gruppe

$gruppennummer = '';
if (isset($_GET['gruppennummer'])) {
    $gruppennummer = $_GET['gruppennummer'];
}

$bezeichnung = '';
if (isset($_GET['bezeichnung'])) {
    $bezeichnung = $_GET['bezeichnung'];
}


//BachelorStudent                                          


$versicherungsnummer = '';
if (isset($_GET['id'])) {
    $versicherungsnummer = $_GET['id'];
}

$ects_anzahl = '';
if (isset($_GET['ects_anzahl'])) {
    $ects_anzahl = $_GET['ects_anzahl'];
}


//MasterStudent

$ausweisnummer = '';
if (isset($_GET['id'])) {
    $ausweisnummer = $_GET['id'];
}

$physische_adresse = '';
if (isset($_GET['physische_adresse'])) {
    $physische_adresse = $_GET['physische_adresse'];
}

//Fetch data from database
//$student_array = $database->selectAllStudents($matrikelnummer, $studentname, $zugriffkennzahl, $nachrichtenfeld_id);

//$fachlichegruppe_array = $database->selectAllGroups($gruppennummer, $bezeichnung);
?>
<html>
<head>
    <title>DBS Projekt</title>
</head>

<body>
<br>
<h1>Uni Netz</h1>

<!-- Add Student-->
<h2>Add Student: </h2>
<form method="post" action="addStudent.php">                
 

    <!-- MATRIKELNUMMER textbox -->
    <div>
        <label for="new_matrikelnummer">MATRIKELNUMMER:</label>
        <input id="new_matrikelnummer" name="matrikelnummer" type="text" maxlength="20">
    </div>
    <br>

    <!-- Studentname textbox -->
    <div>
        <label for="new_studentname">Studentname:</label>
        <input id="new_studentname" name="studentname" type="text" maxlength="20">
    </div>
    <br>

    <!-- Zugriffkennzahl textbox -->
    <div>
        <label for="new_zugriffkennzahl">Zugriffkennzahl:</label>
        <input id="new_zugriffkennzahl" name="zugriffkennzahl" type="text" maxlength="20">
    </div>
    <br>


    <!-- Nachrichtenfeld_id textbox -->
    <div>
        <label for="new_nachrichtenfeld_id">Nachrichtenfeld_id:</label>
        <input id="new_nachrichtenfeld_id" name="nachrichtenfeld_id" type="text" maxlength="20">
    </div>
    <br>
    <!-- Submit button -->
    <div>
        <button type="submit">
            Add Student
        </button>
    </div>
</form>
<br>
<hr>

<!-- Delete Student -->
<h2>Delete Student: </h2>
<form method="post" action="delStudent.php">
    <!-- MATRIKELNUMMER textbox -->
    <div>
        <label for="del_NUMMER">MATRIKELNUMMER:</label>
        <input id="del_NUMMER" name="id" type="number" min="0">
    </div>
    <br>

    <!-- Submit button -->
    <div>
        <button type="submit">
            Delete Student
        </button>
    </div>
</form>
<br>
<hr>


<!-- Update Student -->
<h2>Update Student: </h2>
<form method="post" action="updateStudent.php">
    <!-- MATRIKELNUMMER textbox -->
    <div>
       <label for="new_matrikelnummer">MATRIKELNUMMER:</label>
        <input id="new_matrikelnummer" name="id" type="text" maxlength="20">
    </div>
    <br>
	
	<div>
        <label for="zugriffkennzahl">Zugriffkennzahl:</label>
        <input id="new_zugriffkennzahl" name="zugriffkennzahl" type="text" maxlength="20">
    </div>
    <br>

    <!-- Submit button -->
    <div>
        <button type="submit">
            Update Student
        </button>
    </div>
</form>
<br>
<hr>
 

    <div>
        <a href='searchStudent.php'>Search Student =></a> 
    </div>
    <br>
 
    <br>

</div>


 <hr>


    <div>
        <a href='selectAllStudents.php'>Studentliste ansehen=></a> 
    </div>
    <br>
    <hr>
    <br>

</div>

 
 
 
 



<!--**********************************************************************************************************************-->

<!-- Add Nachrichtenfeld-->
<h2>Add Nachrichtenfeld: </h2>
<form method="post" action="addNachrichtenfeld.php">
 


    <!-- Nachrichtenfeld_id is not needed, because it is generated automatic by the database -->
    <!-- Anzahl_von_online_nutzerinnen textbox -->
    <div>
        <label for="new_anzahl_von_online_nutzerinnen">Anzahl_von_online_nutzerinnen:</label>
        <input id="new_anzahl_von_online_nutzerinnen" name="anzahl_von_online_nutzerinnen" type="text" maxlength="20">
    </div>
    <br>

    <!-- Anzahl_von_ungelesenen_nachrichten textbox -->
    <div>
        <label for="new_anzahl_von_ungelesenen_nachrichten">Anzahl_von_ungelesenen_nachrichten:</label>
        <input id="new_anzahl_von_ungelesenen_nachrichten" name="anzahl_von_ungelesenen_nachrichten" type="text" maxlength="20">
    </div>
    <br>
    <!-- Submit button -->
    <div>
        <button type="submit">
            Add Nachrichtenfeld
        </button>
    </div>
</form>
<br>
<hr>
<!--****************************UpdateNachrichtenfeld************************************************-->

<!-- Update Nachrichtenfeld -->
<h2>Update Nachrichtenfeld: </h2>
<form method="post" action="updateNachrichtenfeld.php">
    <!-- MATRIKELNUMMER textbox -->
    <div>
       <label for="new_nachrichtenfeld_id">Nachrichtenfeld_id:</label>
        <input id="new_nachrichtenfeld_id" name="nachrichtenfeld_id" type="text" maxlength="20">
    </div>
    <br>
	
	<div>
        <label for="anzahl_von_online_nutzerinnen">anzahl_von_online_nutzerinnen:</label>
        <input id="new_anzahl_von_online_nutzerinnen" name="anzahl_von_online_nutzerinnen" type="text" maxlength="20">
    </div>
    <br>

    <!-- Submit button -->
    <div>
        <button type="submit">
            Update Nachrichtenfeld
        </button>
    </div>
</form>
<br>
<hr>



<!-- Delete Nachrichtenfeld -->
<h2>Delete Nachrichtenfeld: </h2>
<form method="post" action="delNachrichtenFeld.php">
    <!-- Nachrichtenfeld textbox -->
    <div>
        <label for="new_nachrichtenfeld_id">Nachrichtenfeld_id:</label>
        <input id="new_nachrichtenfeld_id" name="nachrichtenfeld_id" type="number" min="0">
    </div>
    <br>

    <!-- Submit button -->
    <div>
        <button type="submit">
            Delete Nachrichtenfeld
        </button>
    </div>
</form>
<br>
<hr>
<!--*************************************************************************************************-->

 


    <div>
        <a href='searchNachrichtenfeld.php'>Search Nachrichtenfeld =></a> 
    </div>
    <br>
    <hr>
    <br>

</div>


 

 


 


    <div>
        <a href='selectAllMessages.php'>Nachrichtenfeldliste ansehen=></a> 
    </div>
    <br>
    <hr>
    <br>

</div>


<!--*******************************************************************************************-->
<!-- Add FachlicheGruppe-->   
<h2>Add FachlicheGruppe: </h2>
<form method="post" action="addFachlicheGruppe.php">
 
    <div>
        <label for="new_gruppennummer">Gruppennummer:</label>
        <input id="new_gruppennummer" name="gruppennummer" type="text" maxlength="20">
    </div>
    <br>

 
    <div>
        <label for="new_bezeichnung">Bezeichnung:</label>
        <input id="new_bezeichnung" name="bezeichnung" type="text" maxlength="20">
    </div>
    <br>
    <!-- Submit button -->
    <div>
        <button type="submit">
            Add FachlicheGruppe
        </button>
    </div>
</form>
<br>
<hr>
 

  
 
<!--*************************************************************************************************-->

    <div>
        <a href='searchFachlicheGruppe.php'>Search FachlicheGruppe =></a> 
    </div>
    <br>
 
    <br>

</div>


 <hr>


    <div>
        <a href='selectAllGroups.php'>FachlicheGruppeliste ansehen=></a> 
    </div>
    <br>
    <hr>
    <br>

</div>

<!--******************************************************************************************************************-->

<!-- Add BachelorStudent-->
<h2>Add BachelorStudent: </h2>
<form method="post" action="addBachelorStudent.php">                

    <!-- ECTS_ANZAHL textbox -->
    <div>
        <label for="new_ects_anzahl">Ects_anzahl:</label>
        <input id="new_ects_anzahl" name="ects_anzahl" type="text" maxlength="20">
    </div>
    <br>

    <!-- Submit button -->
    <div>
        <button type="submit">
            Add BachelorStudent
        </button>
    </div>
</form>
<br>
<hr>


 
<!-- Update BachelorStudent -->
<h2>Update BachelorStudent: </h2>
<form method="post" action="updateBachelorStudent.php">
    <!-- MATRIKELNUMMER textbox -->
    <div>
       <label for="new_versicherungsnummer">Versicherungsnummer:</label>
        <input id="new_versicherungsnummer" name="versicherungsnummer" type="text" maxlength="20">
    </div>
    <br>
	
	<div>
        <label for="new_ects_anzahl">Ects_anzahl:</label>
        <input id="new_ects_anzahl" name="ects_anzahl" type="text" maxlength="20">
    </div>
    <br>

    <!-- Submit button -->
    <div>
        <button type="submit">
            Update BachelorStudent
        </button>
    </div>
</form>
<br>
<hr>



 
<h2>Delete BachelorStudent: </h2>
<form method="post" action="delBachelorStudent.php">
    <!-- Versicherungsnummer textbox -->
    <div>
        <label for="new_versicherungsnummer">BachelorStudent:</label>
        <input id="new_versicherungsnummer" name="id" type="number" min="0">
    </div>
    <br>

    <!-- Submit button -->
    <div>
        <button type="submit">
            Delete BachelorStudent
        </button>
    </div>
</form>
<br>
<hr>
<!--*************************************************************************************************-->


<!--*************************************************************************************************-->

    <div>
        <a href='searchBachelorStudent.php'>Search BachelorStudents =></a> 
    </div>
    <br>
 
    <br>

</div>


 <hr>


    <div>
        <a href='selectAllBachelorStudents.php'>BachelorStudentsliste ansehen=></a> 
    </div>
    <br>
    <hr>
    <br>

</div>

<!--******************************************************************************************************************-->

<!-- Add MasterStudent-->
<h2>Add MasterStudent: </h2>
<form method="post" action="addMasterStudent.php">                

    <!-- Physische_Adresse textbox -->
    <div>
        <label for="new_physische_adresse">Physische_Adresse:</label>
        <input id="new_physische_adresse" name="physische_adresse" type="text" maxlength="20">
    </div>
    <br>

    <!-- Submit button -->
    <div>
        <button type="submit">
            Add MasterStudent
        </button>
    </div>
</form>
<br>
<hr>




 



</body>
</html>
