<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
<script src ="librerias/jquery-3.3.1.min.js"></script>
<script src="procesos/funciones.js"></script>
<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.min.css">
<script src="librerias/alertifyjs/alertify.min.js"></script>
<link rel="stylesheet" type="text/css" href="librerias/font-awesome/font-awesome.min.css">
<script src="js/jquery.js"></script>
  	<script type="text/javascript" src="js/alertify.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="../css/alertify.min.css">
  <!-- Bootstrap core CSS-->
  	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  	<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  	<link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  	<link href="../css/sb-admin.css" rel="stylesheet">
<body>
	<?php
		session_start();
		include('../bd/conexion.php');
		include('navbar.php');
	?>
	<div class="content-wrapper">
		<div class="container">
		 <br><h1>Venta de productos</h1>
		 <div class="row">
		 	<div class="col-sm-12">
		 		<span class="btn btn-primary" id="ventaProductosBtn">Vender producto</span>
		 		<span class="btn btn-primary" id="ventasHechasBtn">Ventas hechas</span>
		 	</div>
		 </div>
		 <div class="row">
		 	<div class="col-sm-12">
		 		<div id="ventaProductos"></div>
		 		<div id="ventasHechas"></div>
		 	</div>
		 </div>
	</div>
		
	</div>
	<script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script type="text/javascript">
		$(document).ready(function(){
			$('#ventaProductosBtn').click(function(){
				esconderSeccionVenta();
				$('#ventaProductos').load('ventasDeProductos.php');
				$('#ventaProductos').show();
			});
			$('#ventasHechasBtn').click(function(){
				esconderSeccionVenta();
				$('#ventasHechas').load('ventas/ventasyReportes.php');
				$('#ventasHechas').show();
			});
		});

		function esconderSeccionVenta(){
			$('#ventaProductos').hide();
			$('#ventasHechas').hide();
		}

	</script>
</body>
</html>
	
	