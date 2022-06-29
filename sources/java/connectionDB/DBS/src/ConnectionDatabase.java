import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Arrays;
import java.util.HashSet;
import java.util.List;
import java.util.Random;
import java.util.Scanner;
import java.util.Set; 
 
public class ConnectionDatabase 
{

	 
	public static void main(String[] args) throws SQLException
	{
		try
		{
			// Loads the class "oracle.jdbc.driver.OracleDriver" into the memory
		      Class.forName("oracle.jdbc.driver.OracleDriver");

		      // Connection details
		      String database = "jdbc:oracle:thin:@oracle-lab.cs.univie.ac.at:1521:lab";
		      String user = "a11739713";
		      String pass = "dbs20";

		      // Establish a connection to the database
		      Connection con = DriverManager.getConnection(database, user, pass);
		      Scanner scan = null;
		      Statement stmt = con.createStatement(); 
		      PreparedStatement pre = null;
		      try
		      {
		      //Von der Tastatur einlesen
		    	 scan = new Scanner(System.in);
		    	 int n = 0;
		    	 if(scan != null)
		    	 {
		    		 System.out.println("Geben Sie die Anzahl ein: ");
		    		 n = scan.nextInt();
		    	 }
//****************************************************************************************************************************************************************
		    	 //INSERT INTO FACHLICHE GRUPPE
		    	 //create preparedStatement object
		    	 if(con != null)
		    	 {
		    		 pre = con.prepareStatement("insert into fachlichegruppe values(?, ?)"); 
		    	 }
		    	 
		    	 //read each group details from keyboard, set them to query
		    	 //and execute the query
		    	 if(scan != null && pre != null)
		    	 {
		    		for(int i = 1; i <= n; ++i)
		    		{
		    			System.out.println("Enter" + i +  "-te" + "Group Details");
		    			
		    			System.out.println("Geben Sie die Gruppennummer ein: ");
		    			int  nummer = scan.nextInt();
		    			
		    			System.out.println("Geben Sie die Bezeichnung ein: ");
		    			String bezeichnung = scan.next();
		    			
		    			//set these values query place holder
		    			
		    			pre.setInt(1, nummer);
		    			pre.setString(2, bezeichnung);
		    			
		    			
		    			//execute the query
		    			
		    			int res = pre.executeUpdate();
		    			if(res == 0)
		    				System.out.println("Group details are not inserted! ");
		    			else
		    				System.out.println("Group details are inserted! ");
		    		}
		    	 }
		    	 //INSERTED INTO FACHLICHE GRUPPE
//***************************************************************************************************INSERT INTO STUDENT******************************************************************************************
		   
		    	 
		    	
		    	 if(con != null)
		    	 {
		    		 pre = con.prepareStatement("insert into STUDENT values(?, ?, ?, ?)"); 
		    	 }
		    	 
		    	 //read each group details from keyboard, set them to query
		    	 //and execute the query
		    	 if(scan != null && pre != null)
		    	 {
		    		for(int i = 1; i <= n; ++i)
		    		{
		    			System.out.println("Enter" + i +  "-te " + "Zeile");
		    			
		    			System.out.println("Geben Sie die Matrikelnummer ein: ");
		    			int  m_nummer = scan.nextInt();
		    			
		    			System.out.println("Geben Sie  Vorname ein: ");
		    			String vorname = scan.next();
		    			
		    			System.out.println("Geben Sie Nachname ein: ");
		    			String nachname = scan.next();
		    			
		    			String studentname = vorname + " " + nachname;
		    			
		    			System.out.println("Geben Sie die ZugriffKennzahl ein: ");
		    			int  kennzahl = scan.nextInt();
		    			
		    			System.out.println("Geben Sie die NachrichtenFeldID ein: ");
		    			int  n_feld_id = scan.nextInt();
		    			
		    			//set these values query place holder
		    			
		    			pre.setInt(1, m_nummer);
		    			pre.setString(2, studentname);
		    			pre.setInt(3, kennzahl);
		    			pre.setInt(4, n_feld_id);

		    		    			//execute the query
		    			
		    			int res = pre.executeUpdate();
		    			if(res == 0)
		    				System.out.println("Student details are not inserted! ");
		    			else
		    				System.out.println("Student details are inserted! ");
		    		}
		    	 } 
		    
		    	 // M_nr = 11739713       N-feld_id =   20  kennzahl = 12281994
		    	String vornamen[] = {"Totu ", "Toti ",  "Lahlu ", "Johann ", "Friedrich ", "Heinrich ", "George ", "Christian ", "Christoph ",
		    			"Wilhelm ", 
		    			"Ludwig", "Ernst ",
		    			"Philipp ", "Karl ","Carl ", "Franz ", "Joachim ", 
		    			"Hans ", "Anton ", "August ", "Otto ", "Adam ", "Hermann ", "Andreas ", "Bernhard ", "Maria ", "Marie ", "Anna ", "Elisabeth ", "Sophie ", 
		    			"Dorothea ",
		    			"Charlotte ",
		    			"Katharina ", "Catharina ", "Eleonore ", "Amalie ", "Amalia ", "Christine ", "Magdalena ", "Luise ", "Henriette ", "Hedwig ", "Johanna ", 
		    			"Juliane ", 
		    			"Sibylla ", "Sophia ",
		    			"Wilhelmine ", "Barbara ",  "Elif ", "Zeynep ", "Hiranur ", "Miray ", "Zehra ",  "Ecrin ",  "Azra ", "Eylül ", "Adile ", "Afet ",  "Afife ", "Ahu ", "Alev ",
		    			
		    			 
		    			"Amina ", "Arzu ", "Asuman ", "Ayfer ",  "Canan ", "Cemre ", "Defne ", "Dilara ", "Ebru ", "Ece ", "Ekin ",  "Elif ", "Emine ", "Enise ", "Esin ",
		    			
		    			"Fadime ", "Fatma ", "Fazilet ", "Ferah ", "Figen ", "Filiz ", "Fulya ", "Gül ", "Gülistan ", "Gülsen ", "Gülseren ", "Hala ", "Hamida ", "Hanife ", "Hatice ",
		    			
		    			"Hayat ", "Hülya ", "Hümeyra ", "Ikbal ", "Inci ", "Khadidja ", "Lale ", "Leyla ", "Meral ", "Müjde ", "Nazan ", "Meryem ", "Nermin ", "Necla ", "Nezahat ", 
		    			
		    			"Nihan ", "Nilgün ", "Neriman ", "Nilüfer ", "Nuran ", "Nursen ", "Nilifer ", "Olgun ", "Özlem ", "Pinar ", "Rabia ", "Radija ", "Sahra ", "Saliha ", "Sedef ", 
		    			
		    			"Seher ", "Sema ", "Semra ", "Senay ", "Serbinaz ", "Sengül ", "Serap ", "Serpil ", "Seval ", "Sevda ", "Sevgi ", "Sercan ", "Sevim ", "Sergül ", "Sezen ", 
		    			
		    			"Sibel ", "Sidika ", "Sukaina ", "Sumaika ", "Suzan ", "Tansu ", "Tugba ", "Tülin ", "Yasemin ", "Yeliz ", "Yesim ", "Yeter ", "Zehra ", "Zeynep ", "Abdulkadir ", 
		    			
		    			"Abdullah ", "Adnan ", "Ahmet ", "Ali ", "Alparslan ", "Alper ", "Aslan ", "Atilla ", "Aziz ", "Baha ", "Bilal ", "Bora ", "Burhan ", "Cafer ", "Cem ", "Cemalettin",
		    		 
		    			"Emil ", "Cengiz ", "Cenk ", "Coskun ", "Cumhur ", "Cüneyt ", "Djabrail ", "Dursun ", "Emin ", "Enis ", "Ercan ", "Erdal ", "Erhan ", "Erkan ", "Erol ", "Ertan ",
		    			
		    			"Ertugrul ", "Eyüp ", "Faruk ", "Fatih ", "Fehmi ", "Feridun ", "Fuat ", "Gökhan ", "Gökmen ", "Habib ", "Huber ", "Halil ", "Haluk ", "Hamid ", "Hamit ", "Hamza ",
		    			
		    			"Harun ", "Hasan ", "Hayati ", "Hilmi ", "Hüseyin ", "Ibrahim ", "Idris ", "Ilhami ", "Ilyas ", "Isa ", "Ismail ", "Kadir ", "Kahraman ", "Kamber ", "Kamil ", "Kanteper ", 
		    			
		    			"Kasim ", "Kaya ", "Kazim  ", "Kemal ", "Kenan ", "Kubilay ", "Latif ", "Levent ", "Malik ", "Mehmet ", "Mesut ", "Mete ", "Metin ", "Muhammad ", "Muhlis ", "Muhsin ",
		    			
		    			"Murad ", "Murat ", "Musa ", "Mustafa ", "Nazim ", "Necati ", "Necip ", "Necmettin ", "Necmi ", "Nihat ", "Nuh ", "Numan ", "Nurettin ", "Olgun ", "Orhan ", "ÖmerOsman ",
		    			
		    			"Ozan ", "Özcan ", "Rafet ", "Rauf ", "Recep ", "Ridvan ", "Ruhi ", "Sadettin ", "Sadi ", "Sahin ", "Salih ", "Salim ", "Salman ", "Sami ", "Selcuk ", "Selim ", "Sener ",
		    			
		    			"Serdar ", "Siddik ", "Soner ", "Süleyman ", "Tahir ", "Tarik ", "Tayyib ", "Timur ", "Tolga ", "Tuncel ", "Turgut ", "Ufuk ", "Ugur ", "Utku ", "Yasar ", "Yildiray ",
		    			
		    			"Yildirim ", "Yunus ", "Yusuf ", "Zafer ", "Zeki ", "Zülfü", "Ahter ", "Akartürk ", "Nuri ", "Acan ", "Akgün ", "Anil ", "Arsal ", "Avunc ", "Ayca ", "Aycan ", "Aydan ",
		    			
		    			"Aydin ", "Aydinay ", "Ayhan ", "Aysen ", "Aytaç ", "Behzat ", "Bilge ", "Bircan ", "Birsen ", "Bülent ", "Çagri ", "Can ", "Candan ", "Cihan ", "Deniz ", "Derya ", "Devlet ",
		    			
		    			"Devran ", "Devrim ", "Dilek ", "Diler ", "Doga ", "Dogu ", "Duygu ", "Elçin ", "Engin ", "Erdem ", "Erden ", "Eren ", "Erinç ", "Esen ", "Ferda ", "Feza ", "Fikret ", "Firuz ",
		    			
		    			"Füruzan ", "Günay ", "Güral ", "Güray ", "Gürcan ", "Güven ", "Hikmet ", "Hilal ", "Ihsan ", "Ilhan ", "Irfan ", "Isik ", "Ismet ", "Kader ", "Melek ", "Kiymet ", "Kulthum ", 
		    			
		    			"Muhterem ", "Muzaffer ", "Nedret ", "Nur ", "Nusret ", "Nüzhet ", "Özden ", "Özen ", "Özer ", "Özgün ", "Rüçhan ", "Safa ", "Safak ", "Saffet ", "Seçkin ", "Senel ", "Servet ",
		    			
		    			"Seyhan ", "Sezer ", "Suad ", "Suat ", "Sümer ", "Süreyya ", "Ümit ", "Umut ", "Uzay ", "Yasar ", "Yükse ", "Yüksel"};
		    	
		      
		    	String nachnamen[] = {"Hannak", "Hofmann", "Huber", "Bauer", "Hanika", "Horak", "Nowak", "Noack", "Krahl", "Kroll", "Kralik", "Kafka", "Juskowiak", "Szepan", "Kuzorra", 
		    			"Sobotka", "Müller", "Schmidt", "Schneider","Fischer", "Weber", "Meyer", "Wagner", "Schulz", "Becker", "Hoffmann", "Schäfer", "Koch",
		    			"Richter",  "Klein", "Wolf", "Schröder","Neumann", "Schwarz", "Zimmermann", "Braun",  "Krüger", "Hartmann", "Lange",
		    			"Schmitt", "Werner", "Schmitz", "Krause", "Meier", "Lehmann", "Schmid", "Schulze", "Maier", "Köhler", "Herrmann", "Walter", "König", 
		    			"Mayer",  "Yilmaz", "Kaya", "Demir", "Çelik", "Şahin", " Yıldız", "Yıldırım", " Öztürk", " Aydın", "Özdemir", " Arslan", "Doğan", 
		    			"Kılıç", "Aslan", "Çetin", "Kara", "Koç", "Özkan", "Kurt", "Şimşek", "Polat", "Özcan", "Korkmaz", "Çakır", "Erdoğan", "Yavuz", "Can", "Acar",
		    			"Şen", "Aktaş", "Güler", "Yalçın", "Güneş", "Bozkurt", "Bulut", "Keskin", "Ünal", "Turan", "Gül", "Özer", "Işık", "Kaplan", "Avcı", "Sarı", "Tekin", 
		    			"Taş", "Köse", " Yüksel", "Ateş", "Aksoy"};
		    	
		    	 Set<String> studentnamen   = new HashSet<String>();  
		    	// Set<String> nutzer_namen   = new HashSet<String>();  
 		         
		    	String wohnort[] = {"Amstetten", "Ansfelden", "Altenberg", "Bad_Aussee", "Bad Fischau-Brunn", "Bad Fischau-Brunn", "Bad Ischl", "Baden", "Bischofshofen", "Bludenz", "Braunau am Inn", "Bregenz", 
		                          "Bruck an der Mur", "Deutschlandsberg", "Dornbirn", "Ebensee", "Eisenerz", "Eisenstadt", "Enns", "Feldkirch", "Freistadt", "Fürstenfeld", "Gmunden", "Gmünd", "Graz",
		                       "Hallein", "Hallstatt", "Hartberg", "Hollabrunn", "Horn", "Imst", "Innsbruck", "Judenburg", "Kapfenberg", "Kirchdorf", "Kitzbühel", "Klagenfurt", "Klosterneuburg", "Krems", 
		                       "Kufstein", "ATLAN", "Leoben", "Lenzing", "Leonding", "Lienz", "Liezen", "Linz", "Mariazell", "Mauthausen", "Mittersill", "Mödling", "Mürzzuschlag", "Neunkirchen", "Poysdorf", 
		                       "Ried", "Innkreis", "Pölten ", "Schärding", "Schwaz", "Spittal", "Stockerau", "Traun", "Vienna", "Villach", "Wels", "Neustadt", "Wolfsberg", "Wörgl", "Zeltweg", "Zwettl"};
		       	
 	 
 	 
 	
   
  
 	
 	
  
  
   
 
  
  
 
 


 
 
  
		      
		    /*	int nachrichten_feld_id  =  1390;
		    	int zugriff_kennzahl = 12332125;
		    	int matrikel_nr  = 12139845;
		    	try
		    	{
			        for(int i = 0; i < 5000; ++i)
			    	{
			    		 matrikel_nr  +=  1;
			    		 
				    	 studentnamen.add(vornamen[new Random().nextInt(vornamen.length - 1)] + nachnamen[new Random().nextInt(nachnamen.length - 1)]);
				         List<Object> student_list = Arrays.asList(studentnamen.toArray());
				         
				         nachrichten_feld_id += 10;
				         
				         zugriff_k
				         ennzahl +=  1;
				          
				    	 String insertSql = "INSERT INTO STUDENT VALUES(" +matrikel_nr+ ",  '" +student_list.get(i)+ "', " +zugriff_kennzahl+ ", " +nachrichten_feld_id+ ")";    
	 			    	 stmt.executeUpdate(insertSql); 
			    	}
		    	}
		    	catch( ArrayIndexOutOfBoundsException e ) 
		    	{ 
		    	   System.out.println( "" );
		    	}*/
//************************************************************************INSERTED INTO STUDENT *************************************************************************************
		    	
		    	 
		    	 
		 
//************************************************************************INSERT INTO NACHRICHTEN_FELD*******************************************************************************		    	
			     int n_feld_id = 10;
			     int anzahl_online;
			     int anzahl_nachrichten; 
			    		 
		    	 for(int i = 0; i < 5000; ++i)
			     {
		    		 n_feld_id += 10;
		    		 anzahl_online = 100 + new Random().nextInt(4500);
		    		 anzahl_nachrichten = 13 + new Random().nextInt(25);
		    		 String insertSql = "INSERT INTO NachrichtenFeld VALUES(" +n_feld_id+ ",  " +anzahl_online+ ", " +anzahl_nachrichten+ ")";                                                               
					 stmt.executeUpdate(insertSql);
			     }
		    	 
//************************************************************************INSERTED INTO NACHRICHTEN_FELD*******************************************************************************		    	

//************************************************************************INSERT INTO Posting_FELD*************************************************************************************    	
 				     int posting_feld_id = 2222;
				     int anzahl_posten = 2;
				    		 
			    	 for(int i = 0; i < 4500; ++i)
				     {
			    		 posting_feld_id += 10;
			    		 anzahl_posten += new Random().nextInt(3333);
			    		 String insertSql = "INSERT INTO PostingFeld VALUES(" +posting_feld_id+ ",   " +anzahl_posten+ ")";                                                               
						 stmt.executeUpdate(insertSql);
				     }
//************************************************************************INSERTED INTO Posting_FELD*************************************************************************************    	

//************************************************************************INSERT INTO BachelorStudent*************************************************************************************    	
 				     int versicherungsnummer = 77777777;
				     int ects = 12;
				    		 
			    	 for(int i = 0; i < 1000; ++i)
				     {
			    		 versicherungsnummer += 3;
			    		 ects+= new Random().nextInt(168);
			    		 String insertSql = "INSERT INTO BachelorStudent VALUES(" +versicherungsnummer+ ",   " +ects+ ")"; 
			    		 ects = 12;                                                              
						 stmt.executeUpdate(insertSql);
				     }
		    	 
		    	 
		    	 
		    	 
	//************************************************************************INSERTED INTO BachelorStudent*************************************************************************************    	

		    	 
		    	//************************************************************************INSERT INTO Posten*************************************************************************************    	
				  
				      int post_id = 0;
				      int m_nr = 11739834;
				      int g_nr = 230;
				      int p_feld_id = 16692;	 
			    	 for(int i = 0; i < 10; ++i)
				     {
				     	 ++post_id;
			    		 ++m_nr;
			    		 ++g_nr;
			    		 p_feld_id += 10;
			    		 String insertSql = "INSERT INTO Posten VALUES(" +post_id+ ", " +m_nr+ ",   " +g_nr+ ", " +p_feld_id+ ")";                                                               
						 stmt.executeUpdate(insertSql);
				     }
	//************************************************************************INSERTED INTO Posten*************************************************************************************    	
                     
		  //The commented Code works too!!!  	 
//************************************************************************INSERT INTO Posten*************************************************************************************    	
				   
				      int post_id = 10;
				      int m_nr = 11739844;
				      int g_nr = 240;
				      int p_feld_id = 16792;	 
			    	 for(int i = 0; i < 40; ++i)
				     {
				     	 ++post_id;
			    		 ++m_nr;
			    		 ++g_nr;
			    		 p_feld_id += 10;
			    		 String insertSql = "INSERT INTO Posten VALUES(" +post_id+ ", " +m_nr+ ",   " +g_nr+ ", " +p_feld_id+ ")";                                                               
						 stmt.executeUpdate(insertSql);
				     }
	//************************************************************************INSERTED INTO Posten*************************************************************************************    	

			    	 
		    	 
		    	//************************************************************************INSERT INTO Posten*************************************************************************************    	
				   
			         int post_id = 64;
				     int m_nr = 11739898;
				     int g_nr = 131;
				     int p_feld_id = 17332;	 
			    	 for(int i = 0; i < 17; ++i)
				     {
				     	 ++post_id;
			    		 ++m_nr;
			    		 ++g_nr;
			    		 p_feld_id += 10;
			    		 String insertSql = "INSERT INTO Posten VALUES(" +post_id+ ", " +m_nr+ ",   " +g_nr+ ", " +p_feld_id+ ")";                                                               
						 stmt.executeUpdate(insertSql);
				     }
//************************************************************************INSERTED INTO Posten*************************************************************************************    	
		    	 
		    	 
		    	 
//************************************************************************INSERT INTO Posten*************************************************************************************    	
				   
				         int post_id = 82;
					     int m_nr = 11739953;
					     int g_nr = 107;
					     int p_feld_id = 17512;	 
				    	 for(int i = 0; i < 15; ++i)
					     {
					     	 ++post_id;
				    		 ++m_nr;
				    		 ++g_nr;
				    		 p_feld_id += 10;
				    		 String insertSql = "INSERT INTO Posten VALUES(" +post_id+ ", " +m_nr+ ",   " +g_nr+ ", " +p_feld_id+ ")";                                                               
							 stmt.executeUpdate(insertSql);
					     }
//************************************************************************INSERTED INTO Posten*************************************************************************************    	
			    	 
	
				    	 
//************************************************************************INSERT INTO Posten*************************************************************************************    	
						   
					         int post_id = 112;
						     int m_nr = 11740482;
						     int g_nr = 89;
						     int p_feld_id = 17812;	 
					    	 for(int i = 0; i < 13; ++i)
						     {
						     	 ++post_id;
					    		 ++m_nr;
					    		 ++g_nr;
					    		 p_feld_id += 10;
					    		 String insertSql = "INSERT INTO Posten VALUES(" +post_id+ ", " +m_nr+ ",   " +g_nr+ ", " +p_feld_id+ ")";                                                               
								 stmt.executeUpdate(insertSql);
						     }
//************************************************************************INSERTED INTO Posten*************************************************************************************    	

					    	 
//************************************************************************INSERT INTO Posten*************************************************************************************    	
							   
					         int post_id = 125;
						     int m_nr = 1174055800;
						     int g_nr = 64;
						     int p_feld_id = 17942;	 
					    	 for(int i = 0; i < 12; ++i)
						     {
						     	 ++post_id;
					    		 ++m_nr;
					    		 ++g_nr;
					    		 p_feld_id += 10;
					    		 String insertSql = "INSERT INTO Posten VALUES(" +post_id+ ", " +m_nr+ ",   " +g_nr+ ", " +p_feld_id+ ")";                                                               
								 stmt.executeUpdate(insertSql);
						     }
//************************************************************************INSERTED INTO Posten*************************************************************************************    	
					    	 

					    	 
//************************************************************************INSERT INTO Posten*************************************************************************************    	
							   
					         int post_id = 137;
						     int m_nr = 11740372;
						     int g_nr = 201;
						     int p_feld_id = 18062;	 
					    	 for(int i = 0; i < 5; ++i)
						     {
						     	 ++post_id;
					    		 ++m_nr;
					    		 ++g_nr;
					    		 p_feld_id += 10;
					    		 String insertSql = "INSERT INTO Posten VALUES(" +post_id+ ", " +m_nr+ ",   " +g_nr+ ", " +p_feld_id+ ")";                                                               
								 stmt.executeUpdate(insertSql);
						     }
//************************************************************************INSERTED INTO Posten*************************************************************************************    	
					    	 

//************************************************************************INSERT INTO Posten*************************************************************************************    	
				   
			         int post_id = 157;
				     int m_nr = 11739728;
				     int g_nr = 331;
				     int p_feld_id = 18262;	 
			    	 for(int i = 0; i < 10; ++i)
				     {
				     	 ++post_id;
			    		 ++m_nr;
			    		 ++g_nr;
			    		 p_feld_id += 10;
			    		 String insertSql = "INSERT INTO Posten VALUES(" +post_id+ ", " +m_nr+ ",   " +g_nr+ ", " +p_feld_id+ ")";                                                               
						 stmt.executeUpdate(insertSql);
				     }
//************************************************************************INSERTED INTO Posten*************************************************************************************    	
			    	 

			    	 
//************************************************************************INSERT INTO Posten*************************************************************************************    	
					   
			         int post_id = 177;
				     int m_nr = 11739748;
				     int g_nr = 0;
				     int p_feld_id = 18362;	 
			    	 for(int i = 0; i < 3; ++i)
				     {
				     	 ++post_id;
			    		 ++m_nr;
			    		 ++g_nr;
			    		 p_feld_id += 10;
			    		 String insertSql = "INSERT INTO Posten VALUES(" +post_id+ ", " +m_nr+ ",   " +g_nr+ ", " +p_feld_id+ ")";                                                               
						 stmt.executeUpdate(insertSql);
				     }
//************************************************************************INSERTED INTO Posten*************************************************************************************    	
			    	 
			    	 
//************************************************************************INSERT INTO Posten*************************************************************************************    	
				   
		         int post_id = 180;
			     int m_nr = 11739751;
			     int g_nr = 54;
			     int p_feld_id = 18392;	 
		    	 for(int i = 0; i < 8; ++i)
			     {
			     	 ++post_id;
		    		 ++m_nr;
		    		 ++g_nr;
		    		 p_feld_id += 10;
		    		 String insertSql = "INSERT INTO Posten VALUES(" +post_id+ ", " +m_nr+ ",   " +g_nr+ ", " +p_feld_id+ ")";                                                               
					 stmt.executeUpdate(insertSql);
			     }
//************************************************************************INSERTED INTO Posten*************************************************************************************    	
		    	 
		    	 
//************************************************************************INSERT INTO Posten*************************************************************************************    	
				   
		         int post_id = 194;
			     int m_nr = 117495355;
			     int g_nr = 348;
			     int p_feld_id = 18532;	 
		    	 for(int i = 0; i < 6; ++i)
			     {
			     	 ++post_id;
		    		 ++m_nr;
		    		 ++g_nr;
		    		 p_feld_id += 10;
		    		 String insertSql = "INSERT INTO Posten VALUES(" +post_id+ ", " +m_nr+ ",   " +g_nr+ ", " +p_feld_id+ ")";                                                               
					 stmt.executeUpdate(insertSql);
			     }
//************************************************************************INSERTED INTO Posten*************************************************************************************    	
		    	 

//************************************************************************INSERT INTO MasterStudent*************************************************************************************    	
				   
		      
			     int ausweis_nr = 88888888;
			     String adresse;	 
		    	 for(int i = 0; i < 200; ++i)
			     { 
		    		 ++ausweis_nr;
		    		 adresse = wohnort[new Random().nextInt(wohnort.length - 1)];
		    		 String insertSql = "INSERT INTO MasterStudent VALUES(" +ausweis_nr+ ", '" +adresse+ "')";                                                               
					 stmt.executeUpdate(insertSql);
			     }
//**********************************************************************INSERTED INTO MasterStudent*************************************************************************************    	
		    	 
		    	
		    	 
//************************************************************************INSERT INTO GruuppeMedia*************************************************************************************    	
				   
		    	     
		    	     String Maßeinheit[] = {"mb", "gb", "tb", "pb", "kib", "mib", "tib"};
		    	 
			         int galerie_id = 0;
			         int anzahl_photo = 8;
			         int anzahl_video = 11; 
				     int gr_nr = 240;
				     String menge;	 
				     int amount = 100;
			    	 for(int i = 0; i < 40; ++i)
				     { 
			    		 ++galerie_id;
			    		 anzahl_photo += new Random().nextInt(3000);
			    		 anzahl_video += new Random().nextInt(700);
			    		 ++gr_nr;
			    		 amount += 10;
			    		 menge = String.valueOf(amount) + Maßeinheit[new Random().nextInt(Maßeinheit.length - 1)];
			    		 String insertSql = "INSERT INTO GruppeMedia VALUES(" +galerie_id+ ", " +anzahl_photo+ ", " +anzahl_video+ ", " +gr_nr+ ", '" +menge+ "')"; 
			    		 anzahl_photo = 8;
			    		 anzahl_video = 11;
						 stmt.executeUpdate(insertSql);
				     }
//************************************************************************INSERTED INTO GruppeMedia*************************************************************************************    	
		    	 

			    	 
			    	 
//************************************************************************INSERT INTO GruuppeMedia*************************************************************************************    	
					   
			         /*int galerie_id = 132;
			         int anzahl_photo = 8;
			         int anzahl_video = 11; 
				     int gr_nr = 348;
				     String menge;	 
				     int amount = 100;
			    	 for(int i = 0; i < 6; ++i)
				     { 
			    		 ++galerie_id;
			    		 anzahl_photo += new Random().nextInt(3000);
			    		 anzahl_video += new Random().nextInt(700);
			    		 ++gr_nr;
			    		 amount += 10;
			    		 menge = String.valueOf(amount) + Maßeinheit[new Random().nextInt(Maßeinheit.length - 1)];
			    		 String insertSql = "INSERT INTO GruppeMedia VALUES(" +galerie_id+ ", " +anzahl_photo+ ", " +anzahl_video+ ", " +gr_nr+ ", '" +menge+ "')"; 
			    		 anzahl_photo = 8;
			    		 anzahl_video = 11;
						 stmt.executeUpdate(insertSql);
				     }*/
//************************************************************************INSERTED INTO GruppeMedia*************************************************************************************    	
			    	 
			    	 
			    	 
 		      }
		     catch(SQLException se)
		      {
		    	  se.printStackTrace();
		      }
		      catch(Exception e)
		      {
		    	 e.printStackTrace(); 
		      }
		      
		   // Insert a single dataset into the table "Fachliche Gruppe"
		      try 
		      {
		    	  String insertSql = "INSERT INTO FACHLICHEGRUPPE VALUES(108, 'Genetics')";                                                              
		    	  
		    	//executeUpdate Method: Executes the SQL statement, which can be an INSERT, UPDATE, or DELETE statement
		          int rowsAffected = stmt.executeUpdate(insertSql); 
		      }
		      catch (Exception e) {
		          System.err.println("Error while executing INSERT INTO statement: " + e.getMessage());
		        } 
		     
		      
		   // Check number of datasets in FachlicheGruppe  table 
		      ResultSet rs = stmt.executeQuery("SELECT COUNT(*) FROM FACHLICHEGRUPPE");
		      if (rs.next())
		      {
		        int count_group = rs.getInt(1);
		      System.out.println("Number of grup_data: " + count_group); 
		      }
		      
		      
		      ResultSet rs_s = stmt.executeQuery("SELECT COUNT(*) FROM STUDENT");
		      if(rs_s.next())
		      {
		    	  int count_student = rs_s.getInt(1);
		    	  System.out.println("Number of student_data: " + count_student);
		      }
		      
		      ResultSet rs_n = stmt.executeQuery("SELECT COUNT(*) FROM NachrichtenFeld");
		      if(rs_n.next())
		      {
		    	  int count_nachrichten_feld = rs_n.getInt(1);
		    	  System.out.println("Number of nachricht_feld_data: " + count_nachrichten_feld);
		      }
		      
		      ResultSet rs_p = stmt.executeQuery("SELECT COUNT(*) FROM PostingFeld");
		      if(rs_p.next())
		      {
		    	  int count_posting_feld = rs_p.getInt(1);
		    	  System.out.println("Number of posting_feld_data: " + count_posting_feld);
		      }
		      
		      
		      ResultSet rs_bs= stmt.executeQuery("SELECT COUNT(*) FROM BachelorStudent");
		      if(rs_bs.next())
		      {
		    	  int count_bachelorstudent_feld = rs_bs.getInt(1);
		    	  System.out.println("Number of bachelorstudent_data: " + count_bachelorstudent_feld);
		      }
		      
		      
		      ResultSet rs_post= stmt.executeQuery("SELECT COUNT(*) FROM Posten");
		      if(rs_post.next())
		      {
		    	  int count_posten = rs_post.getInt(1);
		    	  System.out.println("Number of posten_data: " + count_posten);
		      }
		      
		      ResultSet rs_m = stmt.executeQuery("SELECT COUNT(*) FROM MasterStudent");
		      if(rs_m.next())
		      {
		    	  int count_posten = rs_m.getInt(1);
		    	  System.out.println("Number of masterstudent_data: " + count_posten);
		      }
		      
		      ResultSet rs_gm = stmt.executeQuery("SELECT COUNT(*) FROM GruppeMedia");
		      if(rs_gm.next())
		      {
		    	  int count_posten = rs_gm.getInt(1);
		    	  System.out.println("Number of gruppe_media_data: " + count_posten);
		      }
		}
		catch(Exception e)
		{
			System.err.println(e.getMessage());
		}
	}
}
