<?php

require_once("EA_MENAGER_bddquery.php");
require_once 'EA_MENAGER_modele.php';

function printTableRow($CodeSCA, $Nom, $CA, $DureeContrat)
{
	print("<tr>");
	print("<form action='EA_MENAGER_create.php' method='post'>");
	print("<td>$CodeSCA</td><td>$Nom</td><td>$CA</td><td>$DureeContrat</td>");
	print("</form>");
	print("</tr>");
}

function printTableRow1($CodT,$CodA,$CodeS1,$CodeS2,$DuKm,$AuKm)
{
	print("<tr>");
	print("<form action='EA_MENAGER_create.php' method='post'>");
	print("<td>$CodT</td><td>$CodA</td><td>$CodeS1</td><td>$CodeS2</td><td>$DuKm</td><td>$AuKm</td>");
	print("</form>");
	print("</tr>");
}


function printTableRow2($CodePo,$CodS,$Nom,$Type)
{
	print("<tr>");
	print("<form action='EA_MENAGER_create.php' method='post'>");
	print("<td>$CodePo</td><td>$CodS</td><td>$Nom</td><td>$Type</td>");
	print("</form>");
	print("</tr>");
}

function printTableRow3($PgDuKm,$PgAuKm,$Tarif,$CodT,$CodPe,$CodeSCA)
{
	print("<tr>");
	print("<form action='EA_MENAGER_create.php' method='post'>");
	print("<td>$PgDuKm</td><td>$PgAuKm</td><td>$Tarif</td><td>$CodT</td><td>$CodPe</td><td>$CodeSCA</td>");
	print("</form>");
	print("</tr>");
}

function printTableRow4($Libelle,$CodT,$CodS,$Numero)
{
	print("<tr>");
	print("<form action='EA_MENAGER_create.php' method='post'>");
	print("<td>$Libelle</td><td>$CodT</td><td>$CodS</td><td>$Numero</td>");
	print("</form>");
	print("</tr>");
}

function printTableRow5($CodR,$Descriptif,$DateDeb,$DateFin, $CodePe)
{
	print("<tr>");
	print("<form action='EA_MENAGER_create.php' method='post'>");
	print("<td>$CodR</td><td>$Descriptif</td><td>$DateDeb</td><td>$DateFin</td><td>$CodePe</td>");
	print("</form>");
	print("</tr>");
}




?>

