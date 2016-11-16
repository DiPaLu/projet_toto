<?php
// J'inclus les fichiers de paramètres
require_once 'inc/config.php';

// Je récupère les Villes
$cityList = array();

$sql = "
	SELECT cit_id, cit_name
	FROM city
	ORDER BY cit_name ASC
";

$selList = $pdo->query($sql);

if ($selList === false) {
	echo ($sql);
	print_r($pdo->errorInfo());
}
else {
	$cityList = $selList->fetchAll();
	//print_r($cityList);
}

// Je récupère les localités
$countryList = array();

$sql = "
	SELECT cou_id, cou_name
	FROM country
	ORDER BY cou_name ASC
";

$selList = $pdo->query($sql);

if ($selList === false) {
	echo ($sql);
	print_r($pdo->errorInfo());
}
else {
	$countryList = $selList->fetchAll();
	//print_r($countryList);
}
