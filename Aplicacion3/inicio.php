<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Administrador</title>
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
    .uno{
      background-image: url('images/fondo3.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
    }
  </style>
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <?php
  session_start();
  include("bd/validar_sesion.php");
  include("bd/conexion.php");
  if (@$_SESSION['conta']==0 || @$_SESSION['conta']=="") {
    $_SESSION['conta']=1;
  }else{
    $_SESSION['conta']+=1;
  }
  if ($_SESSION['conta']==1) {
    echo "<script> alertify.alert('Usuario correcto', 'Bienvenido ".$_SESSION['usuario']."');</script>";
  }
?>
  <!-- Navigation-->
  <?php include("navbar.php"); ?>
  <div class="content-wrapper uno">
    <div class="container-fluid">
      
      <?php include("ver.php"); ?>
        </div>
        
      </div>
    <footer class="sticky-footer bg-primary">
      <div class="container">
        <div class="text-center">
          <small>Karla Castro, Jose Bolaños, Jose Villalta, Jonathan Baldomero SIS32-DAW</small>
        </div>
      </div>
    </footer>
    <!-- Bootstrap core JavaScript-->
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
</div>
</body>

</html>
