<!-- Modal -->
<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ingrese sus datos a continuacion</h4>
      </div>
      <div class="modal-body">
        <div class="form-inline">
          <input type="text" class="form-control" id="txt_usuario_login" placeholder="Ingresa tu email"><br><br>
          <input type="password" class="form-control" id="txt_contrasena_login" placeholder="Ingresa tu contraseña">
        </div>
      </div>
      <div class="modal-footer">
        <center>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="validaCliente();">Iniciar sesion</button>
        </center>
      </div>
  </div>
</div>
</div>