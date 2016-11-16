<?php

require_once dirname(__FILE__).'/config.php';

$studentListe = array();

$sessionList = isset($_GET['session']) ? intval($_GET['session']) : 0;
//var_dump($sessionList);

$detailStudentList = isset($_GET['id']) ? intval($_GET['id']) : 0;
//var_dump($detailStudentList);

// Gestion offset pour pagination
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
// page = 1 => offset = 0
// page = 2 => offset = 3
// page = 3 => offset = 6
// page = 4 => offset = 9

// Je récupère le mot recherché
$search = isset($_GET['q']) ? trim($_GET['q']) : '';
//var_dump($search);

$offset = ($page -1) * 3;
$maxpage = '';

$sql = "SELECT stu_id AS 'ID', stu_lname AS 'Nom', stu_fname AS 'Prénom', stu_email AS 'e-mail', cou_name AS 'Pays', cit_name AS 'Ville', stu_friendliness AS 'Sympa', stu_age AS 'Age', training_tra_id AS 'Session'
	FROM student
	LEFT OUTER JOIN city ON city.cit_id = student.city_cit_id
	LEFT OUTER JOIN country ON country.cou_id = city.country_cou_id
";
if ($sessionList > 0) {
	$sql .= "WHERE training_tra_id = :idSession";
}

if ($detailStudentList > 0){
	$sql .= "WHERE stu_id = :idStudent";
}

if ($search !== '') {
	$sql .= "WHERE stu_lname LIKE :search
		OR stu_fname LIKE :search
		OR stu_email LIKE :search
		OR cou_name LIKE :search
		OR cit_name LIKE :search
		OR stu_age LIKE :search
	";
}


$sql .= " ORDER BY student.training_tra_id, stu_lname ASC
	LIMIT $offset,3

	";
//echo $offset;
echo $sql;
$selList = $pdo->prepare($sql);

if ($detailStudentList > 0){
	$selList->bindValue(':idStudent', $detailStudentList, PDO::PARAM_INT);
}
if ($sessionList > 0) {
	$selList->bindValue(':idSession', $sessionList, PDO::PARAM_INT);
}
if ($search !== '') {
	$selList->bindValue(':search', '%'.$search.'%', PDO::PARAM_STR);
}

if (!$selList->execute()) {
	print_r($selList->errorInfo());
}
else {
	$studentListe = $selList->fetchAll();
	$maxpage = intval(count($studentListe));
	echo "Pages extra: $maxpage";
	//var_dump($studentListe);
}
	
