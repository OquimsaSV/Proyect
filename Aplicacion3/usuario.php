<!DOCTYPE html>
<html>
<head>
	 <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Administrar usuario</title>
  	<script src="js/jquery.js"></script>
  	<script type="text/javascript" src="js/alertify.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="css/alertify.min.css">
  <!-- Bootstrap core CSS-->
  	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  	<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  	<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  	<link href="css/sb-admin.css" rel="stylesheet">
    <style type="text/css">
      .table{
        margin-top: 20px;
        width: auto;
      }
      .principal{
        background-color: #ce93d8;
        color: lightgreen;
        border: 0px solid #d2b48c;
      }
    </style>
</head>
<body class="fixed-nav sticky-footer" id="page-top" style="background-color: #d2b48c">
	<?php
		session_start();
    include("bd/validar_sesion.php");
		include("bd/conexion.php");
		include("navbar.php");
    include("bd/encriptar.php");
	?>
  <div class="content-wrapper" style="background-color: #d2b48c">
  <div class="container-fluid" style="background-color: #d2b48c">
    <div class="col-md-12 text-center">
      <?php
        $cifrar=new cifrarpass;
      //usuarios
        $conexion->query("SET NAMES 'utf8'");
        $sql="SELECT * FROM usuarios WHERE nombre='".$_SESSION['user']."'";
        $eje=$conexion->query($sql);
        $fil=$eje->fetch_assoc();
      //Empleados
        $sql2="SELECT * FROM empleado WHERE Id_Empleado='".$fil['Id_Empleado']."'";
        $ejec=$conexion->query($sql2);
        $fila=$ejec->fetch_assoc();

        $nom1=$fila['Nombre'];
        $ape1=$fila['Apellido'];
        $usu1=$fil['nombre'];
        $pass1=$fil['pass'];
        $pass1=$cifrar->desencriptar($pass1);

      ?> 
        <img src=
              <?php
                if ($fil['imagen']=="" || $fil['imagen']=='NULL') {
                  echo "images/none.png";
                }
                else{
                  echo $fil['imagen'];
                }
      ?> width="150px" height="150px" class="rounded-circle"><br>
      <a href="#" class="link btn" data-toggle='modal' data-target='#editimage'><h5 class="text-danger">Cambiar Imagen</h5></a>
    </div>
    <div class="col">
      <table align="center" class="table table-striped border-top-0 principal">
        <form>
          <tr>
            <td class="bg-primary font-weight-bold">Nombre:</td>
            <td><input type="text" value=<?php echo $nom1; ?> class="form-control" readonly></td>
          </tr>
          <tr>
            <td class="bg-primary font-weight-bold">Apellido:</td>
            <td><input type="text" value=<?php echo $ape1; ?> class="form-control" readonly></td>
          </tr>
          <tr>
            <td class="bg-primary font-weight-bold">Fecha de Nacimiento:</td>
            <td><input type="date" value=<?php echo $fila['Fecha_Nac']; ?> class="form-control" readonly></td>
          </tr>
          <tr>
            <td class="bg-primary font-weight-bold">Usuario</td>
            <td><input type="text" value="<?php echo $usu1; ?>" class="form-control" readonly></td>
          </tr>
          <tr>
            <td class="bg-primary font-weight-bold">Contraseña</td>
            <td><input type="password" value="<?php echo $pass1; ?>" class="form-control" readonly></td>
          </tr>
          <tr>
          <td colspan="2" align="center"><a href="#edit" data-toggle="modal" class="btn btn-success"><i class="fa fa-edit"></i> Modificar</a></td>
          </tr>
        </form>
      </table>

<!--modal-->
      <?php include("modals/modal_editar_usuario.php"); ?>
<!--modal-->
    </div>
  </div>
    <footer class="sticky-footer bg-primary">
      <div class="container">
        <div class="text-center">
          <small>Karla Castro, Jose Bolaños, Jose Villalta, Jonathan Baldomero SIS32-DAW</small>
        </div>
      </div>
    </footer>
     <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>
</body>
</html>