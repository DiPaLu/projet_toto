<?php
//Au début (pour initialiser la récuperation de la session)
session_start();

require_once dirname(__FILE__).'../../vendor/autoload.php';

// Constante pour définir la configuration de la DB
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'diogo');
define('DB_DATABASE', 'webforce3');

$dsn = 'mysql:dbname='.DB_DATABASE.';host='.DB_HOST.';charset=UTF8';

// Instanciation de PDO
try {
	$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
}
catch (Exception $e) {
	echo $e->getMessage();
}

// Charge librairies Composer

use SocialLinks\Page;

//Create a Page instance with the url information
$page = new Page([
    'url' => 'http://localhost',
    'title' => 'Home - projet TOTO',
    'text' => 'Extended page description',
    'image' => 'http://mypage.com/image.png',
    'twitterUser' => '@twitterUser'
]);
// Debug
//echo '';
//exit;

// Tableau de la sympathie
$sympathieList = array(
	1 => 'Pas sympa',
	2 => 'Assez sympa',
	3 => 'Sympa',
	4 => 'Très sympa',
	5 => 'Génial'
);