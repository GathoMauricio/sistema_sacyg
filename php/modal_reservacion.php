<?php session_start() ?>
<?php 
include "../control/conexion.php";
$consulta="SELECT * FROM sucursal";
$datos=mysqli_query($conexion,$consulta);
 ?>
<!-- Modal -->
<div class="modal fade" id="modal_reservacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ingrese los datos de su reservacion</h4>
      </div>
      <div class="modal-body">
        <input type="text" id="id_cliente_reservacion" value="<?php echo $_SESSION['id_cliente']; ?>" hidden>
        <label>Cliente</label>
        <input type="text" class="form-control" value="<?php echo $_SESSION['nombre']; ?>" readonly>
        <label>Sucursal</label>
        <select class="form-control" id="txt_sucursal_reservacion" onchange="cargarMesas(this.value);">
          <?php 
            while($fila=mysqli_fetch_array($datos))
            {
              echo '<option value="'.$fila['id_sucursal'].'">'.$fila['sucursal'].'</option>';
            }
           ?>
        </select>
        <label>Mesas Disponibles</label>
        <select class="form-control" id="txt_mesa_reservacion" required></select>
        <label>Fecha</label>
        <input type="date" class="form-control" id="txt_fecha_reservacion" required>
        <label>Hora</label>
        <input type="time" class="form-control" id="txt_hora_reservacion" required>
      </div>
      <div class="modal-footer">
        <center>
        <button type="button" class="btn btn-default" data-dismiss="modal">Terminar</button>
        </center>
      </div>
  </div>
</div>
</div>