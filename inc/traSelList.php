<?php
$training = array();

$sql = "
	SELECT tra_id AS 'ID', loc_name AS 'Lieu', DATE_FORMAT(tra_start_date, '%e %M %Y') AS 'Date debut', DATE_FORMAT(tra_end_date, '%e %M %Y') AS 'Date fin', count(*) AS 'Nb Eleves'
    FROM training
    LEFT OUTER JOIN location ON location.loc_id = training.location_loc_id
    LEFT OUTER JOIN student ON student.training_tra_id = training.tra_id
    GROUP BY ID, Lieu, 'Date debut','Date fin'
    ORDER BY 'Date debut' ASC
";

$selTraining = $pdo->query($sql);

if ($selTraining === false) {
    print_r($pdo->errorInfo());
}
else {
    $training = $selTraining->fetchAll();
    //print_r($training);
}