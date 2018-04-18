	<table align="center">
		<form action="" method="POST">
			<tr><td>Introduzca su nombre:</td></tr>
			<tr><td><input type="text" name="nom" required></td></tr>
			<tr><td align="center"><input type="submit" name="boton"></td></tr>
		</form>
	</table>
	<?php 
    $conta=0;
    	if (isset($_POST['boton'])) {
    		$nom=$_POST['nom'];
    		$mayus=strtoupper($nom);
    		echo "<h3>$mayus</h3>";
    		echo "<h3>";
    		for ($i=strlen($mayus); $i>=0; $i--) { 
    			echo $mayus[$i];
    		}
    		echo "</h3>";
    		for ($i=0;$i<strlen($nom);$i++) { 
    			if ($nom[$i]=='e' || $nom[$i]=='E') {
    				$conta+=1;
    			}
    		}

    		if ($conta>0) {
    			echo "<h3>Hay $conta letas e</h3>";
    		}else{
    			echo "<h3>Hay 0 letas e</h3>";
    		}

    		echo "<h3>";
    		for ($i=0; $i < strlen($nom); $i++) { 
    			if ($nom[$i]==" ") {
    				echo "*";
    			}
    			else{
    				echo $nom[$i];
    			}
    		}
    		echo "</h3>";
    	}
    ?>
