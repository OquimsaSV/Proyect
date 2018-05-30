<?php 

require_once "Conexion.php";
$c= new conectar();
$conexion=$c->conexion();
?>
<h4>Vender un producto</h4>
<div class="row">
	<div class="col-sm-4">
		<form id="frmVentasProductos">
			<label>Seleciona Cliente</label>
			<select class="form-control input-sm" id="clienteVenta" name="clienteVenta">
				<option value="A">Selecciona</option>
				<option value="0">Sin cliente</option>
				<?php
				$sql="SELECT Id_cliente,nombre
				from cliente";
				$result=mysqli_query($conexion,$sql);
				while ($cliente=mysqli_fetch_row($result)):
					?>
					<option value="<?php echo $cliente[0] ?>"><?php echo $cliente[1] ?></option>
				<?php endwhile; ?>
			</select>
			<label>Producto</label>
			<select class="form-control input-sm" id="productoVenta" name="productoVenta">
				<option value="A">Selecciona</option>
				<?php
				$sql="SELECT Id_producto,
				Nombre
				from productos";
				$result=mysqli_query($conexion,$sql);

				while ($producto=mysqli_fetch_row($result)):
					?>
					<option value="<?php echo $producto[0] ?>"><?php echo $producto[1] ?></option>
				<?php endwhile; ?>
			</select>
			<label>Descripcion</label>
			<textarea readonly="" id="descripcionV" name="descripcionV" class="form-control input-sm"></textarea>
			<label>Existencia</label>
			<input readonly="" type="text" class="form-control input-sm" id="cantidadV" name="cantidadV">
					<label>Cantidad</label>
			<input  type="number" class="form-control input-sm" id="total" name="totalV"
			<label>Precio</label>
			<input readonly="" type="text" class="form-control input-sm" id="precioV" name="precioV">
			<p></p>
			<span class="btn btn-primary" id="btnAgregaVenta">Agregar</span>
			<span class="btn btn-danger" id="btnVaciarVentas">Vaciar ventas</span>
		</form>
	</div>
	<div class="col-sm-2">
		<div id="imgProducto"></div>
	</div>
	<div class="col-sm-6">
		<div id="tablaVentasTempLoad"></div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){

		$('#tablaVentasTempLoad').load("procesos/tablaVentasTemp.php");

		$('#productoVenta').change(function(){

			$.ajax({
				type:"POST",
				data:"idproducto=" + $('#productoVenta').val(),
				url:"procesos/ventas/llenarFormProducto.php",
				success:function(r){
					dato=jQuery.parseJSON(r);
				
					$('#descripcionV').val(dato['Descripcion']);
					$('#cantidadV').val(dato['Existencia']);
					$('#precioV').val(dato['Precio']);

					$('#imgProducto').prepend('<img class="img-thumbnail" id="imgp" src="' + dato['ruta'] + '" />');
				}
			});
		});

		$('#btnAgregaVenta').click(function(){
			vacios=validarFormVacio('frmVentasProductos');
			if(vacios > 0){
				alertify.alert("Debes llenar todos los campos!!");
				return false;
			}

			datos=$('#frmVentasProductos').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/ventas/agregaProductoTemp.php",
				success:function(r){
				$('#tablaVentasTempLoad').load("procesos/tablaVentasTemp.php");
				alert(r)

				}
			});
		});

		$('#btnVaciarVentas').click(function(){

		$.ajax({
			url:"procesos/vaciarTemp.php",
			success:function(r){
				$('#tablaVentasTempLoad').load("procesos/tablaVentasTemp.php");
			}
		});
	});

	});
</script>

<script type="text/javascript">
	function quitarP(index){
		$.ajax({
			type:"POST",
			data:"ind=" + index,
			url:"procesos/quitarproducto.php",
			success:function(r){
				$('#tablaVentasTempLoad').load("procesos/tablaVentasTemp.php");
				alertify.success("Se quito el producto ");
			}
		});
	}

	function crearVenta(){
		$.ajax({
			url:"procesos/crearVenta.php",
			success:function(r){
				if(r > 0){
					$('#tablaVentasTempLoad').load("procesos/tablaVentasTemp.php");
					$('#frmVentasProductos')[0].reset();
					alertify.alert("Venta creada con exito");
				}else if(r==0){
					alertify.alert("No hay lista de venta!!");
				}else{
					alertify.error("No se pudo crear la venta");
				}
			}
		});

	}
</script>