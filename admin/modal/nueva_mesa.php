<?php 
$consulta="SELECT * FROM sucursal";
$datos=mysqli_query($conexion,$consulta);
?>
<!-- Modal -->
<div class="modal fade" id="modal_nueva_mesa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nueva Mesa</h4>
      </div>
      <div class="modal-body">
        <div class="form">
          <label>Sucursal</label>
          <select id="txt_sucursal_mesa" class="form-control">
          <?php 
            while($fila=mysqli_fetch_array($datos))
            {
              echo '<option value="'.$fila['id_sucursal'].'">'.$fila['sucursal'].'</option>';
            }
           ?>
           </select>
        </div>
      </div>
      <div class="modal-body">
        <label>Numero de mesa</label>
        <input type="text" class="form-control" id="txt_numero_mesa_nueva"> 
      </div>
      <div class="modal-body">
        <label>Capacidad</label>
        <input type="text" class="form-control" id="txt_capacidad_mesa_nueva"> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="insertMesa();">Guardar Cambios</button>
      </div>
  </div>
</div>
</div>