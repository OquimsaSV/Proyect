
<div class="modal fade" id="mana">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color: khaki;">
      <div class="modal-header">
        <h3 class="modal-title text-danger">Clientes</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-light">
        
        <div id="agregar">
            <input type="hidden" id="editRowID" value="0">

                <label class="text-primary">Nombre</label>
                <input type="text" class="form-control" id="nom"><br>

                <label class="text-primary">Dirección</label>
                <textarea id="dir" class="form-control"></textarea>

                <label class="text-primary">Teléfono</label>
                <input type="number" id="tel" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button class="btn btn-primary" id="manage" onclick="manageData('addNew')"><i class="fa fa-floppy-o"></i>Guardar</button>
        <button class="btn btn-primary" id="editar" onclick="manageData('updateRow')"><i class="fa fa-edit"></i> Modificar</button>
      </div>
    </div>
  </div>
</div>
