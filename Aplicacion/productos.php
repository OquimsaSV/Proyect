<!DOCTYPE html>
<html>
<head>
  	<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Productos</title>
  	<script src="js/jquery.js"></script>
  	<script type="text/javascript" src="js/alertify.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="css/alertify.min.css">
  <!-- Bootstrap core CSS-->
  	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  	<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  	<link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css">   
    <style type="text/css">
      #principal{
        margin: 0 auto;
        margin-bottom: 30px;
      }
      .table{
        width: auto;
        margin: 0 auto;
      }
    </style>
</head>
<body class="fixed-nav sticky-footer" id="page-top">
  <div class="content-wrapper" style="background-color: #f5f5dc;">
  <div class="container-fluid">
    <?php
      session_start();
      include('bd/conexion.php');
      include('bd/validar_sesion.php');
      include('navbar.php');
      ?>
    <?php include('modals/modal_productos.php'); ?>
    <div class="row" id="principal">
          
            
            <div class="col-md-12">
              <h2 class="text-inverse text-primary text-center">PRODUCTOS</h2>
              <a href="pdf/productos_pdf.php" target="_blank"><button class="btn btn-primary fa fa-print"> Generar Reporte</button></a>
              <button style="float: right" type="button" class="btn btn-success" id="addNew"><i class="fa fa-plus"></i> Agregar</button>

                <br><br>
                <div id="cargar">
                 
                </div>
                </div>
        </div>
  </div>
    <footer class="sticky-footer bg-primary">
      <div class="container">
        <div class="text-center">
          <small>Karla Castro, Jose Bolaños, Jose Villalta, Jonathan Baldomero SIS32-DAW</small>
        </div>
      </div>
    </footer>
    <script src="js/jquery.js" ></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/dataTables.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
 
    <script type="text/javascript">
        $(document).ready(function() {
            $("#addNew").on('click', function () {
              //aqui se oculta el boton de editar y le indicamos que se cargue el boton guardar y mostrar el modal
               $("#mana").modal('show');
            });
            //se utiliza para cargar el modal al momento de presionar el boton agregar
            $("#mana").on('hidden.bs.modal', function () {
               $("#editRowID").val(0);
               $("#desc").val("");
               $("#name").val("");
               $("#pre").val("");
               $("#img").val("");
            });
            $('#cargar').load('tabla/tabla_productos.php');
            getExistingData(0, 50);
        });
//funcion para borrar un registro al cual solo se le envia el id de la fila a eliminar
        function deleteRow(rowID) {
            if (confirm('Esta seguro de borrar esta producto??')) {
                $.ajax({
                    url: 'procesar/ajax_productos.php',
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        key: 'deleteRow',
                        rowID: rowID
                    }, success: function (response) {
                        $("#country_"+rowID).parent().remove();
                        alert(response);
                        //aqui le indicamos que se recargue la pagina
                        $('#cargar').load('tabla/tabla_productos.php');
                           getExistingData(0, 50);
                    }
                });
            }
        }
 //mostrar modal para editar
        function viewORedit(rowID, type) {
            $.ajax({
                url: 'procesar/ajax_productos.php',
                method: 'POST',
                dataType: 'json',
                data: {
                  //cuando uses ajax aqui en este apartado de data es donde se introducen los campos a enviar a la pagina donde de procesaran
                    key: 'getRowData',
                    rowID: rowID
                }, success: function (response) {
                    if (type == "edit") {
                        $("#des").val(response.des);
                        $("#nam").val(response.nom);
                        $("#cat").val(response.cate);
                        $("#prec").val(response.pre);
                        $("#editRow").val(rowID);

                    }
                    $("#mana2").modal('show');
                }
            });
        }
//esta funcion se utiliza para cargar los datos
        function getExistingData(start, limit) {
            $.ajax({
                url: 'procesar/ajax_productos.php',
                method: 'POST',
                dataType: 'text',
                data: {
                    key: 'getExistingData',
                    start: start,
                    limit: limit
                }, success: function (response) {
                    if (response != "reachedMax") {
                        $('tbody').append(response);
                        start += limit;
                        getExistingData(start, limit);
                    }else $(".table").DataTable();
                        
                }
            });
        }

      $("#enviarimag").on("submit", function(f){
        f.preventDefault();
        $("#actualizar").fadeOut();
        var formData = new FormData(document.getElementById("enviarimag"));
        $.ajax({
          url: "procesar/subir_producto.php",
          type: "POST",
          dataType: "HTML",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }). done(function(echo){
          alert(echo);
          if (echo=="Producto ingresado con éxito") {
            $("#mana").modal('hide');
            $('#cargar').load('tabla/tabla_productos.php');
            getExistingData(0, 50);
          }
        });
      });


      $("#actualizarimag").on("submit", function(e){
        e.preventDefault();
        var formData2 = new FormData(document.getElementById("actualizarimag"));
        $.ajax({
          url: "procesar/actualizar_img_productos.php",
          type: "POST",
          dataType: "HTML",
          data: formData2,
          cache: false,
          contentType: false,
          processData: false,
        }). done(function(success){
            alert(success);
          if (success=="Producto actualizado con éxito") {
              $("#mana2").modal('hide');
              $('#cargar').load('tabla/tabla_productos.php');
              getExistingData(0, 50);
          }
        });
      });

//A esta funcion se le envian valores como addnew y updateRow los cuales le indican la opcion a realizar
//funcion utilizada para comprobar campos vacios
        function isNotEmpty(caller) {
            if (caller.val() == '') {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }

    </script>
  </div>
</body>
</body>
</html>