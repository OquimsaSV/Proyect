
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
