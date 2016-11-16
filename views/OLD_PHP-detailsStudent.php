<!-- Table -->
	  	<table class="table">
			<thead>
				<?php
			
				
			    foreach($studentListe as $currentListe){
			      	foreach($currentListe as $key=>$currentt){
				        if (!is_numeric($key) && $key != 'ID') {
				          //echo "<tr>";
				          echo "<th>".$key."</th>";
				          //echo "</tr>";
				        }
			      	}
			    break;
			    }
		    	?>
			</thead>
			<tbody>

				<?php
			
				foreach ($studentListe as $currentEtudiant) {
					echo "<tr>";
						echo "<td>".$currentEtudiant['Nom']."</td>";
						echo "<td>".$currentEtudiant['Prénom']."</td>";
						echo "<td>".$currentEtudiant['e-mail']."</td>";
						echo "<td>".$currentEtudiant['Pays']."</td>";
						echo "<td>".$currentEtudiant['Ville']."</td>";
						echo "<td>".$currentEtudiant['Sympa']."</td>";
						echo "<td>".$currentEtudiant['Age']."</td>";
						echo "<td>".$currentEtudiant['Session']."</td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>