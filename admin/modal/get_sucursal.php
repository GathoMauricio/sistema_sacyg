<?php 
include "../../control/conexion.php";
//Obtenemos los datos de la sucursal apartor del ID recibido
$consulta="SELECT * FROM sucursal WHERE id_sucursal=".$_POST['id_sucursal'];
$datos=mysqli_query($conexion,$consulta);
if($fila=mysqli_fetch_array($datos))
{
  //guardamos los resultados en variables
  $id_sucursal=$fila['id_sucursal'];
  $sucursal=$fila['sucursal'];
  $telefono=$fila['telefono'];
  //el mapa mejor no por q como es codigo el navegador lo interpreta y causa conflicto
  $mapa=$fila['mapa'];
  $calle_numero=$fila['calle_numero'];
  $colonia=$fila['colonia'];
  $delegacion=$fila['delegacion'];
  $cp=$fila['cp'];
}
 ?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Actualizar sucursal <label id="txt_id_sucursal_update"><?php echo $id_sucursal; ?></label> </h4>
</div>
<!--Les ponemos los valores adquiridos en su correspondiente campo con la propuedad VALUE-->
<div class="modal-body">
        <label>Nombre de sucursal</label>
        <input type="text" class="form-control" id="txt_nombre_sucursal_update" value="<?php echo $sucursal; ?>"> 
      </div>
      <div class="modal-body">
        <label>Teléfono</label>
        <input type="text" class="form-control" id="txt_telefono_sucursal_update" value="<?php echo $telefono; ?>"> 
      </div>
      <!--
      <div class="modal-body">
        <label>Mapa</label>
        <input type="text" class="form-control" id="txt_mapa_sucursal_update" value="<?php echo $mapa; ?>"> 
      </div>
      -->
      <div class="modal-body">
        <label>Calle número</label>
        <input type="text" class="form-control" id="txt_calle_numero_sucursal_update" value="<?php echo $calle_numero; ?>"> 
      </div>
      <div class="modal-body">
        <label>Colonia</label>
        <input type="text" class="form-control" id="txt_colonia_sucursal_update" value="<?php echo $colonia; ?>"> 
      </div>
      <div class="modal-body">
        <label>Delegación</label>
        <input type="text" class="form-control" id="txt_delegacion_sucursal_update" value="<?php echo $delegacion; ?>"> 
      </div>
      <div class="modal-body">
        <label>Código Postal</label>
        <input type="text" class="form-control" id="txt_cp_sucursal_update" value="<?php echo $cp; ?>"> 
      </div>