div class="modal fade" id="modal_nuevo_empleado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Empleado</h4>
      </div>
      <div class="modal-body">
        <label>Nombre del empleado</label>
        <input type="text" class="form-control" id="txt_nombre_empleado_nuevo"> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="insertSucursal();">Guardar Cambios</button>
      </div>
  </div>
</div>