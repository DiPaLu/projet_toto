<div class="panel panel-primary">
	<!-- Default panel contents -->
	<div class="panel-heading">Liste des étudiants</div>
	<!--
	<div class="panel-body">
	Lister ici les sessions de formation webforce3 par date pour Esch
	</div>
	-->
	<!-- Table -->
	<table class="table">
		<thead>
		<tr>
		<th>Nom</th>
		<th>Prénom</th>
		<th>Ville</th>
		<th>Pays</th>
		</tr>
		</thead>
		<tbody>

		<?php

		foreach ($studentListe as $currentEtudiant) {
		//var_dump($studentListe);
		//print_r($studentListe[7]);
		//foreach ($currentEtudiant as $key => $value) {
		//$stuId = intval($value[0]);
		//}
		echo "<tr>";
		echo "<td><a href='student.php?id=".$currentEtudiant['ID']."'>".$currentEtudiant['Nom']."</a></td>";
		echo "<td>".$currentEtudiant['Prénom']."</td>";
		echo "<td>".$currentEtudiant['Ville']."</td>";
		echo "<td>".$currentEtudiant['Pays']."</td>";
		echo "</tr>";
		}
		?>
		</tbody>
	</table>
</div>
<nav aria-label="...">
  <ul class="pager">
	<?php if (!empty($search && $page >1)) : ?>
		<li class="previous"><a href="list.php?q=<?= $search?>&page=<?= $page -1?>"><span aria-hidden="true">&larr;</span> Previous</a></li>
   	<?php elseif ($sessionList > 0 && $page >1) : ?>
   		<li class="previous"><a href="list.php?session=<?= $sessionList?>&page=<?= $page -1?>"><span aria-hidden="true">&larr;</span> Previous</a></li>
   	<?php elseif ($page > 1) : ?>
    	<li class="previous"><a href="list.php?page=<?= $page -1?>"><span aria-hidden="true">&larr;</span> Previous</a></li>
   	<?php endif; ?>

	<?php if (!empty($search)) : ?>
		<li class="next"><a href="list.php?q=<?= $search?>&page=<?= $page +1?>">Next <span aria-hidden="true">&rarr;</span></a></li>
    <?php elseif ($sessionList > 0) : ?>
    	<li class="next"><a href="list.php?session=<?= $sessionList?>&page=<?= $page +1?>">Next <span aria-hidden="true">&rarr;</span></a></li>
    <?php elseif ($page > -1 && $maxpage < 3) : ?>
    	<li class="next"><a href="list.php?page=<?= $page +1?>">Next <span aria-hidden="true">&rarr;</span></a></li>
   	<?php endif; ?>

  </ul>
</nav>