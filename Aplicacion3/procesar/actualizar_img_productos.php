<?php 
require("../bd/conexion.php");
@$nam=utf8_decode($_POST['nam']);
	@$des=utf8_decode($_POST['des']);
	@$prec=$_POST['prec'];
	@$cat=$_POST['cat'];
	@$nom=$_FILES['imag']['name'];
	@$tmp=$_FILES['imag']['tmp_name'];
	@$id=$_POST['editRow'];

	if ($nam!="" || $prec!='' || $des!='') {
		$eje=$conexion->query("SELECT * FROM productos WHERE Id_Producto=$id");
		$eje1=$eje->fetch_assoc();
		if (strpos($nom, "jpg") || strpos($nom, "png") || strpos($nom, "jpeg") || $nom=="") {
			
			if ($nom!="") {
				$ruta="../ficheros/productos/$nom";

				$partes=basename($eje1['Imagen']);
				@unlink("../ficheros/productos/$partes");
				
				move_uploaded_file($tmp, $ruta);
				$eje2=$conexion->query("UPDATE productos SET Nombre='$nam', Descripcion='$des', Id_Categoria=$cat, Precio=$prec, Imagen='$ruta' WHERE Id_Producto='$id'");
			}else{
				$eje2=$conexion->query("UPDATE productos SET Nombre='$nam', Descripcion='$des', Id_Categoria=$cat, Precio=$prec WHERE Id_Producto='$id'");
			}
			if ($eje2) {
				exit('Producto actualizado con éxito');
			}else{
				exit("Error al actualizar el registro");
			}
		}else{
			exit("Imagen no válida");
		}
	}else{
		exit("Complemente todos los campos");
	}

?>