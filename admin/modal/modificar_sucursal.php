<?php 
$consulta="SELECT * FROM sucursal";
$datos=mysqli_query($conexion,$consulta);
?>
<!-- Modal -->
<div class="modal fade" id="modal_update_sucursal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div id="contenedor_update_sucursal">
      <!-- Esto se va a llenar con los campos ya llenos de valores de get_sucursal.php-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="updateSucursal();">Guardar Cambios</button>
      </div>
  </div>
</div>
</div>