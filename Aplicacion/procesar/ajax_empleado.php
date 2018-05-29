<?php
	if (isset($_POST['key'])) { 

		$conn = new mysqli('localhost', 'root', '', 'proyecto');
		$conn->query("SET NAMES 'utf8'");

		$nom = @$conn->real_escape_string($_POST['nom']);
		$ape = @$conn->real_escape_string($_POST['ape']);
		$fec = @$conn->real_escape_string($_POST['fec']);
		$rowID = @$conn->real_escape_string($_POST['rowID']);


		if ($_POST['key'] == 'getRowData') {
			$rowID = $conn->real_escape_string($_POST['rowID']);
			$sql = $conn->query("SELECT * FROM empleado WHERE Id_Empleado='$rowID'");
			$data = $sql->fetch_array();
			$jsonArray = array(
				'nom' => $data['Nombre'],
				'ape' => $data['Apellido'],
				'fec' => $data['Fecha_Nac'],
			);

			exit(json_encode($jsonArray));
 		}

		if ($_POST['key'] == 'getExistingData') {
			$start = $conn->real_escape_string($_POST['start']);
			$limit = $conn->real_escape_string($_POST['limit']);

			$sql = $conn->query("SELECT * FROM empleado LIMIT $start, $limit");
			if ($sql->num_rows > 0) {
				$response = "";
				while($data = $sql->fetch_array()) { 
					$response .= '
						<tr>
							<td>'.$data["Id_Empleado"].'</td>
							<td id="country_'.$data["Id_Empleado"].'">'.$data["Nombre"].'</td>
							<td id="country_'.$data["Id_Empleado"].'">'.$data["Apellido"].'</td>
							<td id="country_'.$data["Id_Empleado"].'">'.$data["Fecha_Nac"].'</td>
							<td>
								<button type="button" onclick="viewORedit('.$data["Id_Empleado"].', \'edit\')" class="btn btn-primary fa fa-edit" title="Editar"></button>
								<button type="button" onclick="deleteRow('.$data["Id_Empleado"].')" class="btn btn-danger fa fa-trash" title="Borrar"></button>
							</td>
						</tr>
					';
				}
				exit($response);
			}else exit("reachedMax");
		}

		

		if ($_POST['key'] == 'deleteRow') {
			$conn->query("DELETE FROM empleado WHERE Id_Empleado='$rowID'");
			exit('Empleado borrado correctamente!');
		}

		if ($_POST['key'] == 'updateRow') {
			$conn->query("UPDATE empleado SET Nombre='$nom', Apellido='$ape', Fecha_Nac='$fec'  WHERE Id_Empleado='$rowID'");
			exit('Empleado actualizado correctamente');
		}

		if ($_POST['key'] == 'addNew') {
			if ($fec > date("Y-m-d")) {
				exit("La fecha introducida es mayor a la actual");
			}else{
		        $conn->query("INSERT INTO empleado VALUES ('','$nom', '$ape', '$fec')");
		        exit('Empleado insertado correctamente!');
		    }
      	}
    }
?>