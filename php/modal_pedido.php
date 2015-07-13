<?php session_start() ?>
<?php 
include "../control/conexion.php";
$consulta="SELECT * FROM sucursal";
$datos=mysqli_query($conexion,$consulta);
 ?>
<!-- Modal -->
<div class="modal fade" id="modal_pedido" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ingrese los datos de su pedido</h4>
      </div>
      <div class="modal-body">
        <input type="text" id="id_cliente_pedido" value="<?php echo $_SESSION['id_cliente']; ?>" hidden>
        <label>Cliente</label>
        <input type="text" class="form-control" value="<?php echo $_SESSION['nombre']; ?>" readonly>
        <label>Sucursal</label>
        <select class="form-control" id="txt_sucursal_pedido">
          <?php 
            while($fila=mysqli_fetch_array($datos))
            {
              echo '<option value="'.$fila['id_sucursal'].'">'.$fila['sucursal'].'</option>';
            }
           ?>
        </select>
        <label>Geolocalizacion</label>
        <input type="text" class="form-control" id="txt_latitud_pedido" placeholder="Latitud" readonly><br>
        <input type="text" class="form-control" id="txt_longitud_pedido" placeholder="Lomgitud" readonly><br>
        <a href="#" onclick="geolocalizame();" class="btn btn-primary"><span class="glyphicon glyphicon-globe"></span> Obtener mi ubicacion </a>

      </div>
      <div class="modal-footer">
        <center>
        <button type="button" class="btn btn-default" data-dismiss="modal">Terminar</button>
        </center>
      </div>
  </div>
</div>
</div>