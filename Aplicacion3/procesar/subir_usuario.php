<?php
	include('../bd/conexion.php');
	include('../bd/encriptar.php');
	$cifrar=new cifrarpass;
	$nom=$_POST['nom'];
	$con=$_POST['pass'];
	$op=$_POST['op'];
	$tip=$_POST['tip'];
	$ima=$_FILES['ima']['name'];
	$tmp=$_FILES['ima']['tmp_name'];


	if ($nom=='' || $con=='' || $op=='opcion' || $tip=='opcion') {
		exit('Debe completar todos los campos');
	}else{
		if (strpos($ima, "jpg") || strpos($ima, "png") || strpos($ima, "jpeg") || $ima=='') {
			$ruta="../ficheros/usuarios/$ima";
			$sql=$conexion->query("SELECT * FROM usuarios WHERE nombre='$nom'");
			if ($sql->num_rows > 0) {
				exit('Este usuario ya existe');
			}else{
				$sql1=$conexion->query("SELECT * FROM usuarios WHERE Id_Empleado='$op'");
				if ($sql1->num_rows > 0) {
					exit('Este Empleado ya tiene un usuario');
				}else{
					$con=$cifrar->encriptar($con);
					if ($ima!='') {
						move_uploaded_file($tmp, $ruta);
						$sql2=$conexion->query("INSERT INTO usuarios VALUES ('$nom','$con','$tip','$op','$ruta')");
						exit('Usuario insertado con éxito!!');
					}else{
						$sql2=$conexion->query("INSERT INTO usuarios VALUES ('$nom','$con','$tip','$op','')");
						exit("Usuario insertado con éxito!!");
					}
					
				}
			}
		}else{
			exit('Formato de imagen no válido');
		}
	}

?>