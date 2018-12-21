<?php
require_once 'EA_MENAGER_modele.php';
/// Algo de Dijkstra prend le trajet le plus court de villeA à ville B
function itineraire($villeA, $villeB) {
	$c = new DBConnection();
    $c->Connect();
	$graph = array(
		$villeA => array('0' => 0, '1' => '', 'parcouru' => 'non')
	);
	while (in_array('non', array_column($graph, 'parcouru'))):
		$tmp = array();
		foreach($graph as $k => $sub) {
		    if($sub['parcouru'] == 'non') {
		        $tmp[$k] = $sub;
		    }
		}
		$arr = array_map(function($v){
			return $v[0];
		}, $tmp);
		$ville = array_keys($arr, min($arr))[0]; 
		$codS = getVilleCodS($ville, $c)[0]['CodS'];
		$sorties = getSorties($codS, $c);
		foreach($sorties as $sortie) {
			if ($sorties != null) {
				setDistance($sortie, $ville, $graph, $c);
				$graph[$ville]['parcouru'] = 'oui';

			}
		}
	endwhile;
	$result = array();
	$tmp = $villeB;
	while (!in_array($villeA, $result)):
		$result[] = $tmp;
		$tmp = $graph[$tmp]['1'];
	endwhile;
	$result = array_reverse($result);
	print_r($result);
	return $result;
}

function setDistance ($sortie, $ville, &$graph, $c) {
	$tron = getTronçons($sortie['CodT'], $c)[0];
	if ($tron) {
		$destination = getville($tron, $sortie['CodS'], $c)[0]['Nom'];
		if (array_key_exists($destination, $graph)) {
			if ($graph[$ville]['0'] + ($tron['AuKm'] - $tron['DuKm']) < $graph[$destination]['0']) {
				$graph[$destination]['0'] = $graph[$ville]['0'] + ($tron['AuKm'] - $tron['DuKm']);
				$graph[$destination]['1'] =  $ville;
				$graph[$destination]['parcouru'] =  'non';

			}
		} else {
			$graph[$destination] = array(
				'0' => $graph[$ville]['0'] + ($tron['AuKm'] - $tron['DuKm']),
				'1' => $ville,
				'parcouru' => 'non',
			);
		}
	} else {
		echo "error";
	}
}

function getSorties($codS, $c) {
	$sql = "SELECT * FROM `sortie` WHERE CodS = :codS";
	$prep = $c->Prepare($sql);
	$prep->bindValue(':codS', $codS,  PDO::PARAM_INT);
	$prep->execute();
	$arrAll = $prep->fetchAll();
	$prep->closeCursor();
	$prep = NULL;
	if(!empty($arrAll))
	{
//		print_r($arrAll);
		return $arrAll;
	}
	else
	{
		return null;
	}
}

function getVilleCodS($ville, $c) {
	$sql = "SELECT CodS FROM `ville` WHERE Nom = :nom";
	$prep = $c->Prepare($sql);
	$prep->bindValue(':nom', $ville,  PDO::PARAM_STR);
	$prep->execute();
	$arrAll = $prep->fetchAll();
	$prep->closeCursor();
	$prep = NULL;
	if(!empty($arrAll))
	{
		return $arrAll;
	}
	else
	{
		return null;
	}
}


function getTronçons($codT, $c) {
	$sql = "SELECT * FROM `troncon` WHERE CodT = :codT";
	$prep = $c->Prepare($sql);
	$prep->bindValue(':codT', $codT, PDO::PARAM_INT);
	$prep->execute();
	$arrAll = $prep->fetchAll();
	$prep->closeCursor();
	$prep = NULL;
	if(!empty($arrAll))
	{
		return $arrAll;
	}
	else
	{
		return null;
	}
}

function getVille($tron, $codS, $c) {
	$sql = "SELECT * FROM `ville` WHERE CodS = :codS";
	$prep = $c->Prepare($sql);
	if ($tron['CodeS1'] == $codS)
		$dest = $tron['CodeS2'];
	else
		$dest = $tron['CodeS1'];
	$prep->bindValue(':codS', $dest, PDO::PARAM_INT);
	$prep->execute();
	$arrAll = $prep->fetchAll();
	$prep->closeCursor();
	$prep = NULL;
	if(!empty($arrAll))
	{
		return $arrAll;
	}
	else
	{
		return null;
	}
}


function getVilleInfo ($ville) {
	$c = new DBConnection();
    $c->Connect();
	$sql = "SELECT Libelle FROM sortie WHERE CodS = (SELECT CodS FROM ville WHERE Nom = :nom)";
	$prep = $c->Prepare($sql);
	$prep->bindValue(':nom', $ville, PDO::PARAM_STR);
	$prep->execute();
	$arrAll = $prep->fetchAll();
	if(!empty($arrAll))
	{
		$sql = "SELECT CodA FROM troncon WHERE CodeS1 = (SELECT CodS FROM ville WHERE Nom = :nom1) || CodeS2 = (SELECT CodS FROM ville WHERE Nom = :nom2)";
		$prep = $c->Prepare($sql);
		$prep->bindValue(':nom1', $ville, PDO::PARAM_STR);
		$prep->bindValue(':nom2', $ville, PDO::PARAM_STR);
		$prep->execute();
		$code = $prep->fetchAll();
		$prep->closeCursor();
		$prep = NULL;
		if (!empty($arrAll)) {
			$result = array();
			$result[] = $arrAll;
			$result[] = $code;
			return $result;
		}
		else 
			return null;
	}
	else
	{
		return null;
	}
}


function getSCA ($sca) {
	$c = new DBConnection();
    $c->Connect();
	$sql = "SELECT CodT FROM peage WHERE CodeSCA = (SELECT CodeSCA FROM Entreprise WHERE Nom = :nom)";
	$prep = $c->Prepare($sql);
	$prep->bindValue(':nom', $sca, PDO::PARAM_STR);
	$prep->execute();
	$arrAll = $prep->fetchAll();
	if(!empty($arrAll))
	{
		$sql = "SELECT CA*100, DureeContrat-2017 FROM entreprise WHERE CodeSCA = (SELECT CodeSCA FROM peage) || Nom = :nom1";
		$prep = $c->Prepare($sql);
		$prep->bindValue(':nom1', $sca, PDO::PARAM_STR);
	
		//$prep->bindValue(':nom2', $sca, PDO::PARAM_STR);
		$prep->execute();
		$code = $prep->fetchAll();
		$prep->closeCursor();
		$prep = NULL;
		if (!empty($arrAll)) {
			$result = array();
			$result[] = $arrAll;
			$result[] = $code;
			return $result;
		}
		else 
			return null;
	}
	else
	{
		return null;
	}


}

?>