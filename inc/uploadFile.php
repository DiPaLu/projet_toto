<?php
			//print_r($_POST);
			//print_r($_FILES);
			// Si des fichiers ont été téléversés
			if (sizeof($_FILES) > 0) {
				//die("nimpne");
				// Je récupère les données du fichier 'fileForm'
				$fileUpload = $_FILES['fileform'];

				// Je récupère l'extension
				
				// 1re façon
				//$extension = substr($fileUpload['name'], -4);
				//echo $extension;
				//exit;

				// 2e façon
				$tmp = explode('.', $fileUpload['name'])

				if ($extension == '.png' || $extension == '.jpg' || $extension == '.gif' || $extension = '.svg' || $extension = '.jpeg') {


					// Je téléverse le fichier
					if (move_uploaded_file($fileUpload['tmp_name'], 'img/student/' . $extension)) {
						echo 'fichier téléversé<br/>';
					}
					else {
						echo 'Erreur dans le téléversement<br/>';
					}
				}
				else {
					echo 'petit malin ^^<br/>';
				}
			}