<!-- Modal -->
<div class="modal fade" id="modal_nueva_mesa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nueva sucursal</h4>
      </div>
      <div class="modal-body">
        <label>Numero de mesa</label>
        <input type="text" class="form-control" id="txt_numero_mesa_nueva"> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="insertMesa();">Guardar Cambios</button>
      </div>
  </div>
</div>