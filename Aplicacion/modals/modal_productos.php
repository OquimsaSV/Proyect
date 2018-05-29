
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
        <?php   $conn=new mysqli('localhost','root','','proyecto'); ?>
        <div id="agregar">
            
            <form method="POST" id="enviarimag" enctype="multipart/form-data">
              <input type="hidden" id="editRowID" name="editRowID" value="0">
                <label class="text-primary">Nombre</label>
                <input type="text" class="form-control" name="name" id="name"><br>

                <label class="text-primary">Descripción</label>
                <textarea id="desc" name="desc" class="form-control"></textarea>
                
                <label class="text-primary">Categoria</label>
                <select id="cate" name="cate" class="form-control">
                  <?php
                  
                    
                    $sql="SELECT * FROM categoria";
                    $eje=$conn->query($sql);
                    while ($fi=$eje->fetch_assoc()) {
                  ?>
                      <option value=<?php echo $fi['Id_Categoria']; ?>><?php echo $fi['Nombre']; ?></option>
                  <?php } ?>

                </select>
                <label class="text-primary">Precio</label>
                <input type="number" id="pre" name="pre" min="0" step="0.01" class="form-control">
                <label class="text-primary">Imagen</label>
                <input type="file" id="img" name="img" class="form-control">
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button class="btn btn-primary" id="manage" name="Enviar"><i class="fa fa-floppy-o"></i> Guardar</button></form>
      </div>
    </div>
  </div>
</div>





<div class="modal fade" id="mana2">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color: lightgreen;">
      <div class="modal-header">
        <h3 class="modal-title text-danger">Categoria</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-light">
        <?php   $conn=new mysqli('localhost','root','','proyecto'); ?>
            
            <form method="POST" id="actualizarimag" enctype="multipart/form-data">
              <input type="hidden" id="editRow" name="editRow" value="">
                <label class="text-primary">Nombre</label>
                <input type="text" class="form-control" name="nam" id="nam"><br>

                <label class="text-primary">Descripción</label>
                <textarea id="des" name="des" class="form-control"></textarea>
                
                <label class="text-primary">Categoria</label>
                <select id="cat" name="cat" class="form-control">
                  <?php
                  
                    
                    $sql="SELECT * FROM categoria";
                    $eje=$conn->query($sql);
                    while ($fi=$eje->fetch_assoc()) {
                  ?>
                      <option value=<?php echo $fi['Id_Categoria']; ?>><?php echo $fi['Nombre']; ?></option>
                  <?php } ?>

                </select>
                <label class="text-primary">Precio</label>
                <input type="number" id="prec" name="prec" min="0" step="0.01"  class="form-control">
                <label class="text-primary">Imagen</label>
                <input type="file" id="imag" name="imag" class="form-control">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="editar_pro"><i class="fa fa-edit"></i> Modificar</button>
      </form>
      </div>
    </div>
  </div>
</div>




