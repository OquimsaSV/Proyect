<?php
session_start();
    include('../bd/conexion.php');
   include('navbar.php');
?>

<DOCTYPE html>
<html>
<head>
    <title>Calculadora Web</title>  

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Clientes</title>
    <script src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/alertify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/alertify.min.css">
  <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap4.min.css"> 

    <link rel="stylesheet" type="text/css" href="estilo.css">  
    <script language="LiveScript">
        function addChar(input, character)
        {
            if(input.value == null || input.value == "0")
                input.value = character
            else
                input.value += character
}
        function deleteChar(input)
        {
            input.value = input.value.substring(0, input.value.length - 1)
}
        function changeSign(input)
        {
            if(input.value.substring(0, 1) == "-")
                input.value = input.value.substring(1, input.value.length)
            else
                input.value = "-" + input.value
}
        function compute(form) 
        {
            form.display.value = eval(form.display.value)
}
        function square(form) 
        {
            form.display.value = eval(form.display.value) * eval(form.display.value)
}
        function checkNum(str) 
        {
            for (var i = 0; i < str.length; i++) {
                var ch = str.substring(i, i+1)
            if (ch < "0" || ch > "9") {
                if (ch != "/" && ch != "*" && ch != "+" && ch != "-" && ch != "(" && ch!= ")") {
                    alert("invalid entry!")
                return false
            }
        }
    }
  return true
}
</script>
</head>
<body>
<center>
    <div class="contenedor">
        <form>
            <table>
                <tr>
                    <td colspan="4"><input class="text" name="display" id="campodetexto" type="text" value=""></td>
                </tr>    
                <tr>
                    <td><input class="columna1" id="7" type="button" value="7" onClick="addChar(this.form.display, '7')"></td>
                    <td><input class="columna1" id="8" type="button" value="8" onClick="addChar(this.form.display, '8')"></td>
                    <td><input class="columna1" id="9" type="button" value="9" onClick="addChar(this.form.display, '9')"></td>
                    <td><input class="columna2" id="suma" type="button" value="+" onClick="addChar(this.form.display, '+')"></td>
                </tr>
                <tr>
                    <td><input class="columna1" id="4" type="button" value="4" onClick="addChar(this.form.display, '4')"></td>
                    <td><input class="columna1" id="5" type="button" value="5" onClick="addChar(this.form.display, '5')"></td>
                    <td><input class="columna1" id="6" type="button" value="6" onClick="addChar(this.form.display, '6')"></td>
                    <td><input class="columna2" id="resta" type="button" value="-" onClick="addChar(this.form.display, '-')"></td>
                </tr> 
                <tr>
                    <td><input class="columna1" id="1" type="button" value="1" onClick="addChar(this.form.display, '1')"></td>
                    <td><input class="columna1" id="2" type="button" value="2" onClick="addChar(this.form.display, '2')"></td>
                    <td><input class="columna1" id="3" type="button" value="3" onClick="addChar(this.form.display, '3')"></td>
                    <td><input class="columna2" id="multiplicacion" type="button" value="*" onClick="addChar(this.form.display, '*')"></td>
                </tr>  
                <tr>
                    <td><input class="columna1" id="clear" type="button" value="CE" onClick="this.form.display.value = 0 "></td>
                    <td><input class="columna1" id="0" type="button" value="0" onClick="addChar(this.form.display, '0')"></td>
                    <td><input class="columna1" id="equals" type="button" value="=" onClick="if (checkNum(this.form.display.value))
                                                                                                      { compute(this.form) }"></td>
                    <td><input class="columna2" id="division" type="button" value="/" onClick="addChar(this.form.display, '/')"></td>
                </tr>
            </table>
        </form>
    </div>
</center>
</body>
<script src="../js/jquery.js" ></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/dataTables.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>
</html>