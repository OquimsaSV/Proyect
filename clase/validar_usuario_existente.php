<?php
	/**
	 * 
	 */
	class usuarioexist
	{
		
		function existe($nom)
		{
			$conexion=new mysqli("localhost","root","mysql","proyecto");
			$sql=$conexion->query("SELECT * FROM usuarios WHERE nombre='$nom'");
			return $sql->num_rows;
		}
	}
?>