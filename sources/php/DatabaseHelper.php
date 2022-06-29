<?php

class DatabaseHelper
{
    // Since the connection details are constant, define them as const
    // We can refer to constants like e.g. DatabaseHelper::username
    const username = 'a11739713'; // use a + your matriculation number
    const password = 'dbs20'; // use your oracle db password
    const con_string = 'oracle-lab.cs.univie.ac.at:1521/lab';

    // Since we need only one connection object, it can be stored in a member variable.
    // $conn is set in the constructor.
    protected $conn;

    // Create connection in the constructor
    public function __construct()
    {
        try {
            // Create connection with the command oci_connect(String(username), String(password), String(connection_string))
            // The @ sign avoids the output of warnings
            // It could be helpful to use the function without the @ symbol during developing process
            $this->conn = @oci_connect(
                DatabaseHelper::username,
                DatabaseHelper::password,
                DatabaseHelper::con_string
            );

            //check if the connection object is != null
            if (!$this->conn) {
                // die(String(message)): stop PHP script and output message:
                die("DB error: Connection can't be established!");
            }

        } catch (Exception $e) {
            die("DB error: {$e->getMessage()}");
        }
    }

    public function __destruct()
    {
        // clean up
        @oci_close($this->conn);
    }

    // This function creates and executes a SQL select statement and returns an array as the result
    // 2-dimensional array: the result array contains nested arrays (each contains the data of a single row)
  /*  public function selectAllStudents($matrikelnummer, $studentname, $zugriffkennzahl, $nachrichtenfeld_id)
    {
        // Define the sql statement string
        $sql = "SELECT * FROM student
            WHERE matrikelnummer LIKE '%{$matrikelnummer}%'
              AND upper(studentname) LIKE upper('%{$studentname}%')
              AND zugriffkennzahl LIKE '%{$zugriffkennzahl}%'
			  AND nachrichtenfeld_id LIKE '%{$nachrichtenfeld_id}%'
            ORDER BY MATRIKELNUMMER ASC";

        // oci_parse(...) prepares the Oracle statement for execution
        // notice the reference to the class variable $this->conn (set in the constructor)
        $statement = @oci_parse($this->conn, $sql);
		// Executes the statement
        @oci_execute($statement);

        // Fetches multiple rows from a query into a two-dimensional array
        // Parameters of oci_fetch_all:
        //   $statement: must be executed before
        //   $res: will hold the result after the execution of oci_fetch_all
        //   $skip: it's null because we don't need to skip rows
        //   $maxrows: it's null because we want to fetch all rows
        //   $flag: defines how the result is structured: 'by rows' or 'by columns'
        //      OCI_FETCHSTATEMENT_BY_ROW (The outer array will contain one sub-array per query row)
        //      OCI_FETCHSTATEMENT_BY_COLUMN (The outer array will contain one sub-array per query column. This is the default.)
        @oci_fetch_all($statement, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);

        //clean up;
        @oci_free_statement($statement);

        return $res;
    }*/

    // This function creates and executes a SQL insert statement and returns true or false
    public function insertIntoStudent($matrikelnummer, $studentname, $zugriffkennzahl, $nachrichtenfeld_id)
    {
        $sql = "INSERT INTO STUDENT (matrikelnummer, studentname, zugriffkennzahl, nachrichtenfeld_id) VALUES ('{$matrikelnummer}', '{$studentname}', '{$zugriffkennzahl}', '{$nachrichtenfeld_id}')";

        $statement = @oci_parse($this->conn, $sql);
        $success = @oci_execute($statement) && @oci_commit($this->conn);
        @oci_free_statement($statement);
        return $success;
    }

    // Using a Procedure
    // This function uses a SQL procedure to delete a person and returns an errorcode (&errorcode == 1 : OK)
    /*public function deleteStudent($matrikelnummer)
    {
        // It is not necessary to assign the output variable,
        // but to be sure that the $errorcode differs after the execution of our procedure we do it anyway
        $errorcode = 0;

         
        // The SQL string
        $sql = 'BEGIN P_DELETE_STUDENT(:matrikelnummer, :errorcode); END;';
        $statement = oci_parse($this->conn, $sql);

        //  Bind the parameters
        oci_bind_by_name($statement, ':matrikelnummer', $matrikelnummer);
        oci_bind_by_name($statement, ':errorcode', $errorcode);

        // Execute Statement
        oci_execute($statement);

        //Note: Since we execute COMMIT in our procedure, we don't need to commit it here.
        //@oci_commit($statement); //not necessary

        //Clean Up
        oci_free_statement($statement);

        //$errorcode == 1 => success
        //$errorcode != 1 => Oracle SQL related errorcode;
        return $errorcode;
    }*/



