<?php
	if (isset($_POST['key'])) { 

		$conn = new mysqli('localhost', 'root', 'mysql', 'proyecto');
		$conn->query("SET NAMES 'utf8'");

		$nom = @$conn->real_escape_string($_POST['nom']);
		$dir = @$conn->real_escape_string($_POST['dir']);
		$tel = @$conn->real_escape_string($_POST['tel']);
		$rowID = @$conn->real_escape_string($_POST['rowID']);

		if ($_POST['key'] == 'getRowData') {
			$rowID = $conn->real_escape_string($_POST['rowID']);
			$sql = $conn->query("SELECT * FROM cliente WHERE Id_Cliente='$rowID'");
			$data = $sql->fetch_array();
			$jsonArray = array(
				'nom' => $data['Nombre'],
				'ape' => $data['Apellido'],
				'dir' => $data['Direccion'],
				'tel' => $data['Telefono'],
			);

			exit(json_encode($jsonArray));
 		}

		if ($_POST['key'] == 'getExistingData') {
			$start = $conn->real_escape_string($_POST['start']);
			$limit = $conn->real_escape_string($_POST['limit']);

			$sql = $conn->query("SELECT * FROM cliente LIMIT $start, $limit");
			if ($sql->num_rows > 0) {
				$response = "";
				while($data = $sql->fetch_array()) { 
					$response .= '
						<tr>
							<td>'.$data["Id_Cliente"].'</td>
							<td id="country_'.$data["Id_Cliente"].'">'.$data["Nombre"].'</td>
							<td id="country_'.$data["Id_Cliente"].'">'.$data["Direccion"].'</td>
							<td id="country_'.$data["Id_Cliente"].'">'.$data["Telefono"].'</td>
							<td align="center">
								<button type="button" onclick="viewORedit('.$data["Id_Cliente"].', \'edit\')" class="btn btn-primary fa fa-edit" title="Editar"></button>
								<button type="button" onclick="deleteRow('.$data["Id_Cliente"].')" class="btn btn-danger fa fa-trash" title="Eliminar"></button>
							</td>
						</tr>
					';
				}
				exit($response);
			}else exit("reachedMax");
		}

		

		if ($_POST['key'] == 'deleteRow') {
			$conn->query("DELETE FROM cliente WHERE Id_Cliente='$rowID'");
			exit('Cliente borrado correctamente!');
		}

		if ($_POST['key'] == 'updateRow') {
			$conn->query("UPDATE cliente SET Nombre='$nom', Direccion='$dir', Telefono='$tel'  WHERE Id_Cliente='$rowID'");
			exit('success');
		}

		if ($_POST['key'] == 'addNew') {
		    $conn->query("INSERT INTO cliente vALUES ('','$nom', '$dir', '$tel')");
		    exit('Cliente insertado correctamente!');
      }
    }
?>