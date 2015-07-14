<?php 
$consulta="SELECT * FROM sucursal";
$datos=mysqli_query($conexion,$consulta);
?>
<?php 
$consulta="SELECT * FROM usuario";
$datos=mysqli_query($conexion,$consulta);
?>

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
          <select id="txt_empleado_usuario" class="form-control">
          <?php 
            while($fila=mysqli_fetch_array($datos))
            {
              echo '<option value="'.$fila['id_usuario'].'">'.$fila['usuario'].'</option>';
            }
           ?>
           </select>
        </div>
      <div class="modal-body">
        <div class="form">
          <label>Sucursal</label>
          <select id="txt_empleado_sucursal" class="form-control">
          <?php 
            while($fila=mysqli_fetch_array($datos))
            {
              echo '<option value="'.$fila['id_sucursal'].'">'.$fila['sucursal'].'</option>';
            }
           ?>
           </select>
        </div>
      <div class="modal-body">
        <label>Nombre del empleado</label>
        <input type="text" class="form-control" id="txt_nombre_empleado_nuevo"> 
      </div>
      <div class="modal-body">
        <label>Apellido paterno</label>
        <input type="text" class="form-control" id="txt_apaterno_empleado_nuevo"> 
      </div>
      <div class="modal-body">
        <label>Apellido materno</label>
        <input type="text" class="form-control" id="txt_amaterno_empleado_nuevo"> 
      </div>
      <div class="modal-body">
        <label>Fecha de nacimiento (aaaa-mm-dd)</label>
        <input type="text" class="form-control" id="txt_fecnac_empleado_nuevo"> 
      </div>
      <div class="modal-body">
        <label>Telefono</label>
        <input type="text" class="form-control" id="txt_telefono_empleado_nuevo"> 
      </div>
      <div class="modal-body">
        <label>E-mail</label>
        <input type="text" class="form-control" id="txt_email_empleado_nuevo"> 
      </div>
      <div class="modal-body">
        <label>Calle-numero</label>
        <input type="text" class="form-control" id="txt_calle_numero_empleado_nuevo"> 
      </div>
      <div class="modal-body">
        <label>Colonia</label>
        <input type="text" class="form-control" id="txt_colonia_empleado_nuevo"> 
      </div>
      <div class="modal-body">
        <label>Municipio</label>
        <input type="text" class="form-control" id="txt_municipio_empleado_nuevo"> 
      </div>
      <div class="modal-body">
        <label>Codigo Postal</label>
        <input type="text" class="form-control" id="txt_cp_empleado_nuevo"> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="insertEmpleado();">Guardar Cambios</button>
      </div>
  </div>
</div>
</div>