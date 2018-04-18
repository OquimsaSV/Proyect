	<h2>Validación de formulario</h2>
	<table align="center" border="1px" cellspacing="0">
		<form action="" method="POST">
			<tr>
				<td>Nombre: </td>
				<td><input type="text" name="nom" required></td>
			</tr>
			<tr>
				<td>Apellido: </td>
				<td><input type="text" name="ape" required></td>
			</tr>
			<tr>
		<th> sexo </th>
		<th><input type="radio" name="sexo" value="Femenino">Mujer<br>
			<input type="radio" name="sexo" value="Masculino">Hombre<br>
		</th>
	<tr>
			<tr>
				<td>Fecha de nacimiento: </td>
				<td><input type="date" name="fecha"></td>
			</tr>
			<tr>
				<td>Edad: </td>
				<td><input type="number" name="edad" required></td>
			</tr>
			<tr>
				<td>Profesión: </td>
				<td>
					<input type="radio" name="profesion" value="ingeniero" checked>Ingeniero<br>
					<input type="radio" name="profesion" value="pintor">Pintor<br>
					<input type="radio" name="profesion" value="escritor">Escritor<br>
					<input type="radio" name="profesion" value="actor">Actor<br>
					<input type="radio" name="profesion" value="maestro">Maestro<br>
					<input type="radio" name="profesion" value="doctor">Doctor<br>
				</td>
			</tr>
			<tr>
				<td>Deportes: </td>
				<td>
					<input type="checkbox" name="depor[]" value="Futbol">Futbol<br>
					<input type="checkbox" name="depor[]" value="Basketball">Basketball<br>
					<input type="checkbox" name="depor[]" value="Surf">Surf<br>
					<input type="checkbox" name="depor[]" value="Ciclismo">Ciclismo<br>
					<input type="checkbox" name="depor[]" value="Gimnasta">Gimnasta<br>
				</td>
			</tr>
			<tr><td colspan="2" align="center"><input type="submit" name="boton"></td></tr>
		</form>
	</table>
<?php

if(isset($_POST['boton'])){
$nom=$_POST['nom'];
$ape=$_POST['ape'];
$sexo=$_POST['gen'];
$fec=$_POST['fecha'];
$edad=$_POST['edad'];
$pro=$_POST['profesion'];
$depo=$_POST['depor'];
echo "<hr><h1>Su informacion es</h1>";
			echo "Su nombre es:$nom <br>";
			echo "Su apellido es:$ape <br>";
			echo "Su fecha de nacimiento es:$fec <br>";		
			echo "Su género es:$sexo <br>";
			echo "Su edad es:$edad <br>";
			echo "Su profesion es:$pro <br>";
			echo "Sus deportes favoritos son: <br>";
			for ($i=0; $i < count($depo) ; $i++) { 
				echo "$depo[$i]<br>";
			}
			
		}
	?>



			
			