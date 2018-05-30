<?php 
	
	require_once "../../Conexion.php";
	require_once "../venta.php";

	$obj= new ventas();

	echo json_encode($obj->obtenDatosProducto($_POST['idproducto']))

 ?>