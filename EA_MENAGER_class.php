<?php
require_once("EA_MENAGER_bddquery.php");

class entreprise
{
	var $CodeSCA;
	var $Nom;
	var $CA;
	var $DureeContrat;


	public function __construct()
	{
		$this->CodeSCA = null;
		$this->Nom = null;
		$this->CA = null;
		$this->DureeContrat = null; 
	
	}

	public static function constructWithParameters($CodeSCA,$Nom, $CA, $DureeContrat)
	{
		$instance = new self();	
		$instance->CodeSCA = $CodeSCA;
		$instance->Nom = $Nom;
		$instance->CA = $CA;
		$instance->DureeContrat = $DureeContrat;
		
		return $instance;
	}


	public function insert_record()
	{
		populate("INSERT INTO entreprise VALUES('$this->CodeSCA', '$this->Nom', '$this->CA', '$this->DureeContrat')");
	}


	public function delete_record($SCA)
	{
		populate("DELETE FROM entreprise WHERE CodeSCA=$SCA");
	}

	public function update_record($SCA, $name, $chiffre, $duree)
	{
		populate("UPDATE entreprise SET Nom='$name', CA='$chiffre', DureeContrat='$duree' WHERE CodeSCA='$SCA' ");
	}


}


       ////Entreprise
if (isset($_POST['CodeSCA']) && isset($_POST['Nom']) && isset($_POST['CA']) && isset($_POST['DureeContrat']))
{
	$newent = entreprise::constructWithParameters($_POST['CodeSCA'], $_POST['Nom'], $_POST['CA'], $_POST['DureeContrat']);
	$newent->insert_record();
}
if (isset($_POST['ent_delete']))
{
    $newent = new entreprise();
    $newent->delete_record($_POST['ent_delete']);
}
if (isset($_POST['CodeSCA_update']) && isset($_POST['Nom_update']) && isset($_POST['CA_update']) && isset($_POST['DureeContrat_update']))
{
$newent = new entreprise();
$newent-> update_record ($_POST['CodeSCA_update'], $_POST['Nom_update'], $_POST['CA_update'] , $_POST['DureeContrat_update']);
}


class troncon
{
	var $CodT;
	var $CodA;
	var $CodeS1;
	var $CodeS2;
	var $DuKm;
	var $AuKm;


	public function __construct()
	{
		$this->CodT = null;
		$this->CodA = null;
		$this->CodeS1 = null;
		$this->CodeS2 = null;
		$this->DuKm = null; 
		$this->AuKm = null; 
	
	}

	public static function constructWithParameters($CodT,$CodA,$CodeS1, $CodeS2,$DuKm,$AuKm)
	{
		$instance = new self();	
		$instance->CodT = $CodT;
		$instance->CodA = $CodA;
		$instance->CodeS1 = $CodeS1;
		$instance->CodeS2 = $CodeS2;
		$instance->DuKm = $DuKm;
		$instance->AuKm = $AuKm;
		
		return $instance;
	}


	public function insert_record()
	{
		populate("INSERT INTO troncon VALUES('$this->CodT', '$this->CodA', '$this->CodeS1', '$this->CodeS2', '$this->DuKm', '$this->AuKm')");
	}

	public function delete_record($codt)
	{
		populate("DELETE FROM troncon WHERE CodT=$codt");
	}

	public function update_record($codt, $coda, $codes1, $codes2, $dukm, $aukm)
	{
		populate("UPDATE troncon SET CodA='$coda', CodeS1='$codes1', CodeS2='$codes2', DuKm='$dukm', AuKm='$aukm' WHERE CodT='$codt' ");
	}


} 


//// TRONCONS
if (isset($_POST['CodT']) && isset($_POST['CodA']) && isset($_POST['CodeS1'])  && isset($_POST['CodeS2']) && isset($_POST['DuKm']) && isset($_POST['AuKm']))
{
    $newtron = troncon::constructWithParameters($_POST['CodT'], $_POST['CodA'], $_POST['CodeS1'], $_POST['CodeS2'], $_POST['DuKm'], $_POST['AuKm']);
    $newtron->insert_record();
}
if (isset($_POST['tron_delete']))
{
    $newtron = new troncon();
    $newtron->delete_record($_POST['tron_delete']);
}
if (isset($_POST['CodT_update']) && isset($_POST['CodA_update']) && isset($_POST['CodeS1_update'])&& isset($_POST['CodeS2_update']) && isset($_POST['DuKm_update']) && isset($_POST['AuKm_update']))
{
    $newtron = new troncon();
    $newtron-> update_record($_POST['CodT_update'], $_POST['CodA_update'], $_POST['CodeS1_update'], $_POST['CodeS2_update'], $_POST['DuKm_update'], $_POST['AuKm_update']);
}


