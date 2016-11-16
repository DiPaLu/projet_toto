<div class="jumbotron">
	  <h1>Hey! Salut mon ami !!!</h1>
	  <p> Tou aimes les pôtates ?</p>
	  <p><a class="btn btn-primary btn-lg" href="https://www.youtube.com/watch?v=hJgQCbRsq-I" target="_blank" role="button">Learn more</a></p>
</div>

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Esch-Belval</div>
  <div class="panel-body">
	Lister ici les sessions de formation webforce3 par date pour Esch
  </div>
  <!-- Table -->
  <table class="table">
  <thead>
  	<!--
    <tr>
  		<th>Field1</th>
  		<th>Field2</th>
  		<th>Field3</th>
  	</tr>
    -->
<tr>
    <?php
    foreach($training as $currentDesignation){
      foreach($currentDesignation as $key=>$currentt){
        //print_r($key);
        if (!is_numeric($key) && $key != 'ID') {
          //echo "<tr>";
          echo "<th>".$key."</th>";
          //echo "</tr>";
        }
      }
      break;
    }
    ?>
</tr>
  </thead>
  <tbody>
  	<!--
  	<tr>
  		<td>Value1</td>
  		<td>Value2</td>
  		<td>Value3</td>
  	</tr>
  	<tr>
  		<td>Value1</td>
  		<td>Value2</td>
  		<td>Value3</td>
  	</tr>
  	<tr>
  		<td>Value1</td>
  		<td>Value2</td>
  		<td>Value3</td>
  	</tr>
  	-->
  	<?php
      
      foreach($training as $currentDesignation){
   // var_dump($currentDesignation);
    echo "<tr>";
    echo "<td><a href='list.php?session=" . $currentDesignation['ID'] ."'>".$currentDesignation['Lieu']."</a></td>";
    echo "<td>".$currentDesignation['Date debut']."</td>";
    echo "<td>".$currentDesignation['Date fin']."</td>";
    echo "<td>".$currentDesignation['Nb Eleves']."</td>";
    echo "</tr>";
      }
    ?>
  	
  </tbody>
  </table>
</div>