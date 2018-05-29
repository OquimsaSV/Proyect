<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<meta name="description" content="">
  	<meta name="author" content="">
    <title>Empleados</title>
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
      }
      .table{
        width: auto;
        margin: 0 auto;
      }
    </style>
</head>
<body class="fixed-nav sticky-footer" id="page-top">
  <div class="content-wrapper" style="background-color: #c8e6c9">
  <div class="container-fluid">
    <?php
      session_start();
      include('bd/conexion.php');
      include('bd/validar_sesion.php');
      include('navbar.php');
      ?>
    <?php include('modals/modal_empleado.php'); ?>
    <div class="row" id="principal">
          
            
            <div class="col-md-12">
              <h2 class="text-center text-primary">EMPLEADOS</h2>
              <button style="float: right" type="button" class="btn btn-primary" id="addNew"><i class="fa fa-plus"></i> Agregar</button>

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
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#addNew").on('click', function () {
              //aqui se oculta el boton de editar y le indicamos que se cargue el boton guardar y mostrar el modal
               $("#editar").fadeOut();
               $("#manage").fadeIn();
               $("#mana").modal('show');
            });
            //se utiliza para cargar el modal al momento de presionar el boton agregar
            $("#mana").on('hidden.bs.modal', function () {
               $("#editRowID").val(0);
               $("#nom").val("");
               $("#fec").val("");
               $("#ape").val("");
               $("#editar").fadeOut();
            });
            $('#cargar').load('tabla/tabla_empleado.php');
            getExistingData(0, 50);
        });
//funcion para borrar un registro al cual solo se le envia el id de la fila a eliminar
        function deleteRow(rowID) {
            if (confirm('Esta seguro de borrar este empleado??')) {
                $.ajax({
                    url: 'procesar/ajax_empleado.php',
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        key: 'deleteRow',
                        rowID: rowID
                    }, success: function (response) {
                        $("#country_"+rowID).parent().remove();
                        alert(response);
                        //aqui le indicamos que se recargue la pagina
                        $('#cargar').load('tabla/tabla_empleado.php');
                           getExistingData(0, 50);
                    }
                });
            }
        }
 //mostrar modal para editar
        function viewORedit(rowID, type) {
            $.ajax({
                url: 'procesar/ajax_empleado.php',
                method: 'POST',
                dataType: 'json',
                data: {
                  //cuando uses ajax aqui en este apartado de data es donde se introducen los campos a enviar a la pagina donde de procesaran
                    key: 'getRowData',
                    rowID: rowID
                }, success: function (response) {
                    if (type == "edit") {
                        $("#nom").val(response.nom);
                        $("#ape").val(response.ape);
                        $("#dir").val(response.dir);
                        $("#tel").val(response.tel);
                        $("#fec").val(response.fec);
                        $("#editRowID").val(rowID);
                        $("#editar").fadeIn();
                        $("#manage").fadeOut();
                    }
                    $("#mana").modal('show');
                }
            });
        }
//esta funcion se utiliza para cargar los datos
        function getExistingData(start, limit) {
            $.ajax({
                url: 'procesar/ajax_empleado.php',
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
//A esta funcion se le envian valores como addnew y updateRow los cuales le indican la opcion a realizar
        function manageData(key) {
          //captura de los id del modal
            var nom = $("#nom");
            var ape = $("#ape");
            var fec = $("#fec");
            var editRowID = $("#editRowID");
           

            if (isNotEmpty(nom) && isNotEmpty(ape) && isNotEmpty(ape) && isNotEmpty(fec)) {
                $.ajax({
                   url: 'procesar/ajax_empleado.php',
                   method: 'POST',
                   dataType: 'text',
                   data: {
                       key: key,
                       nom: nom.val(),
                       ape: ape.val(),
                       fec: fec.val(),
                       rowID: editRowID.val()
                   }, success: function (response) {
                    //Este se utiliza para agregar un registro a la base de datos
                          alert(response);
                       
                          if (response == "Empleado insertado correctamente!"){
                             
                             nom.val("");
                             ape.val("");
                             fec.val("");
                             editRowID.val("");
                             $("#mana").modal('hide');
                             $('#cargar').load('tabla/tabla_empleado.php');
                              getExistingData(0, 50);
                          }
                           
                          if (response == "Empleado actualizado correctamente"){
                              $("#mana").modal('hide');
                              $('#cargar').load('tabla/tabla_empleado.php');
                              getExistingData(0, 50);
                          }
                   }
                });
            }
        }
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