<div class="panel panel-primary">
	<!-- Default panel contents -->
	<div class="panel-heading">Détails d'un étudiant</div>
	<!--
	<div class="panel-body">
	Lister ici les sessions de formation webforce3 par date pour Esch
	</div>
	-->

	<div id="studentContent">

		<script
		  src="https://code.jquery.com/jquery-3.1.1.min.js"
		  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
		  crossorigin="anonymous">
	</script>
	
		<script type="text/javascript">
			$(document).ready(function(){
				$.ajax({
					method: 'post',
					url: 'ajax/studentAjax.php',
					data: "studenId=<?php $detailStudentList ?>"
				});// FIN AJAX
			}); // FIN JQUERY

		</script>
	</div>
</div>