 public function updateStudent($matrikelnummer, $zugriffkennzahl)
 {
              $sql = "UPDATE Student
			  SET zugriffkennzahl =   $zugriffkennzahl
			  WHERE matrikelnummer = $matrikelnummer";
 		      $statement = @oci_parse($this->conn, $sql);
              $success = @oci_execute($statement) && @oci_commit($this->conn);
              @oci_free_statement($statement);

              return $success;
 }


public function deleteStudent($matrikelnummer)
 {

      $errorcode = 0;
      $sql = 'BEGIN P_DELETE_STUDENT(:matrikelnummer, :errorcode); END;';
      $statement = @oci_parse($this->conn, $sql);
      @oci_bind_by_name($statement, ':matrikelnummer', $matrikelnummer);
      @oci_bind_by_name($statement, ':errorcode', $errorcode);
      @oci_execute($statement);
      @oci_free_statement($statement);
      return $errorcode;
 }
/*
public function searchStudent($matrikelnummer)
 {
              $sql = "SELECT *FROM Student
			  WHERE matrikelnummer = $matrikelnummer";
 		      $statement = @oci_parse($this->conn, $sql);
              $success = @oci_execute($statement) && @oci_commit($this->conn);
              @oci_free_statement($statement);

              return $success;
 }
*/

    // This function creates and executes a SQL select statement and returns an array as the result
    // 2-dimensional array: the result array contains nested arrays (each contains the data of a single row)
    public function selectAllStudents($matrikelnummer, $studentname, $zugriffkennzahl, $nachrichtenfeld_id)
    {
        // Define the sql statement string
         $sql = "SELECT * FROM student
            WHERE matrikelnummer LIKE '%{$matrikelnummer}%'
              AND upper(studentname) LIKE upper('%{$studentname}%')
              AND zugriffkennzahl LIKE '%{$zugriffkennzahl}%'
			  AND nachrichtenfeld_id LIKE '%{$nachrichtenfeld_id}%'
              ORDER BY matrikelnummer ASC";

        // oci_parse(...) prepares the Oracle statement for execution
        // notice the reference to the class variable $this->conn (set in the constructor)
        $statement = @oci_parse($this->conn, $sql);
		// Executes the statement
        @oci_execute($statement);

        // Fetches multiple rows from a query into a two-dimensional array
        // Parameters of oci_fetch_all:
        //   $statement: must be executed before
        //   $res: will hold the result after the execution of oci_fetch_all
        //   $skip: it's null because we don't need to skip rows
        //   $maxrows: it's null because we want to fetch all rows
        //   $flag: defines how the result is structured: 'by rows' or 'by columns'
        //      OCI_FETCHSTATEMENT_BY_ROW (The outer array will contain one sub-array per query row)
        //      OCI_FETCHSTATEMENT_BY_COLUMN (The outer array will contain one sub-array per query column. This is the default.)
        @oci_fetch_all($statement, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);

        //clean up;
        @oci_free_statement($statement);

        return $res;
    }

 //Nachrichtenfeld

 // This function creates and executes a SQL select statement and returns an array as the result
    // 2-dimensional array: the result array contains nested arrays (each contains the data of a single row)
    /*public function selectAllMessages($nachrichtenfeld_id, $anzahl_von_online_nutzerinnen, $anzahl_von_ungelesenen_nachrichten)
    {
        // Define the sql statement string
        // Notice that the parameters $person_id, $surname, $name in the 'WHERE' clause
         $sql = "SELECT * FROM nachrichtenfeld
            WHERE nachrichtenfeld_id LIKE '%{$nachrichtenfeld_id}%'
              AND anzahl_von_online_nutzerinnen LIKE '%{$anzahl_von_online_nutzerinnen}%')
              AND anzahl_von_ungelesenen_nachrichten LIKE '%{$anzahl_von_ungelesenen_nachrichten}%'
            ORDER BY nachrichtenfeld_id ASC";


        // oci_parse(...) prepares the Oracle statement for execution
        // notice the reference to the class variable $this->conn (set in the constructor)
        $statement = @oci_parse($this->conn, $sql);

        // Executes the statement
        @oci_execute($statement);

        // Fetches multiple rows from a query into a two-dimensional array
        // Parameters of oci_fetch_all:
        //   $statement: must be executed before
        //   $res: will hold the result after the execution of oci_fetch_all
        //   $skip: it's null because we don't need to skip rows
        //   $maxrows: it's null because we want to fetch all rows
        //   $flag: defines how the result is structured: 'by rows' or 'by columns'
        //      OCI_FETCHSTATEMENT_BY_ROW (The outer array will contain one sub-array per query row)
        //      OCI_FETCHSTATEMENT_BY_COLUMN (The outer array will contain one sub-array per query column. This is the default.)
        @oci_fetch_all($statement, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);

        //clean up;
        @oci_free_statement($statement);

        return $res;
    }*/


