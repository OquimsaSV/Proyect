<?php
		$conn = new mysqli('localhost', 'root', '', 'proyecto');
	if (isset($_POST['key'])) { 

		$conn->query("SET NAMES 'utf8'");

		$name = @$conn->real_escape_string($_POST['name']);
		$desc = @$conn->real_escape_string($_POST['desc']);
		$cate = @$conn->real_escape_string($_POST['cate']);
		$pre = @$conn->real_escape_string($_POST['pre']);
		$img = @$conn->real_escape_string($_POST['img']);
		$rowID = @$conn->real_escape_string($_POST['rowID']);

		if ($_POST['key'] == 'getRowData') {
			$rowID = $conn->real_escape_string($_POST['rowID']);
			$sql = $conn->query("SELECT * FROM productos WHERE Id_Producto='$rowID'");
			$data = $sql->fetch_array();
			$jsonArray = array(
				'nom' => $data['Nombre'],
				'des' => utf8_decode($data['Descripcion']),
				'cate'=>$data['Id_Categoria'],
				'pre' => $data['Precio']
			);

			exit(json_encode($jsonArray));
 		}

		if ($_POST['key'] == 'getExistingData') {
			$start = $conn->real_escape_string($_POST['start']);
			$limit = $conn->real_escape_string($_POST['limit']);

			$sql = $conn->query("SELECT * FROM productos LIMIT $start, $limit");
			if ($sql->num_rows > 0) {
				$response = "";
				while($data = $sql->fetch_array()) {
					$sql2="SELECT Nombre FROM categoria WHERE Id_Categoria='".$data['Id_Categoria']."'";
					//Consulta a categorias
					$eje2=$conn->query($sql2);
					$eje2=$eje2->fetch_assoc();
					//
					$imag=$data['Imagen'];
					$imag=substr($imag, 3);
					if ($imag=="" || $imag=="NULL") {
						$img="<img src='images/ningun_pro.png' width='65px' class='rounded-circle'>";
					}else{
						$img="<img src='".$imag."' width='70px' class='rounded-circle'>";
					}
					$response .= '
						<tr>
							<td>'.$data["Id_Producto"].'</td>
							<td id="country_'.$data["Id_Producto"].'">'.$data["Nombre"].'</td>
							<td id="country_'.$data["Id_Producto"].'">'.$data["Descripcion"].'</td>
							<td id="country_'.$data["Id_Producto"].'">'.$eje2["Nombre"].'</td>
							<td id="country_'.$data["Id_Producto"].'">'.$data["Existencia"].'</td>
							<td id="country_'.$data["Id_Producto"].'">$'.$data["Precio"].'</td>
							<td id="country_'.$data["Id_Producto"].'">'.$img.'</td>
							<td>
								<button type="button" onclick="viewORedit('.$data["Id_Producto"].', \'edit\')" class="btn btn-primary fa fa-edit" title="Editar"></button>
								<button type="button" onclick="deleteRow('.$data["Id_Producto"].')" class="btn btn-danger fa fa-trash" title="Borrar"></button>
							</td>
						</tr>
					';
				}
				exit($response);
			}else exit("reachedMax");
		}

		

		if ($_POST['key'] == 'deleteRow') {
			$eje=$conn->query("SELECT * FROM productos WHERE Id_Producto=$rowID");
			$eje=$eje->fetch_assoc();
			$partes=basename($eje['Imagen']);
			@unlink("../ficheros/productos/$partes");
			$conn->query("DELETE FROM productos WHERE Id_Producto='$rowID'");
			exit('Producto borrado correctamente!');
		}

		if ($_POST['key'] == 'updateRow') {
			$conn->query("UPDATE categoria SET Nombre='$name', Descripcion='$desc'  WHERE Id_Categoria='$rowID'");
			exit('success');
		}
	}

	
?>