class ville
{
	
	var $CodePo;
	var $CodS;
	var $Nom;
	var $Type;


	public function __construct()
	{
		$this->CodeV = null;
		$this->CodePo = null;
		$this->CodS = null;
		$this->Nom = null; 
		
	
	}

	public static function constructWithParameters($CodePo,$CodS,$Nom, $Type)
	{
		$instance = new self();	
		$instance->CodePo = $CodePo;
		$instance->CodS = $CodS;
		$instance->Nom = $Nom;
		$instance->Type = $Type;
		return $instance;
	}


	public function insert_record()
	{
		populate("INSERT INTO ville VALUES('$this->CodePo', '$this->CodS', '$this->Nom','$this->Type')");
	}

	public function delete_record($codepo)
	{
		populate("DELETE FROM ville WHERE CodePo=$codepo");
	}

	public function update_record($codepo, $cods, $nom, $type)
	{
		populate("UPDATE ville SET CodS='$cods', Nom='$nom', Type='$type' WHERE CodePo=$codepo");
	}


} 

                      //// VILLE
if (isset($_POST['CodePo']) && isset($_POST['CodS']) && isset($_POST['Nom']) && isset($_POST['Type']))
{
    $newville = ville::constructWithParameters($_POST['CodePo'], $_POST['CodS'], $_POST['Nom'],$_POST['Type']);
    $newville->insert_record();
}
if (isset($_POST['ville_delete']))
{
    $newville = new ville();
    $newville->delete_record($_POST['ville_delete']);
}
if ( isset($_POST['CodePo_update']) && isset($_POST['CodS_update']) && isset($_POST['Nom_update']) && isset($_POST['Type_update']))
{
    $newville = new ville();
    $newville-> update_record( $_POST['CodePo_update'], $_POST['CodS_update'], $_POST['Nom_update'], $_POST['Type_update']);
}


class peage
{
	var $PgDuKm;
	var $PgAuKm;
	var $Tarif;
	var $CodT;
	var $CodPe;
	var $CodeSCA;


	public function __construct()
	{
		$this->PgDuKm = null;
		$this->PgAuKm = null;
		$this->Tarif = null;
		$this->CodT = null; 
		$this->CodPe = null; 
		$this->CodeSCA = null;

	
	}

	public static function constructWithParameters($PgDuKm,$PgAuKm,$Tarif,$CodT,$CodPe,$CodeSCA)
	{
		$instance = new self();	
		$instance->PgDuKm = $PgDuKm;
		$instance->PgAuKm = $PgAuKm;
		$instance->Tarif = $Tarif;
		$instance->CodT = $CodT;
		$instance->CodPe = $CodPe;
		$instance->CodeSCA = $CodeSCA;
		
		return $instance;
	}


	public function insert_record()
	{
		populate("INSERT INTO peage VALUES('$this->PgDuKm', '$this->PgAuKm', '$this->Tarif', '$this->CodT', '$this->CodPe', '$this->CodeSCA')");
	}

	public function delete_record($codpe)
	{
		populate("DELETE FROM peage WHERE CodPe=$codpe");
	}

	public function update_record($pgdukm, $pgaukm, $tarif, $codt, $codpe, $codesca)
	{
		populate("UPDATE peage SET PgDuKm='$pgdukm', PgAuKm='$pgaukm', Tarif='$tarif', CodT='$codt', CodeSCA=$codesca WHERE CodPe='$codpe' ");
	}


} 

                      //// PEAGE
if (isset($_POST['PgDuKm']) && isset($_POST['PgAuKm']) && isset($_POST['Tarif']) && isset($_POST['CodT'])&& isset($_POST['CodPe'])&& isset($_POST['CodeSCA'])){
    $newpeage = peage::constructWithParameters($_POST['PgDuKm'], $_POST['PgAuKm'], $_POST['Tarif'], $_POST['CodT'], $_POST['CodPe'], $_POST['CodeSCA']);
    $newpeage->insert_record();
}
if (isset($_POST['peage_delete']))
{
    $newpeage = new peage();
    $newpeage->delete_record($_POST['peage_delete']);
}
if (isset($_POST['PgDuKm_update']) && isset($_POST['PgAuKm_update']) && isset($_POST['Tarif_update']) && isset($_POST['CodT_update']) && isset($_POST['CodPe_update']) && isset($_POST['CodeSCA_update'])){
    $newpeage = new peage();
    $newpeage-> update_record($_POST['PgDuKm_update'], $_POST['PgAuKm_update'], $_POST['Tarif_update'], $_POST['CodT_update'], $_POST['CodPe_update'], $_POST['CodeSCA_update']);
}



