<?php
	session_start();
	include('bd/conexion.php');
	session_destroy();
	$conexion->close();
	echo "<script>window.location='index.php'</script>";
?>