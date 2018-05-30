<div class="modal fade" id="mana">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color: lightgreen;">
      <div class="modal-header">
        <h3 class="modal-title text-danger">Usuarios</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-light">
        
        <div id="agregar">
          <form action="" id="agregarinfo" method="POST" enctype="multipart/form-data">

                <label class="text-primary">Usuario</label>
                <input type="text" class="form-control" id="nom" name="nom">

                <label class="text-primary">Contraseña</label>
                <input type="text" name="pass" id="pass" class="form-control">

                <label class="text-primary">Empleado</label>
                <select id="op" name="op" class="form-control">
                  <option value="opcion">[Seleccione un Empleado]</option>
                  <?php
                    $sql=$conexion->query("SELECT * FROM empleado");
                    while($fil=$sql->fetch_assoc()){
                  ?>
                    <option value="<?php echo $fil['Id_Empleado']; ?>"><?php echo $fil['Nombre']." ".$fil['Apellido']; ?></option>
                <?php } ?>
                </select>

                <label class="text-primary">Tipo de usuario</label>
                <select name="tip" id="tip" class="form-control">
                  <option value="opcion">[Selecione un tipo de usuario]</option>
                  <option value="admin">Administrador</option>
                  <option value="user">Usuario</option>
                </select>

                <label class="text-primary">Imagen</label>
                <input type="file" name="ima" class="form-control" id="ima">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary fa" data-dismiss="modal">Cancelar</button>
        <button class="btn btn-primary fa fa-floppy-o" id="manage"> Guardar</button>
      </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="mana2">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color: lightgreen;">
      <div class="modal-header">
        <h3 class="modal-title text-danger">Usuarios</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-light">
        
          <form action="" id="editarinfo" method="POST" enctype="multipart/form-data">
            <input type="hidden" id="editRowID" name="editRowID" value="0">

                <label class="text-primary">Usuario</label>
                <input type="text" class="form-control" id="nom1" name="nom1">

                <label class="text-primary">Contraseña</label>
                <input type="text" name="pass1" id="pass1" class="form-control">


                <label class="text-primary">Tipo de usuario</label>
                <select name="tip1" id="tip1" class="form-control">
                  <option value="opcion">[Selecione un tipo de usuario]</option>
                  <option value="admin">Administrador</option>
                  <option value="user">Usuario</option>
                </select>

                <label class="text-primary">Imagen</label>
                <input type="file" name="ima1" class="form-control" id="ima1">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary fa" data-dismiss="modal">Cancelar</button>
        <button class="btn btn-primary fa fa-edit" id="editar"> Modificar</button>
      </form>
      </div>
    </div>
  </div>
</div>