class sortie
{
	var $Libelle;
	var $Numero;
	var $CodT;
	var $CodS;



	public function __construct()
	{
		$this->Libelle = null;
		$this->CodT = null;
		$this->CodS = null; 
		$this->Numero = null;
	
	}

	public static function constructWithParameters($Libelle,$CodT,$CodS,$Numero)
	{
		$instance = new self();	
		$instance->Libelle = $Libelle;
		$instance->Numero = $Numero;
		$instance->CodT = $CodT;
		$instance->CodS = $CodS;
		
		return $instance;
	}


	public function insert_record()
	{
		populate("INSERT INTO peage VALUES('$this->Libelle', '$this->CodT', '$this->CodS', '$this->Numero')");
	}

	public function delete_record($cods)
	{
		populate("DELETE FROM peage WHERE CodS=$cods");
	}

	public function update_record($libelle,$codt,$cods, $numero)
	{
		populate("UPDATE peage SET Libelle='$libelle', Numero=$numero, CodT='$codt' WHERE CodS='$cods' ");
	}


} 

                      //// SORTIE 
if (isset($_POST['Libelle'])  && isset($_POST['CodT']) && isset($_POST['CodS'])&& isset($_POST['Numero']))
{
    $newsortie = sortie::constructWithParameters($_POST['Libelle'], $_POST['CodT'], $_POST['CodS'], $_POST['Numero']);
    $newsortie->insert_record();
}
if (isset($_POST['sortie_delete']))
{
    $newsortie = new sortie();
    $newsortie->delete_record($_POST['sortie_delete']);
}
if (isset($_POST['Libelle_update'])  && isset($_POST['CodT_update']) && isset($_POST['CodS_update'])&& isset($_POST['Numero_update']))
{
    $newsortie = new sortie();
    $newsortie-> update_record($_POST['Libelle_update'], $_POST['CodT_update'], $_POST['CodS_update'], $_POST['Numero_update']);
}



class registre
{
	var $CodR;
	var $Descriptif;
	var $DateDeb;
	var $DateFin;
	var $CodePe;



	public function __construct()
	{
		$this->CodR = null;
		$this->Descriptif = null;
		$this->DateDeb = null; 
		$this->DateFin = null;
		$this->CodePe = null;
	
	}

	public static function constructWithParameters($CodR,$Descriptif,$DateDeb,$DateFin, $CodePe)
	{
		$instance = new self();	
		$instance->CodR = $CodR;
		$instance->Descriptif = $Descriptif;
		$instance->DateDeb = $DateDeb;
		$instance->DateFin = $DateFin;
		$instance->CodePe = $CodePe;
		
		return $instance;
	}


	public function insert_record()
	{
		populate("INSERT INTO peage VALUES('$this->CodR', '$this->Descriptif', '$this->DateDeb', '$this->DateFin', '$this->CodePe')");
	}

	public function delete_record($codr)
	{
		populate("DELETE FROM peage WHERE CodR=$codr");
	}

	public function update_record($codr,$desc,$dated,$datef, $codepe)
	{
		populate("UPDATE peage SET Descriptif='$desc', DateDeb='$dated', DateFin='$datef', CodePe='$codepe' WHERE CodR='$codr' ");
	}


} 

                      //// REGISTRE
if (isset($_POST['CodR'])  && isset($_POST['Descriptif']) && isset($_POST['DateDeb'])&& isset($_POST['DateFin']) && isset($_POST['CodePe']))
{
    $newreg = registre::constructWithParameters($_POST['Libelle'], $_POST['CodT'], $_POST['CodS'], $_POST['Numero']);
    $newreg->insert_record();
}
if (isset($_POST['reg_delete']))
{
    $newreg = new registre();
    $newreg->delete_record($_POST['reg_delete']);
}
if (isset($_POST['CodR_update'])  && isset($_POST['Descriptif_update']) && isset($_POST['DateDeb_update'])&& isset($_POST['DateFin_update']) && isset($_POST['CodePe_update']))
{
    $newreg = new registre();
    $newreg-> update_record($_POST['CodR_update'], $_POST['Descriptif_update'], $_POST['DateDeb_update'], $_POST['DateFin_update'], $_POST['CodePe_update']);
}




?>