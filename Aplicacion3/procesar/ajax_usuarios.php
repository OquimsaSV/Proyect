<?php
	include("../bd/encriptar.php");
	$cifrar=new cifrarpass;
	if (isset($_POST['key'])) { 

		$conn = new mysqli('localhost', 'root', 'mysql', 'proyecto');
		$conn->query("SET NAMES 'utf8'");
		$rowID = @$conn->real_escape_string($_POST['rowID']);

		if ($_POST['key'] == 'getRowData') {
			$rowID = $conn->real_escape_string($_POST['rowID']);
			$sql = $conn->query("SELECT * FROM usuarios WHERE Id_Empleado='$rowID'");
			$data = $sql->fetch_array();
			$data['pass']=$cifrar->desencriptar($data['pass']);
			$jsonArray = array(
				'nom' => $data['nombre'],
				'pass' => $data['pass'],
				'tipo' => $data['tipo'],
				'id' => $data['Id_Empleado'],
			);

			exit(json_encode($jsonArray));
 		}

		if ($_POST['key'] == 'getExistingData') {
			$start = $conn->real_escape_string($_POST['start']);
			$limit = $conn->real_escape_string($_POST['limit']);

			$sql = $conn->query("SELECT * FROM usuarios LIMIT $start, $limit");
			if ($sql->num_rows > 0) {
				$response = "";
				while($data = $sql->fetch_array()) { 
					$row=$conn->query("SELECT * FROM empleado WHERE Id_Empleado='".$data['Id_Empleado']."'");
					$row=$row->fetch_assoc();
				if ($data['imagen']=='' || $data['imagen']=='NULL') {
					$img="<img src='images/none.png' width='40px' class='rounded-circle'>";
				}else{
					$imag=$imag=substr($data['imagen'], 3);
					$img="<img src='$imag' width='40px' class='rounded-circle'>";
				}
					$data['pass']=$cifrar->desencriptar($data['pass']);
					$response .= '
						<tr>
							<td id="country_'.$data["Id_Empleado"].'">'.$data["nombre"].'</td>
							<td id="country_'.$data["Id_Empleado"].'">'.$data["pass"].'</td>
							<td id="country_'.$data["Id_Empleado"].'">'.$data["tipo"].'</td>
							<td id="country_'.$data["Id_Empleado"].'">'.$row['Nombre'].' '.$row['Apellido'].'</td>
							<td id="country_'.$data["nombre"].'" align="center">'.$img.'</td>
							<td>
								<button type="button" onclick="viewORedit('.$data["Id_Empleado"].', \'edit\')" class="btn btn-primary fa fa-edit" title="Editar"></button>
								<button type="button" onclick="deleteRow('.$data["Id_Empleado"].')" class="btn btn-danger fa fa-trash" title="Eliminar"></button>
							</td>
						</tr>
					';
				}
				exit($response);
			}else exit("reachedMax");
		}

		

		if ($_POST['key'] == 'deleteRow') {
			$conn->query("DELETE FROM usuarios WHERE Id_Empleado='$rowID'");
			exit('Usuario borrado correctamente!');
		}

	}
?>