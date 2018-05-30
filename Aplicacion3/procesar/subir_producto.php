<?php
	require("../bd/conexion.php");
	$name=utf8_decode($_POST['name']);
	$desc=utf8_decode($_POST['desc']);
	$cate=$_POST['cate'];
	$pre=$_POST['pre'];

	$nom=$_FILES['img']['name'];
	$tmp=$_FILES['img']['tmp_name'];
	if ($name=="" || $desc=="" || $pre=="") {
		exit("Por favor complete todos los campos");
	}else{
		if (strpos($nom, "jpg") || strpos($nom, "png") || strpos($nom, "jpeg") || $nom=="") {
			if ($nom!="") {
				$ruta="../ficheros/productos/$nom";
			}else $ruta="";
			
			move_uploaded_file($tmp, $ruta);
			$sql=$conexion->query("INSERT INTO productos VALUES ('','$name', '$desc',0,$cate,'$pre','$ruta')");
			if ($sql) {
				exit('Producto ingresado con éxito');
			}else{
				exit('No se inserto en la base de datos');
		}
		}else{
			exit("Imagen no válida");
		}
	}
?>	