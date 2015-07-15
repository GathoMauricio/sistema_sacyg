<?php 
$consulta="SELECT * FROM tipo_alimento";
$datos=mysqli_query($conexion,$consulta);
?>
<!-- Modal -->
<div class="modal fade" id="modal_nuevo_alimento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Alimento</h4>
      </div>
      <div class="modal-body">
        <div class="form">
          <label>Tipo Alimento</label>
          <select id="txt_alimento_tipo" class="form-control">
          <?php 
            while($fila=mysqli_fetch_array($datos))
            {
              echo '<option value="'.$fila['id_tipo_alimento'].'">'.$fila['tipo_alimento'].'</option>';
            }
           ?>
           </select>
        </div>
        </div>
      <div class="modal-body">
        <label>Nombre del alimento</label>
        <input type="text" class="form-control" id="txt_nombre_alimento_nuevo"> 
      </div>
      <div class="modal-body">
        <label>Descripcion</label>
        <input type="text" class="form-control" id="txt_descripcion_alimento_nuevo"> 
      </div>
      <div class="modal-body">
        <label>Precio</label>
        <input type="text" class="form-control" id="txt_precio_alimento_nuevo"> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="insertAlimento();">Guardar Cambios</button>
      </div>
  </div>
</div>
</div>