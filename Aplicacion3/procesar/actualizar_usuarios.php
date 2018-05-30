<?php
	include('../bd/conexion.php');
	include('../bd/encriptar.php');
	$cifrar=new cifrarpass;
	$nom1=$_POST['nom1'];
	$con1=$_POST['pass1'];
	$id=$_POST['editRowID'];
	$tip1=$_POST['tip1'];
	$ima1=$_FILES['ima1']['name'];
	$tmp=$_FILES['ima1']['tmp_name'];

	$sql3=$conexion->query("SELECT * FROM usuarios WHERE Id_Empleado='$id'");
	$sql1=$sql3->fetch_assoc();
	$imga=$sql1['imagen'];
	
	if ($nom1==$sql1['nombre'] && $con1==$sql1['pass'] && $tip1==$sql1['tipo'] && $ima1=='') {
		exit('Usuario actualizado con éxito!!');
	}elseif ($nom1=='' || $con1=='' || $tip1=='opcion') {
		exit('Debe completar todos los campos');
	}else{
		if (strpos($ima1, "jpg") || strpos($ima1, "png") || strpos($ima1, "jpeg") || $ima1=='') {
				$con1=$cifrar->encriptar($con1);
				if ($ima1!='') {
					$ruta="../ficheros/usuarios/$ima1";

					$partes=basename($imga);
					@unlink("../ficheros/usuarios/$partes");

					move_uploaded_file($tmp, $ruta);
					$sql2=$conexion->query("UPDATE usuarios SET nombre='$nom1', pass='$con1', tipo='$tip1', imagen='$ruta' WHERE Id_Empleado='$id'");
					exit('Usuario actualizado con éxito!!');
				}else{
					$sql2=$conexion->query("UPDATE usuarios SET nombre='$nom1', pass='$con1', tipo='$tip1' WHERE Id_Empleado='$id'");
					exit('Usuario actualizado con éxito!!');					
				}
		}else{
			exit("Formato de imagen no válido");
		}
	}

?>