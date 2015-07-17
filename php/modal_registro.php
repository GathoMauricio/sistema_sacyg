<!-- Modal -->
<div class="modal fade" id="modal_registro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ingrese sus datos a continuacion</h4>
      </div>
      <div class="modal-body">
        <div class="form" id="form_registro">
          <label>Nombre*</label><br>
          <input type="text" class="form-control" id="txt_nombre_registro" required>
          <label>Telefono</label><br>
          <input type="text" class="form-control" id="txt_telefono_registro" required>
          <label>E-mail*</label><br>
          <input type="text" class="form-control" id="txt_email_registro" required>
          <label>Contraseña*</label><br>
          <input type="password" class="form-control" id="txt_contrasena_registro" required>
          <label>Confirma tu contraseña*</label><br>
          <input type="password" class="form-control" id="txt_recontrasena_registro" required>
          <label>RFC</label><br>
          <input type="text" class="form-control" id="txt_rfc_registro" >
          <label>Calle y Numero*</label><br>
          <input type="text" class="form-control" id="txt_calle_registro" required>
          <label>Colonia*</label><br>
          <input type="text" class="form-control" id="txt_colonia_registro" required>
          <label>Municipio*</label><br>
          <input type="text" class="form-control" id="txt_municipio_registro" required>
          <label>Codigo Postal*</label><br>
          <input type="text" class="form-control" id="txt_cp_registro" required>
          <br><br>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>  
        <button  class="btn btn-primary" onclick="registrarCliente();">Registrame</button>
      </div>
  </div>
</div>
</div>