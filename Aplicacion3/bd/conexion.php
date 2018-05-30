<?php
	$conexion=new mysqli("localhost","root","mysql","proyecto");
	if (!$conexion) {
		die("Error en la conexión a la base de datos!!");
	}
	 $conexion->query("SET NAMES 'utf8'");
?>