<?php 
session_start();
	require_once "../../Conexion.php";

	$c= new conectar();
	$conexion=$c->conexion();

	$idcliente=$_POST['clienteVenta'];
	$idproducto=$_POST['productoVenta'];
	$descripcion=$_POST['descripcionV'];
	$cantidad=$_POST['cantidadV'];
	$precio=$_POST['precioV'];
	$sql="SELECT Nombre 
			from cliente 
			where Id_Cliente='$idcliente'";
	$result=mysqli_query($conexion,$sql);
	$c=mysqli_fetch_row($result);
	$ncliente=$c[0];

	$sql="SELECT Nombre 
			from productos 
			where Id_Producto='$idproducto'";
	$result=mysqli_query($conexion,$sql);

	$nombreproducto=mysqli_fetch_row($result)[0];

	$articulo=$idproducto."||".
				$nombreproducto."||".
				$descripcion."||".
				$precio."||".
				$ncliente."||".
				$idcliente;

	$_SESSION['tablaComprasTemp'][]=$articulo;

 ?>