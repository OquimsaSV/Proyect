<!DOCTYPE html>
<html>
<head>
	<title>Cifrar contraseña</title>
</head>
<body>
	<form action="" method="POST">
		<label for="">Cadena</label>
		<input type="text" name="cade"><br>
		<input type="submit" name="boton" value="codificar">
		<input type="submit" name="boton2" value="decodificar">
	</form>
	<?php
	class uno{
		function encriptar($cadena){
			$key='';
			$encrypted=base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
			return $encrypted;
		}
		function desencriptar($cadena){
			$key='';
			$decrypted=rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena),MCRYPT_MODE_CBC,md5(md5($key))),"\0");
			return $decrypted;
		}
	}
		if (isset($_POST['boton'])) {
			$clas=new uno;
			$cadena=$_POST['cade'];
			$cad=$clas->encriptar($cadena);
			echo $cad;
		}elseif(isset($_POST['boton2'])){

			$cadena=$_POST['cade'];
			$clas=new uno;
			$cadena=$clas->desencriptar($cadena);
			echo $cadena;
		}
	?>
</body>
</html>