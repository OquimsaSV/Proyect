	<table align="center">
		<form action="" method="POST">
			<tr><td>Introduzca su correo electrónico</td></tr>
			<tr><td><input type="text" name="corre" required></td></tr>
			<tr><td align="center"><input type="submit" name="boton"></td></tr>
		</form>
	</table>
	<?php
	$signo=0;
		if (isset($_POST['boton'])) {
			$email=$_POST['corre'];
			for ($i=0; $i < strlen($email); $i++) { 
				if ($email[$i]=='@') {
					$signo+=1;
				}
			}
			$amail=str_split($email);
			$ulti=count($amail)-1;
			if ($signo>1 || strlen($email) < 6) {
				echo "El correo tiene que tener solo una @ y una longitud mayor a 6 caracteres";
			}elseif ($amail[0]!=preg_match('/[a-z]/', chr(0))) {
				echo "El correo que ingreso comienza con un numero, POR FAVOR INGRESE OTRO";
			}elseif ($amail[$ulti]!=preg_match('/[a-z]/', chr($ulti))) {
				echo "El  correo electronico que ingreso no debe terminar con número";
			}elseif($amail[0]=='@' || $amail[$ulti]=='@'){
				echo "El correo no puede comenzar ni terminar con @";
			}elseif(substr_count($email, ".")<1){
				echo "El correo debe tener al menos un punto";
			}elseif($signo==1 && substr_count($email,".")>= 1){
				echo "Correo electrónico ingresado correcto<br>";
				echo $email;
			}
		}
	?>