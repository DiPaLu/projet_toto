<div class="panel panel-primary">
	<!-- Default panel contents -->
	<div class="panel-heading">Ajout d'un étudiant</div>
	<form action="" enctype="multipart/form-data" method="post" class="form-group">
		
			<br/>
			<label>Nom :</label><br/>
			<input type="text" class="form-control" name="studentName" value="" placeholder="Nom"><br />
			<label>Prénom :</label><br/>
			<input type="text" class="form-control" name="studentFirstname" value="" placeholder="Prénom"><br />
			<label>E-mail :</label><br/>
			<input type="email" class="form-control" name="studentEmail" value="" placeholder="E-mail"><br />
			<label>Date de naissance :</label><br/>
			<input type="date" class="form-control" name="studentBirhtdate" value="" placeholder="Date de naissance (aaaa-mm-jj)"><br />
			<label>Ville de résidence :</label><br />
			<select name="cit_id" class="form-control">
				<option value="0">choisissez :</option>
				<?php foreach ($cityList as $key=>$value) : ?>
				<option value="<?= $key +1 ?>"><?= $value[1] ?></option>
				<?php endforeach; ?>
			</select><br />
			<label>Nationalité :</label><br />
			<select name="cou_id" class="form-control">
				<option value="0">choisissez :</option>
				<?php foreach ($countryList as $key=>$value) :?>
				<option value="<?= $key +1 ?>"><?= $value[1] ?></option>
				<?php endforeach; ?>
			</select><br />
			<label>Sympathie :</label><br />
			<select name="stu_friendliness" class="form-control">
				<option value="">choisissez :</option>
				<?php foreach ($sympathieList as $key=>$value) :?>
				<option value="<?= $key ?>"><?= $value ?></option>
				<?php endforeach; ?>
			</select><br />
			<label>Session :</label>
			<select name="tra_id" class="form-control">
				<option value="">choisissez :</option>
				<?php foreach ($training as $key => $value) :?>
				<option value="<?= $key ?>">Démarre le <?= $value[2]?> et termine le <?= $value[3]?></option>
				<?php endforeach; ?>
			</select><br/>

			<input type="hidden" name="submitFile" value="1" class="form-control"/>
			<input type="hidden" name="MAX_FILE_SIZE = 200000">
			<label for="fileform">Image :</label>
			<input type="file" name="fileform" id="fileForm" class="form-control"/>
			<p class="help-block">Uniquement les fichiers PNG, JPG, JPEG autorisées + taille max 200 Ko</p>
		


			<input type="submit" class="btn btn-primary" value="Ajouter"><br />
	</form>
</div>