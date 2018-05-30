<?php
	if (isset($_POST['key'])) { 

		$conn = new mysqli('localhost', 'root', 'mysql', 'proyecto');

		$op = @$conn->real_escape_string($_POST['op']);
		$can = @$conn->real_escape_string($_POST['can']);
		$rowID = @$conn->real_escape_string($_POST['rowID']);


		if ($_POST['key'] == 'getRowData') {
			$rowID = $conn->real_escape_string($_POST['rowID']);
			$sql = $conn->query("SELECT * FROM categoria WHERE Id_Categoria='$rowID'");
			$data = $sql->fetch_array();
			$jsonArray = array(
				'nom' => $data['Nombre'],
				'des' => $data['Descripcion'],
			);

			exit(json_encode($jsonArray));
 		}

		if ($_POST['key'] == 'getExistingData') {
			$start = $conn->real_escape_string($_POST['start']);
			$limit = $conn->real_escape_string($_POST['limit']);

			$sql = $conn->query("SELECT * FROM ingreso LIMIT $start, $limit");
			if ($sql->num_rows > 0) {
				$response = "";
				while($data = $sql->fetch_array()) {
					$eje=$conn->query("SELECT * FROM productos WHERE Id_Producto='".$data['Id_Producto']."'");
					$eje=$eje->fetch_assoc(); 
					$response .= '
						<tr>
							<td>'.$data["Id_Ingreso"].'</td>
							<td id="country_'.$data["Id_Ingreso"].'">'.$eje['Nombre'].'</td>
							<td id="country_'.$data["Id_Ingreso"].'">'.$data["Cantidad"].'</td>
							<td id="country_'.$data["Id_Ingreso"].'">'.$data['Fecha'].'</td>
							<td>
								<button type="button" onclick="deleteRow('.$data["Id_Ingreso"].')" class="btn btn-danger text-center fa fa-trash"></button>
							</td>
						</tr>
					';
				}
				exit($response);
			}else exit("reachedMax");
		}

		


		if ($_POST['key'] == 'deleteRow') {
			
			$eje2=$conn->query("SELECT * FROM ingreso WHERE Id_Ingreso='$rowID'");
			$eje2=$eje2->fetch_assoc();

			$eje=$conn->query("SELECT * FROM productos WHERE Id_Producto='".$eje2['Id_Producto']."'");
			$eje=$eje->fetch_assoc();

			$delin=$eje2['Cantidad'];
			$delpro=$eje['Existencia'];
			$total=$delpro-$delin;

			$conn->query("UPDATE productos SET Existencia=$total WHERE Id_Producto=".$eje['Id_Producto']);

			$conn->query("DELETE FROM ingreso WHERE Id_Ingreso='$rowID'");
			exit('Ingreso de mercadería borrado correctamente!');
		}


		if ($_POST['key'] == 'addNew') {
				$date=date("Y-m-d");
				$eje=$conn->query("SELECT * FROM productos WHERE Id_Producto='$op'");
				$eje=$eje->fetch_assoc();

				$canini=$eje['Existencia'];
				$total=intval(($canini+$can));

		        

		        if ($op=="opcion" || $can=='') {
		        	exit('Por favor complete todos los campos e introduzca valores enteros');
		        }else{
		        	$conn->query("INSERT INTO ingreso VALUES ('','$op', '$can','$date')");
		        	$conn->query("UPDATE productos SET Existencia=$total WHERE Id_Producto=".$eje['Id_Producto']);
		        	exit("success");
		        }

		       
		        
      }
	}