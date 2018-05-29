
<div class="modal fade" id="mana">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color: lightgreen;">
      <div class="modal-header">
        <h3 class="modal-title text-danger">Categoria</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-light">
        
        <div id="agregar">
            <input type="hidden" id="editRowID" value="0">
                <label class="text-primary">Nombre</label>
                <input type="text" class="form-control" id="name"><br>
                <label class="text-primary">Descripción</label>
                <textarea id="desc" class="form-control"></textarea>
                <!-- En este select se ha introducido los empleados existentes en el cual en el option se muestra sus nombre, pero en el value de este se ha introducido el Id del empleado -->
                <!--
                <select id="opcion">
                  <?php
                  
                    $conn=new mysqli('localhost','root','','proyecto');
                    $sql="SELECT * FROM empleado";
                    $eje=$conn->query($sql);
                    while ($fi=$eje->fetch_assoc()) {
                      ?>
                      <option value=<?php echo $fi['Id_Empleado']; ?>><?php echo $fi['Nombre']; ?></option>
                      <?php } ?>

                </select>
              -->
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button class="btn btn-primary" id="manage" onclick="manageData('addNew')">Guardar</button>
        <button class="btn btn-primary" id="editar" onclick="manageData('updateRow')">Editar</button>
      </div>
    </div>
  </div>
</div>
