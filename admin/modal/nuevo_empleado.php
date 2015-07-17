<div class="modal fade" id="modal_nuevo_empleado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Empleado</h4>
      </div>
      <div class="modal-body">
        <div class="form">
        <label>Usuario</label>
        <input type="text" class="form-control" id="txt_usuario_empleado_nuevo"> 
        <label>Contraseña</label>
        <input type="password" class="form-control" id="txt_contrasena_empleado_nuevo"> 
        <label>Confirmar contraseña</label>
        <input type="password" class="form-control" id="txt_recontrasena_empleado_nuevo">
        <label>Rol del Empleado</label>
        <select class="form-control" id="txt_rol_empleado_nuevo">
        </select>
        <label>Hora de entrada</label>
        <input type="time" class="form-control" id="txt_usuario_empleado_nuevo">
        <label>Hora de salida</label>
        <input type="time" class="form-control" id="txt_usuario_empleado_nuevo">
        <label>sueldo</label>
        <input type="text" onkeypress="soloNumeros();" class="form-control" id="txt_usuario_empleado_nuevo">
        <label>Sucursal</label>
        <select id="txt_empleado_sucursal" class="form-control">
          <?php 
            while($fila=mysqli_fetch_array($datos))
            {
              echo '<option value="'.$fila['id_sucursal'].'">'.$fila['sucursal'].'</option>';
            }
           ?>
         </select>
        <label>Nombre del empleado</label>
        <input type="text" class="form-control" id="txt_nombre_empleado_nuevo"> 
        <label>Apellido paterno</label>
        <input type="text" class="form-control" id="txt_apaterno_empleado_nuevo"> 
        <label>Apellido materno</label>
        <input type="text" class="form-control" id="txt_amaterno_empleado_nuevo"> 
        <label>Fecha de nacimiento (aaaa-mm-dd)</label>
        <input type="text" class="form-control" id="txt_fecnac_empleado_nuevo"> 
        <label>Telefono</label>
        <input type="text" class="form-control" id="txt_telefono_empleado_nuevo"> 
        <label>E-mail</label>
        <input type="text" class="form-control" id="txt_email_empleado_nuevo"> 
        <label>Calle-numero</label>
        <input type="text" class="form-control" id="txt_calle_numero_empleado_nuevo"> 
        <label>Colonia</label>
        <input type="text" class="form-control" id="txt_colonia_empleado_nuevo"> 
        <label>Municipio</label>
        <input type="text" class="form-control" id="txt_municipio_empleado_nuevo"> 
        <label>Codigo Postal</label>
        <input type="text" class="form-control" id="txt_cp_empleado_nuevo"> 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="insertEmpleado();">Guardar Cambios</button>
      </div>
  </div>
</div>
</div>
</div>
</div>