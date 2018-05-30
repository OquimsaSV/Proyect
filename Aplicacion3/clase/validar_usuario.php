<?php

	class usuario
	{
		
		function validar($usu,$con)
		{
			$conexion=new mysqli("localhost","root","mysql","proyecto");
			$con=base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $con, MCRYPT_MODE_CBC, md5(md5($key))));
			$sql=$conexion->query("SELECT * FROM usuarios WHERE nombre='$usu' AND pass='$con'");
			$sql=$sql->num_rows;
			return $sql; 
		}
	}
?>