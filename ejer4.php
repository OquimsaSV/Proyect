	<h2>Prestamo de libros</h2>
	<table>
		<form action="" method="POST">
			<tr>
				<td>Nombre:</td>
				<td><input type="text" name="nom" required></td>
			</tr>
			<tr>
				<td>Apellido: </td>
				<td><input type="text" name="ape" required></td>
			</tr>
			<tr>
				<td>Nombre de libro: </td>
				<td><input type="text" name="libro" required></td>
			</tr>
			<tr>
				<td>Cantidad de días: </td>
				<td><input type="number" name="dia" required></td>
			</tr>
			<tr><td colspan="2" align="center"><input type="submit" name="boton" id="boton"></td></tr>
		</form>
	</table>
	<?php
		if (isset($_POST['boton'])) {
			$nom=$_POST['nom'];
			$ape=$_POST['ape'];
			$libro=$_POST['libro'];
			$dia=$_POST['dia'];
			$fecha=date('d-m-Y');
			$devo=strtotime($fecha."+$dia days");
			echo "<h3>Datos del Usuario</h3>Nombre:$nom<br>";
			echo "Apellido: </b>$ape<br>";
			echo "Nombre del Libro: </b>$libro<br>";
			echo "Fecha de préstamo del libro: </b>".date('d-m-Y')."<br>";
			echo "Fecha de devolución del libro: </b>".date('d-m-Y', $devo);
		}
	?>