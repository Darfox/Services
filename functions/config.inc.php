<?php
//
// Configuration générale
//
$siteTitle = "Evea-Group Services";

// Monitoring
$monitorDemandesParPage=20;

//
// Configuration de la base de données
//
$dbServer = "localhost";
$dbUser = "root";
$dbPasswd = "";
$dbBase = "tango";

$db = mysql_connect($dbServer, $dbUser, $dbPasswd);
mysql_select_db($dbBase,$db);

  ///////////////
 // Fonctions //
///////////////

//
// Function getTitle
//	input: string
//	output: string
function getTitle ($cat="") {
	if (!empty($cat))
		$cat = " | " . htmlentities($cat);
	return ($cat);
}

function getAllServ() {
	$sql=mysql_query("SELECT count(id) as Total FROM demandes WHERE is_active=1");
	$info=mysql_fetch_assoc($sql);
	return ($info['Total']);
}

function getAllDemands() {
	$sql=mysql_query("SELECT count(id) as Total FROM demandes WHERE is_active=0");
	$info=mysql_fetch_assoc($sql);
	return ($info['Total']);
}

function getAllClients() {
	$sql=mysql_query("SELECT count(id) as Total FROM client");
	$info=mysql_fetch_assoc($sql);
	return ($info['Total']);
}

?>