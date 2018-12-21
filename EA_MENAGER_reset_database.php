<?php
require_once("EA_MENAGER_bddquery.php");

// BDD entreprise 
populate("DROP TABLE entreprise");
populate("CREATE TABLE entreprise(CodeSCA INT PRIMARY KEY , Nom VARCHAR(50), CA INT, DureeContrat INT)");
populate("INSERT INTO entreprise VALUES(20140208, 'Microsoft', 2147483647, '2035')");

/// BDD Ville CODEPO PK, CODS UK
populate("DROP TABLE ville");
populate("CREATE TABLE ville(CodePo INT, CodS INT, Nom VARCHAR(50), Type VARCHAR(50))");
populate("INSERT INTO ville VALUES(77700, 1, 'Bailly','Ville' )");
populate("INSERT INTO ville VALUES(94410, 2, 'Saint-Maurice','Ville' )");
populate("INSERT INTO ville VALUES(0, 3, 'Intersection','Intersection')");
populate("INSERT INTO ville VALUES(94800, 4, 'Villejuif','Ville' )");

// BDD troncon  CODESI UNIQUE KEY, CODT PK UK
populate("DROP TABLE troncon");
populate("CREATE TABLE troncon(CodT INT, CodA INT, CodeS1 INT, CodeS2 INT , DuKm INT, AuKm INT)");
populate("INSERT INTO troncon VALUES(10,6,1,3,5,10)");
populate("INSERT INTO troncon VALUES(20,7,3,2,9,10)");
populate("INSERT INTO troncon VALUES(30,8,3,4,3,10)");
populate("INSERT INTO troncon VALUES(40,9,2,4,7,10)");

/// BDD peage  CODT UK, CODPE PK, CODESCA UK
populate("DROP TABLE peage");
populate("CREATE TABLE peage(PgDuKm INT, PgAuKm INT, Tarif INT, CodT INT UNIQUE KEY, CodPe INT PRIMARY KEY, CodeSCA INT UNIQUE KEY)");
populate("INSERT INTO peage VALUES(100, 200, 3, 1, 2017, 20140208)");

/// BDD sortie CODT UK et CODS PK
populate("DROP TABLE sortie");
populate("CREATE TABLE sortie(Libelle VARCHAR(50), CodT INT, CodS INT,Numero INT)");
populate("INSERT INTO sortie VALUES('SortieBailly', 10, 1, 25)");
populate("INSERT INTO sortie VALUES('SortieIntersection1', 10, 3, 26)");
populate("INSERT INTO sortie VALUES('SortieIntersection2', 20, 3, 27)");
populate("INSERT INTO sortie VALUES('SortieIntersection3', 30, 3, 28)");
populate("INSERT INTO sortie VALUES('SortieStm1', 20, 2, 29)");
populate("INSERT INTO sortie VALUES('SortieStm2', 40, 2, 30)");
populate("INSERT INTO sortie VALUES('SortieVillejuif1', 30, 4, 31)");
populate("INSERT INTO sortie VALUES('SortieVillejuif2', 40, 4, 32)");

/// BDD registre
populate("DROP TABLE registre");
populate("CREATE TABLE registre(CodR INT PRIMARY KEY, Descriptif VARCHAR(50), DateDeb date, DateFin date, CodePe INT UNIQUE KEY)");
populate("INSERT INTO registre VALUES(123, 'Registre1', '2013-09-13','2013-08-12', 2009)");

// BDD User
populate("DROP TABLE Clients");
populate("CREATE TABLE Clients(ClientID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, mail VARCHAR(50), pw VARCHAR(200))");
$password1 = password_hash('ok', PASSWORD_BCRYPT);
$password2 = password_hash('ok', PASSWORD_BCRYPT);
populate("INSERT INTO Clients VALUES(NULL, 'victorine.ea@gmail.com','$password1')"); 
populate("INSERT INTO Clients VALUES(NULL, 'admin@gmail.com', '$password2')"); 

?>


