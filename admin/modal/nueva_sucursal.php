<!-- Modal -->
<div class="modal fade" id="modal_nueva_sucursal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nueva sucursal</h4>
      </div>
      <div class="modal-body">
        <label>Nombre de sucursal</label>
        <input type="text" class="form-control" id="txt_nombre_sucursal_nueva"> 
      </div>
      <div class="modal-body">
        <label>Telefono</label>
        <input type="text" class="form-control" id="txt_telefono_sucursal_nueva"> 
      </div>
      <div class="modal-body">
        <label>Mapa</label>
        <input type="text" class="form-control" id="txt_mapa_sucursal_nueva"> 
      </div>
      <div class="modal-body">
        <label>Calle numero</label>
        <input type="text" class="form-control" id="txt_calle_numero_sucursal_nueva"> 
      </div>
      <div class="modal-body">
        <label>Colonia</label>
        <input type="text" class="form-control" id="txt_colonia_sucursal_nueva"> 
      </div>
      <div class="modal-body">
        <label>Delegacion</label>
        <input type="text" class="form-control" id="txt_delegacion_sucursal_nueva"> 
      </div>
      <div class="modal-body">
        <label>Codigo Postal</label>
        <input type="text" class="form-control" id="txt_cp_sucursal_nueva"> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="insertSucursal();">Guardar Cambios</button>
      </div>
  </div>
</div>
</div>