	<form action='' method='POST'>
			<h2>Formatos de fecha</h2>
			<button name='1' >d/m/Y</button><br>
			<button name='2'>Fecha completa</button><br>
			<button name='3'>d/M/Y</button><br>
			<button name='4'>Y/m/d</button><br>
			<button name='5' >Formato corto</button><br>		
	</form>
	<?php
		if (isset($_POST['1'])) {
			echo "<h3>".date('d/m/y')."</h3>";
		}elseif (isset($_POST['2'])) {
			echo "<h3>".date('D').", ".date('M')." ".date('jS').", ".date('Y')."</h3>";
		}elseif (isset($_POST['3'])) {
			echo "<h3>".date('d')." / ".date('M')." / ".date('Y')."</h3>";
		}elseif (isset($_POST['4'])) {
			echo "<h3>".date('Y/m/d')."</h3>";
		}elseif(isset($_POST['5'])){
			echo "<h3>Fecha actual: ".date('d/m/y')."</h3>";
		}else{
			echo "<h3>Fecha actual: ".date('m/d/y')."</h3>";
		}
	?>