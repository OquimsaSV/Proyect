<div class="modal fade" id="mana">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color: lightgreen;">
      <div class="modal-header">
        <h3 class="modal-title text-danger">Empleado</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-light">
        

                <input type="hidden" id="editRowID" value="0">
                <label class="text-primary">Nombre</label>
                <input type="text" class="form-control" id="nom" class="form-control"><br>

                <label class="text-primary">Apellido</label>
                <input type="text" id="ape" class="form-control">
                
                <label class="text-primary">Fecha de Nacimiento</label>
                <input type="date" id="fec" class="form-control">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button class="btn btn-primary" id="manage" onclick="manageData('addNew')"><i class="fa fa-floppy-o"></i> Guardar</button>
        <button class="btn btn-primary" id="editar" onclick="manageData('updateRow')"><i class="fa fa-edit"></i> Modificar</button>
      </div>
    </div>
  </div>
</div>