	 public function selectAllMessages()
    {
        // Define the sql statement string
        // Notice that the parameters $person_id, $surname, $name in the 'WHERE' clause
         $sql = "SELECT * FROM nachrichtenfeld";


        // oci_parse(...) prepares the Oracle statement for execution
        // notice the reference to the class variable $this->conn (set in the constructor)
        $statement = @oci_parse($this->conn, $sql);

        // Executes the statement
        @oci_execute($statement);

        // Fetches multiple rows from a query into a two-dimensional array
        // Parameters of oci_fetch_all:

        //   $statement: must be executed before
        //   $res: will hold the result after the execution of oci_fetch_all
        //   $skip: it's null because we don't need to skip rows
        //   $maxrows: it's null because we want to fetch all rows
        //   $flag: defines how the result is structured: 'by rows' or 'by columns'
        //      OCI_FETCHSTATEMENT_BY_ROW (The outer array will contain one sub-array per query row)
        //      OCI_FETCHSTATEMENT_BY_COLUMN (The outer array will contain one sub-array per query column. This is the default.)
        @oci_fetch_all($statement, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);

        //clean up;
        @oci_free_statement($statement);

        return $res;
    }

//INSERT Nachrichtenfeld

// This function creates and executes a SQL insert statement and returns true or false
    public function insertIntoNachrichtenfeld($anzahl_von_online_nutzerinnen,			    			$anzahl_von_ungelesenen_nachrichten)
    {
        $sql = "INSERT INTO Nachrichtenfeld (anzahl_von_online_nutzerinnen, anzahl_von_ungelesenen_nachrichten) VALUES ('{$anzahl_von_online_nutzerinnen}', '{$anzahl_von_ungelesenen_nachrichten}')";

        $statement = @oci_parse($this->conn, $sql);
        $success = @oci_execute($statement) && @oci_commit($this->conn);
        @oci_free_statement($statement);
        return $success;
    }

//Update Nachrichtenfeld

public function updateNachrichtenfeld($nachrichtenfeld_id, $anzahl_von_online_nutzerinnen)
 {
              $sql = "UPDATE nachrichtenfeld
			  SET anzahl_von_online_nutzerinnen =   $anzahl_von_online_nutzerinnen
			  WHERE nachrichtenfeld_id = $nachrichtenfeld_id";
 		      $statement = @oci_parse($this->conn, $sql);
              $success = @oci_execute($statement) && @oci_commit($this->conn);
              @oci_free_statement($statement);

              return $success;
 }





//Delete Nachrichtenfeld



// Using a Procedure
    // This function uses a SQL procedure to delete a person and returns an errorcode (&errorcode == 1 : OK)
    public function deleteNachrichtenfeld($nachrichtenfeld_id)
    {
        // It is not necessary to assign the output variable,
        // but to be sure that the $errorcode differs after the execution of our procedure we do it anyway
        $errorcode = 0;

         
        // The SQL string
        $sql = 'BEGIN P_DELETE_NACHRICHTENFELD(:nachrichtenfeld_id, :errorcode); END;';
        $statement = @oci_parse($this->conn, $sql);

        //  Bind the parameters
        @oci_bind_by_name($statement, ':nachrichtenfeld_id', $nachrichtenfeld_id);
        @oci_bind_by_name($statement, ':errorcode', $errorcode);

        // Execute Statement
        @oci_execute($statement);
		 
        //Note: Since we execute COMMIT in our procedure, we don't need to commit it here.
        //@oci_commit($statement); //not necessary

        //Clean Up
        @oci_free_statement($statement);

        //$errorcode == 1 => success
        //$errorcode != 1 => Oracle SQL related errorcode;
        return $errorcode;
    }


//FachlicheGruppe

