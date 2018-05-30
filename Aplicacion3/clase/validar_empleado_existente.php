<?php
	/**
	 * 
	 */
	class empleado
	{
		
		function validar($id)
		{
			$conexion=new mysqli("localhost","root","mysql","proyecto");
			$sql=$conexion->query("SELECT * FROM usuarios WHERE Id_Empleado='$id'");
			return $sql->num_rows;
		}
	}
?>