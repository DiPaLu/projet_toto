<?php
require_once 'inc/config.php';
require_once 'inc/traSelList.php';

$formOK = false;
$studentName = '';
$studentFirstname = '';
$studentEmail = '';
$studentBirhtdate = '';
$ville = '';
$pays = '';
$sympa = '';
$session = '';

// Je vérifie le formulaire soumis
if (!empty($_POST)) {
	print_r($_POST);
	// Je récupère les données et je les traite (trim())
	$studentName = isset($_POST['studentName']) ? htmlspecialchars(strtoupper(trim($_POST['studentName']))) : '';
	$studentFirstname = isset($_POST['studentFirstname']) ? htmlspecialchars(trim($_POST['studentFirstname'])) : '';
	$studentBirhtdate = isset($_POST['studentBirhtdate']) ? htmlspecialchars(trim($_POST['studentBirhtdate'])) : '';
	$studentEmail = isset($_POST['studentEmail']) ? htmlspecialchars(trim($_POST['studentEmail'])) : '';
	$ville = isset($_POST['cit_id']) && is_numeric($_POST['cit_id']) ? intval($_POST['cit_id']) : 0;
	$pays = isset($_POST['cou_id']) && is_numeric($_POST['cou_id']) ? intval($_POST['cou_id']) : 0;
	$sympa = isset($_POST['stu_friendliness']) && is_numeric($_POST['stu_friendliness']) ? intval($_POST['stu_friendliness']) : 0;
	$session = isset($_POST['tra_id']) ? intval($_POST['tra_id']) : 0;

//var_dump($sympa);
	//Validation des données
	$formOK = true;
	if (empty($studentName)){
		echo 'Le nom est vide<br/>';
		$formOK = false;
	}
	else if (strlen($studentName) < 2) {
		echo 'Le nom est incorrect (2 caractères minimum)<br>';
			$formOk = false;
	}
	if (empty($studentFirstname)) {
			echo 'Le prénom est vide<br>';
			$formOk = false;
	}
	else if (strlen($studentFirstname) < 2) {
		echo 'Le prénom est incorrect (2 caractères minimum)<br>';
		$formOK = false;
	}
	if (empty($studentEmail)) {
		echo 'L\'adresse e-mail est vide<br/>';
		$formOK = false;
	}
	else if (filter_var($studentEmail, FILTER_VALIDATE_EMAIL) === false) {
		echo ('L\'adresse e-mail est incorrect<br/>');
		$formOK = false;
	}
	if (empty($studentBirhtdate)){
		echo 'Veuillez séléctionner votre date de naissance<br>';
		$formOK = false;
	}
	else if (strlen($studentBirhtdate) < 10) {
		echo 'Date non valide<br>';
		$formOK = false;
	}
	
	if ($ville == 0) {
		echo 'Veuillez séléctionner votre ville<br>';
		$formOK = false;
	}
	// if ($pays == "") {
	// 	echo 'Veuillez séléctionner votre pays<br>';
	// 	$formOK = false;
	// }
	if ($sympa == 0) {
		echo 'Veuillez séléctionner un niveau de sympathie<br>';
		$formOK = false;
	}
	if ($session == 0) {
		echo 'Veuillez séléctionner la session<br/>';
		$formOK = false;
	}
	

	if ($formOK) {

		$sql = "
		INSERT INTO student
		SET stu_lname = :stuName, stu_fname = :stuFName, stu_email = :stuMail, stu_friendliness = :stuSympa, stu_age = :stuAge, city_cit_id = :stuCity, training_tra_id = :stuTraining
		";

		//$dateYYYY = substr($studentBirhtdate, 0, 4);
		//print_r($dateYYYY);
		$date = intval(date("Y"));
		//print_r($date);

		$pdoStatement = $pdo->prepare($sql);
		$pdoStatement->bindValue(':stuName', $studentName);
		$pdoStatement->bindValue(':stuFName', $studentFirstname);
		$pdoStatement->bindValue(':stuMail', $studentEmail);
		$pdoStatement->bindValue(':stuSympa', $sympa, PDO::PARAM_INT);
		$pdoStatement->bindValue(':stuAge', $date - intval(substr($studentBirhtdate, 0,4)), PDO::PARAM_INT);
		$pdoStatement->bindValue(':stuCity', $ville, PDO::PARAM_INT);
		//$pdoStatement->bindValue(':stu', $ville, PDO::PARAM_INT);
		$pdoStatement->bindValue(':stuTraining', $session, PDO::PARAM_INT);

		if (!$pdoStatement->execute()) {
			print_r($pdoStatement->errorInfo());
		}
	}
}