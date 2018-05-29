<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color: lightgreen;">
      <div class="modal-header">
        <h3 class="modal-title text-danger" id="exampleModalLabel">Modificar Usuario</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-light">

        <table class="table table-striped bg-success">
          <form action="" method="POST">
            <tr>
              <?php
                $nombre=$fila['Nombre'];
                $apellido=$fila['Apellido'];
                $nomu=$fil['nombre'];
                $pass=$fil['pass'];
              ?>

              <td>Nombre:</td>
              <td><input type="text" class="form-control" value="<?php echo $nombre; ?>" name="nom" required></td>
            </tr>
            <tr>
              <td>Apellido:</td>
              <td><input type="text" class="form-control" value="<?php echo $apellido; ?>" name="ape" required></td>
            </tr>
            <tr>
              <td>Fecha de Nacimiento:</td>
              <td><input type="date" class="form-control" value="<?php echo $fila['Fecha_Nac']; ?>" name="fecha" required></td>
            </tr>
            <tr>
            <td>Usuario</td>
            <td><input type="text" name="usu" value="<?php echo $nomu; ?>" class="form-control" required></td>
          </tr>
          <tr>
            <td>Contraseña</td>
            <td><input type="text" name="contra" value="<?php echo $pass; ?>" class="form-control" required></td>
          </tr>
          <tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button class="btn btn-primary" name="boton"><i class="fa fa-floppy-o"></i> Guardar</button>
        </form>
        <?php
          if (isset($_POST['boton'])) {
            $nom=$_POST['nom'];
           $ape=$_POST['ape'];
           $fecha=$_POST['fecha'];
           $usu=$_POST['usu'];
           $contra=$_POST['contra']; 

           $sql="UPDATE empleado SET Nombre='$nom',Apellido='$ape',Fecha_Nac='$fecha' WHERE Id_Empleado='".$fil['Id_Empleado']."'";
           $eje=$conexion->query($sql);
           $sql2="UPDATE usuarios SET nombre='$usu',pass='$contra' WHERE Id_Empleado='".$fil['Id_Empleado']."'";
           $eje2=$conexion->query($sql2);
           if ($eje && $eje2) {
              if ($usu==$fil['nombre'] && $contra==$fil['pass']) {
                echo "<script>alert('Cambios realizados correctamente')</script>";
                echo "<script>window.location='usuario.php'</script>";
              }else{
                echo "<script>alert('Cambios realizados correctamente (Dede iniciar sesion nuevamente)')</script>";
                include('close.php');
              }
          }else{
            echo "<script>alert('Error')</script>";
           }
          }
        ?>
      </div>
    </div>
  </div>
</div>

<!--modal editar imagen-->
<div class="modal fade" id="editimage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="background-color: lightgreen;">
      <div class="modal-header">
        <h3 class="modal-title text-danger" id="exampleModalLabel">Modificar Imagen</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-light">
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="input-group">
          <label class="input-group-text">Ingrese la imagen</label>
          <input type="file" name="img" class="form-control">
          <?php echo $fila['Id_Empleado']; ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button class="btn btn-primary" name="boton2"><i class="fa fa-floppy-o"></i> Guardar</button></form>
      </div>
    </div>
  </div>
  <?php
    if (isset($_POST['boton2'])) {
      $conexion->query("SET NAMES 'utf8'");
      $img=$_FILES['img']['tmp_name'];
      $name=$_FILES['img']['name'];
      if (strpos($name, "jpg") || strpos($name, "png") || strrpos($name, "jpeg")) {
       if ($fil['imagen']!="" || $fil['imagen']!="NULL") {
          unlink($fil['imagen']);
        }
        $nom_img=date().time().$name;
        $ruta="ficheros/usuarios/$nom_img";
        if (move_uploaded_file($img, $ruta)) {
          $sql3="UPDATE usuarios SET imagen='$ruta' WHERE Id_Empleado='".$fil['Id_Empleado']."'";
          $ejec=$conexion->query($sql3);
          if ($ejec) {
            echo "<script>alert('Imagen actualizada exitosamente')</script>";
            echo "<script>window.location='usuario.php'</script>";
          }else{
            echo "<script>alert('Error al subir la ruta')</script>";
          }
        }else{
          echo "<script>alert('Imagen no se pudo guardar')</script>";
        }
      }
    }
  ?>
</div>