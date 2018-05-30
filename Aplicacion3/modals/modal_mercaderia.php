
<div class="modal fade" id="mana">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color: lightgreen;">
      <div class="modal-header">
        <h3 class="modal-title text-danger">Ingresar Mercadería</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-light">
        
        <div id="agregar">
            <input type="hidden" id="editRowID" value="0">
                <label class="text-primary">Producto</label>
                <select id="op" class="form-control">
                  <option value="opcion">[Seleccione un producto]</option>
                  <?php
                  
                    $conn=new mysqli('localhost','root','mysql','proyecto');
                    $sql="SELECT * FROM productos";
                    $eje=$conn->query($sql);
                    while ($fi=$eje->fetch_assoc()) {
                      ?>
                      <option value=<?php echo $fi['Id_Producto']; ?>><?php echo $fi['Nombre']; ?></option>
                      <?php } ?>

                </select>
                <label class="text-primary">Cantidad</label>
                <input type="number" min="1" step="1" class="form-control" id="can">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button class="btn btn-primary" id="manage" onclick="manageData('addNew')">Guardar</button>
      </div>
    </div>
  </div>
</div>
