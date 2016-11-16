<?php

require 'config.php';

// J'initialise les variables
$emailToto = '';

// Formulaire soumis
if (!empty($_POST)) {
	print_r($_POST);
	
	$emailToto = isset($_POST['emailToto']) ? trim($_POST['emailToto']) : '';
	$passwordToto1 = isset($_POST['passwordToto1']) ? trim($_POST['passwordToto1']) : '';
	$passwordToto2 = isset($_POST['passwordToto2']) ? trim($_POST['passwordToto2']) : '';

	$formOk = true;
	if ($passwordToto1 != $passwordToto2) {
		echo 'Le mot de passe n\'est pas identique<br>';
		$formOk = false;
	}
	if (strlen($passwordToto1) < 8) {
		echo 'Le password doit contenir au moins 8 caractères<br>';
		$formOk = false;
	}
	if (empty($emailToto)) {
		echo 'Email est vide<br>';
		$formOk = false;
	}
	else if (!filter_var($emailToto, FILTER_VALIDATE_EMAIL)) {
		echo 'Email invalide<br>';
		$formOk = false;
	}

	if ($formOk) {

		$sql = '
			SELECT usr_email
			FROM user
			WHERE usr_email = :email
		';

		$pdoStatement = $pdo->prepare($sql);
		$pdoStatement->bindValue(':email', $emailToto);

		if (!$pdoStatement->execute()) {
			print_r($pdoStatement->errorInfo());
		}
		else {
			$resultMail = $pdoStatement->fetch();
			print_r($resultMail);
		}

		if ($resultMail['usr_email'] == $emailToto) {
			echo 'E-mail déjà existante';
		}
		else {

			echo 'OK<br>TODO insérer en DB<br>';

			$sql = '
				INSERT INTO user (usr_email,usr_password)
				VALUES (:email, :password)
			';
			$pdoStatement = $pdo->prepare($sql);
			$pdoStatement->bindValue(':email', $emailToto);
			$pdoStatement->bindValue(':password', password_hash($passwordToto1, PASSWORD_BCRYPT));

			if ($pdoStatement->execute() === false) {
				print_r($pdoStatement->errorInfo());
			}
			else {
				// Mettre en session l'ID du user
				$_SESSION['UserId'] = $pdo->lastInsertId();

				//$resultat = $pdoStatement->fetchAll();
				//$_SESSION['UserID'] = session_id();
				//var_dump($_SESSION);
				//header('Location: signup.php');
			}
		}
	}

}