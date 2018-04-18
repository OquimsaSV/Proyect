<html>
<head>
	<title>ejercicio 1</title>
</head>
<body>
<form method="POST" Action="">
<table>
	<tr>
		<td>Ingrese una palabra</td>
<td><input type="text" name="palabra" Required></td>
<td><input type="submit" name="boton"></td>
	</tr>
</table>

</form>
</body>
</html>
<?php

if(isset($_POST['boton'])){

function palindromo($p){
 $npalabra="";
    $palabra=trim($p);
    if($palabra==''){
        return false;
    }else{
        for($i=strlen($palabra)-1;$i>=0;$i--){
            $npalabra.=substr($palabra,$i,1);
        }
        $cad="La palabra ".$palabra;
        if(strtolower($palabra)==strtolower($npalabra)){
            $cad.=" si es palindrome";
                $estado=true;
        }else{
            $cad.=" no es palindrome";
                $estado=false;
        }
        return $cad;
    }
     $npalabra=0;
}

$p=$_POST["palabra"];

$resultado=palindromo($p);
echo $resultado;
}
?>
