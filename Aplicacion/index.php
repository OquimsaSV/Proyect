
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<?php
		session_start();
		include("bd/conexion.php");
	?>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script scr="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/alertify.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/alertify.min.css">
	<link rel="stylesheet" type="text/css" href="css/themes/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<style type="text/css">
	.table{
		text-align: center;
		width: auto;
		margin: 0 auto; 
		color: cyan;
		font-family: sans-serif;
	}
	.uno{
		margin: auto;
		text-align: center;
	}
	body{
		background-image: url('images/fondo1.jpg');
		background-attachment: fixed;
		background-size: cover;
		background-repeat: no-repeat;
	}
	h1{
		color: #258AA1;
	}
	.dos{
		margin-top: 10%;
		margin-bottom: 10%;
	}
	h1{
		font-family: fantasy;
		color: #daf7a6;
	}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col dos">
				<h1 align="center">OQUIMSA</h1><br>
				<table class="table table-hover font-weight-bold uno text-left">
					<form method="POST" action="">
					 <tr>
						<TD>Usuario</TD>
						<td><input type="text" name="usu" required class=form-control></td>
					 </tr>
					 <tr>
						<td>Contraseña</td>
						<td><input type="password" name="contra" required class=form-control></td>
					 </tr>
					 <tr>
					 	<td>Seleccione su cargo</td>
					 	<td align="center"><select class="form-control-sm" name="cargo">
					 		<option value="admin">Administrador</option>
					 		<option value="user">Usuario</option>
					 	</select></td>
					 </tr>
					 <tr>
					 	<td colspan="2" align=center>
					 		<button name="boton" class="form-control btn btn-success" data-toggle="modal" data-target="#exampleModal">Entrar</button>
					 	</td>
					 </tr>
					</form>
				</table>
			</div>
		</div>
	</div>

</body>
</html>
<?php
if (isset($_POST['boton'])) {
	$usu=$_POST['usu'];
	$contra=$_POST['contra'];
	$cargo=$_POST['cargo'];
	$sql="SELECT * FROM usuarios WHERE nombre='$usu' AND pass='$contra' AND tipo='$cargo'";
	$ejecutar=$conexion->query($sql);
	$fila=$ejecutar->fetch_assoc();
	$empleado=$fila['Id_Empleado'];
	if (isset($ejecutar)) {
		$sql2="SELECT Nombre, Apellido FROM empleado WHERE Id_Empleado='$empleado'";
		$ejecutar2=$conexion->query($sql2);
		$fila2=$ejecutar2->fetch_assoc();
		$nombre=$fila2['Nombre'];
		$apellido=$fila2['Apellido'];
		$_SESSION['user']=$fila['nombre'];

		if ($fila['tipo']=='admin') {
			$_SESSION['usuario']=$nombre." ".$apellido;
			header('Location: inicio.php');
			$_SESSION['conta']=0;
		}elseif ($fila['tipo']=='user') {
			$_SESSION['usuario']=$nombre." ".$apellido;
			$_SESSION['conta']=0;
			header('Location: inicio_usuario.php');
		}else{
			echo "<script type='text/javascript'>
					alertify.notify('El usuario no existe','error',3, null);
			  	</script>";
		}
	}
}
?>