 // This function creates and executes a SQL select statement and returns an array as the result
    // 2-dimensional array: the result array contains nested arrays (each contains the data of a single row)
    public function selectAllGroups()
    {
        // Define the sql statement string
        // Notice that the parameters $person_id, $surname, $name in the 'WHERE' clause
        $sql = "SELECT* FROM fachlichegruppe";
        // oci_parse(...) prepares the Oracle statement for execution
        // notice the reference to the class variable $this->conn (set in the constructor)
        $statement = @oci_parse($this->conn, $sql);

        // Executes the statement
        @oci_execute($statement);

        // Fetches multiple rows from a query into a two-dimensional array
        // Parameters of oci_fetch_all:
        //   $statement: must be executed before
        //   $res: will hold the result after the execution of oci_fetch_all
        //   $skip: it's null because we don't need to skip rows
        //   $maxrows: it's null because we want to fetch all rows
        //   $flag: defines how the result is structured: 'by rows' or 'by columns'
        //      OCI_FETCHSTATEMENT_BY_ROW (The outer array will contain one sub-array per query row)
        //      OCI_FETCHSTATEMENT_BY_COLUMN (The outer array will contain one sub-array per query column. This is the default.)
        @oci_fetch_all($statement, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);
 		//clean up;
        @oci_free_statement($statement);

        return $res;
    }



//INSERT FachlicheGruppe

// This function creates and executes a SQL  insert statement and returns true or false
    public function insertIntoFachlicheGruppe($gruppennummer, $bezeichnung)
    {
        $sql = "INSERT INTO FachlicheGruppe  (gruppennummer, bezeichnung)  VALUES ('{$gruppennummer}', '{$bezeichnung}')";

        $statement = @oci_parse($this->conn, $sql);
        $success = @oci_execute($statement) && @oci_commit($this->conn);
        @oci_free_statement($statement);
        return $success;
    }

 

//INSERT FachlicheGruppe

// This function creates and executes a SQL  insert statement and returns true or false
    public function insertIntoBachelorStudent($ects_anzahl)
    {
        $sql = "INSERT INTO BachelorStudent  (ects_anzahl)  VALUES ('{$ects_anzahl}')";

        $statement = @oci_parse($this->conn, $sql);
        $success = @oci_execute($statement) && @oci_commit($this->conn);
        @oci_free_statement($statement);
        return $success;
    }

//Update BachelorStudent

public function updateBachelorStudent($versicherungsnummer, $ects_anzahl)
 {
              $sql = "UPDATE bachelorstudent
			  SET ects_anzahl =   $ects_anzahl
			  WHERE versicherungsnummer = $versicherungsnummer";
 		      $statement = @oci_parse($this->conn, $sql);
              $success = @oci_execute($statement) && @oci_commit($this->conn);

              @oci_free_statement($statement);

              return $success;
 }


//Delete BachelorStudent

public function deleteBachelorStudent($versicherungsnummer)
{

      $errorcode = 0;
      $sql = 'BEGIN P_DELETE_BACHELORSTUDENT(:versicherungsnummer, :errorcode); END;';
      $statement = @oci_parse($this->conn, $sql);
      @oci_bind_by_name($statement, ':versicherungsnummer', $versicherungsnummer);
      @oci_bind_by_name($statement, ':errorcode', $errorcode);
      @oci_execute($statement);
      @oci_free_statement($statement);
      return $errorcode;
}

 public function selectAllBachelorStudents()
    {
        // Define the sql statement string
        // Notice that the parameters $person_id, $surname, $name in the 'WHERE' clause
        $sql = "SELECT* FROM bachelorstudent";
        // oci_parse(...) prepares the Oracle statement for execution
        // notice the reference to the class variable $this->conn (set in the constructor)
        $statement = @oci_parse($this->conn, $sql);

        // Executes the statement
        @oci_execute($statement);

        // Fetches multiple rows from a query into a two-dimensional array
        // Parameters of oci_fetch_all:
        //   $statement: must be executed before
        //   $res: will hold the result after the execution of oci_fetch_all
        //   $skip: it's null because we don't need to skip rows
        //   $maxrows: it's null because we want to fetch all rows
        //   $flag: defines how the result is structured: 'by rows' or 'by columns'
        //      OCI_FETCHSTATEMENT_BY_ROW (The outer array will contain one sub-array per query row)
        //      OCI_FETCHSTATEMENT_BY_COLUMN (The outer array will contain one sub-array per query column. This is the default.)
        @oci_fetch_all($statement, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);
 		//clean up;
        @oci_free_statement($statement);

        return $res;
    }

// This function creates and executes a SQL  insert statement and returns true or false
    public function insertIntoMasterStudent($physische_adresse)
    {
        $sql = "INSERT INTO MasterStudent(physische_adresse)  VALUES ('{$physische_adresse}')";

        $statement = @oci_parse($this->conn, $sql);
        $success = @oci_execute($statement) && @oci_commit($this->conn);
        @oci_free_statement($statement);
        return $success;
    }


//Update MasterStudent 

public function updateMasterStudent($ausweisnummer, $physische_adresse)
{
              $sql = "UPDATE masterstudent
			  SET physische_adresse =   $physische_adresse
			  WHERE ausweisnummer = $ausweisnummer";
 		      $statement = @oci_parse($this->conn, $sql);
              $success = @oci_execute($statement) && @oci_commit($this->conn);
              @oci_free_statement($statement);

              return $success;
}
 
public function deleteMasterStudent($ausweisnummer)
{

      $errorcode = 0;
      $sql = 'BEGIN P_DELETE_MASTERSTUDENT(:ausweisnummer, :errorcode); END;';
      $statement = @oci_parse($this->conn, $sql);
      @oci_bind_by_name($statement, ':ausweisnummer', $ausweisnummer);               
      @oci_bind_by_name($statement, ':errorcode', $errorcode);
      @oci_execute($statement);
      @oci_free_statement($statement);
      return $errorcode;
}


}
