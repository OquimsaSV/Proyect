<?php 
require_once("conexion.php")
 ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Grafica</title>

		<style type="text/css">

		</style>
	</head>
	<body>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script src="Highcharts-6.1.0/code/highcharts.js"></script>


<div class="row justify-content-center">
<form   method="POST">
    

<hr>
<button class="btn btn-block btn-info" name="enviar">Mostrar</button><br>
</form>
</div>
<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>



	
        <script type="text/javascript">

Highcharts.chart('container', {

    title: {
        text: 'Total De Ventas'
    },

    subtitle: {
        text: ''
    },

    yAxis: {
        title: {
            text: 'ID_Ventas'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 0
        }
    },

    series: [{
        name: 'Id_Ventas',
        data: [<?php if (isset($_POST['enviar'])) {
      
   $consulta="SELECT * FROM `venta` " ;
   $ress=mysqli_query($cone,$consulta);
 while($total=mysqli_fetch_array($ress)){

       ?>
       <?php echo $total[0]; ?>,
        

         <?php   }  }?> 
         ]
     }
     ],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
        </script>
        

	</body>
</html>
