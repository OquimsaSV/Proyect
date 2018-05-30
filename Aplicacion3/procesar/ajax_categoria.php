<?php
	if (isset($_POST['key'])) { 

		$conn = new mysqli('localhost', 'root', 'mysql', 'proyecto');
		$conn->query("SET NAMES 'utf8'");
		$name = @$conn->real_escape_string($_POST['name']);
		$desc = @$conn->real_escape_string($_POST['desc']);
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

			$sql = $conn->query("SELECT * FROM categoria LIMIT $start, $limit");
			if ($sql->num_rows > 0) {
				$response = "";
				while($data = $sql->fetch_array()) { 
					$response .= '
						<tr>
							<td>'.$data["Id_Categoria"].'</td>
							<td id="country_'.$data["Id_Categoria"].'">'.$data["Nombre"].'</td>
							<td id="country_'.$data["Id_Categoria"].'">'.$data["Descripcion"].'</td>
							<td>
								<button type="button" onclick="viewORedit('.$data["Id_Categoria"].', \'edit\')" class="btn btn-primary fa fa-edit" title="Editar"></button>
								<button type="button" onclick="deleteRow('.$data["Id_Categoria"].')" class="btn btn-danger fa fa-trash" title="Eliminar"></button>
							</td>
						</tr>
					';
				}
				exit($response);
			}else exit("reachedMax");
		}

		

		if ($_POST['key'] == 'deleteRow') {
			$conn->query("DELETE FROM categoria WHERE Id_Categoria='$rowID'");
			exit('Categoria borrada correctamente!');
		}

		if ($_POST['key'] == 'updateRow') {
			$conn->query("UPDATE categoria SET Nombre='$name', Descripcion='$desc'  WHERE Id_Categoria='$rowID'");
			exit('success');
		}

		if ($_POST['key'] == 'addNew') {
      		$sql = $conn->query("SELECT Nombre FROM categoria WHERE Nombre = '$name'");
      		if ($sql->num_rows > 0)
       			exit("Categoria con este nombre ya existe!");
      		else {
		        $conn->query("INSERT INTO categoria 
		              VALUES ('','$name', '$desc')");
		        exit('Categoria insertada correctamente!');
      }
    }
	}
?>