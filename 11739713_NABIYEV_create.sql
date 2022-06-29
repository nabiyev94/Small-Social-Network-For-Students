--------------------------------------------- create TABLE NACHRICHTENFELD ---------------------------------------------
CREATE TABLE NachrichtenFeld(
          NachrichtenFeld_ID INTEGER,
          Anzahl_von_online_NutzerInnen INTEGER, 
         Anzahl_von_ungelesenen_Nachrichten INTEGER,
        PRIMARY KEY(NachrichtenFeld_ID)
 );

 
CREATE SEQUENCE seq_nachrichtenfeld_id
  START WITH 1
  MINVALUE 1
  INCREMENT BY 1
  CACHE 100;
 
CREATE OR REPLACE TRIGGER tri_nachrichtenfeld_id
  BEFORE INSERT
  ON nachrichtenfeld
  FOR EACH ROW
  BEGIN
    SELECT seq_nachrichtenfeld_id.nextval
    INTO :new.nachrichtenfeld_id
    FROM dual;
  END;
/
--------------------------------------------- procedure
CREATE OR REPLACE PROCEDURE p_delete_nachrichtenfeld(
   p_nachrichtenfeld_id  IN  nachrichtenfeld.nachrichtenfeld_id%TYPE,
   p_error_code OUT NUMBER
)
AS
  BEGIN
    DELETE
    FROM nachrichtenfeld
    WHERE p_nachrichtenfeld_id = nachrichtenfeld.nachrichtenfeld_id;
 
    p_error_code := SQL%ROWCOUNT;
    IF (p_error_code = 1)
    THEN
      COMMIT;
    ELSE
      ROLLBACK;
    END IF;
    EXCEPTION
    WHEN OTHERS
    THEN
      p_error_code := SQLCODE;

  END p_delete_nachrichtenfeld;
/









--------------------------------------------- create TABLE STUDENT ---------------------------------------------
CREATE TABLE Student(
	Matrikelnummer INTEGER,
	Studentname CHAR(50), 
	Zugriffkennzahl INTEGER UNIQUE,
	NachrichtenFeld_ID INTEGER,
	PRIMARY KEY(Matrikelnummer),
	CONSTRAiNT n_feld FOREIGN KEY(NachrichtenFeld_ID) REFERENCES NachrichtenFeld ON DELETE CASCADE;
);

 
--------------------------------------------- procedure  ---------------------------------------------
CREATE OR REPLACE PROCEDURE p_delete_student(
   p_matrikelnummer  IN  student.matrikelnummer%TYPE,
   p_error_code OUT NUMBER
)
AS
  BEGIN
    DELETE
    FROM student
    WHERE p_matrikelnummer = student.matrikelnummer;
 
    p_error_code := SQL%ROWCOUNT;
    IF (p_error_code = 1)
    THEN
      COMMIT;
    ELSE
      ROLLBACK;
    END IF;
    EXCEPTION
    WHEN OTHERS
    THEN
      p_error_code := SQLCODE;
  END p_delete_student;
/





--------------------------------------------- create TABLE  FACHLICHEGRUPPE ---------------------------------------------
CREATE TABLE FachlicheGruppe(
	Gruppennummer INTEGER,
	Bezeichnung CHAR(15),
	PRIMARY KEY(Gruppennummer)
);
 


--------------------------------------------- create TABLE  POSTINGFELD---------------------------------------------

CREATE TABLE PostingFeld(
	PostingFeldID INTEGER, 
	Anzahl_von_neuen_Posten INTEGER,
	PRIMARY KEY(PostingFeldID)
);


--------------------------------------------- create TABLE  POSTEN ---------------------------------------------

CREATE TABLE posten(
 	posten_id INTEGER,
	Matrikelnummer INTEGER, 
	Gruppennummer INTEGER, 
	PostingFeldID INTEGER,
	PRIMARY KEY(posten_id),
	CONSTRAINT m_nummer FOREIGN KEY(Matrikelnummer) REFERENCES Student,
	CONSTRAINT g_nummer FOREIGN KEY(Gruppennummer) REFERENCES FachlicheGruppe,
	CONSTRAINT p_feld FOREIGN KEY(PostingFeldID) REFERENCES PostingFeld 
);

--------------------------------------------- create TABLE  GRUPPEMEDIA ---------------------------------------------


CREATE TABLE GruppeMedia(
	GalerieId INTEGER,
	Anzahl_von_Photos INTEGER, 
	Anzahl_von_Videos INTEGER,
	Gruppennummer INTEGER, 
	MengeAnDaten CHAR(30); 
	PRIMARY KEY(GalerieId),
	CONSTRAINT g_numm FOREIGN KEY(Gruppennummer) REFERENCES FachlicheGruppe 
);

--------------------------------------------- create TABLE  BACHELORSTUDENT ---------------------------------------------

CREATE TABLE BachelorStudent(
	Versicherungsnummer INTEGER, 
	ECTS_Anzahl INTEGER,
	PRIMARY KEY(Versicherungsnummer)
);

CREATE SEQUENCE v_numm_seq START WITH 77780778;

CREATE OR REPLACE TRIGGER BACHELOR_SEQUENCE
BEFORE INSERT ON BachelorStudent
FOR EACH ROW
BEGIN
	IF :new.Versicherungsnummer IS NULL THEN
            SELECT v_numm_seq.nextval INTO :new.Versicherungsnummer FROM DUAL;
	END IF;
END;
		

--------------------------------------------- procedure
CREATE OR REPLACE PROCEDURE p_delete_bachelorstudent(
   p_versicherungsnummer  IN  bachelorstudent.versicherungsnummer%TYPE,
   p_error_code OUT NUMBER
)
AS
  BEGIN
    DELETE
    FROM bachelorstudent
    WHERE p_versicherungsnummer = bachelorstudent.versicherungsnummer;
 
    p_error_code := SQL%ROWCOUNT;
    IF (p_error_code = 1)
    THEN
      COMMIT;
    ELSE
      ROLLBACK;
    END IF;
    EXCEPTION
    WHEN OTHERS
    THEN
      p_error_code := SQLCODE;
  END p_delete_bachelorstudent;
/



--------------------------------------------- create TABLE  MASTERSTUDENT ---------------------------------------------

CREATE TABLE MasterStudent(
	Ausweisnummer INTEGER, 
	Physische_Adresse CHAR(30),
	PRIMARY KEY(Ausweisnummer)
);


CREATE SEQUENCE numm_seq START WITH 234571;

CREATE OR REPLACE TRIGGER MASTER_SEQUENCE
BEFORE INSERT ON MasterStudent
FOR EACH ROW
BEGIN
	IF :new.Ausweisnummer IS NULL THEN
            SELECT numm_seq.nextval INTO :new.Ausweisnummer FROM DUAL;
	END IF;
END;
			
--------------------------------------------- procedure
CREATE OR REPLACE PROCEDURE p_delete_masterstudent(
   p_ausweisnummer  IN  masterstudent.ausweisnummer%TYPE,
   p_error_code OUT NUMBER
)
AS
  BEGIN
    DELETE
    FROM masterstudent
    WHERE p_ausweisnummer = masterstudent.ausweisnummer;
 
    p_error_code := SQL%ROWCOUNT;
    IF (p_error_code = 1)
    THEN
      COMMIT;
    ELSE
      ROLLBACK;
    END IF;
    EXCEPTION
    WHEN OTHERS
    THEN
      p_error_code := SQLCODE;
  END p_delete_masterstudent;
/

