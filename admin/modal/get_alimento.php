<?php 
include "../../control/conexion.php";
$consulta="SELECT * FROM alimento WHERE id_alimento=".$_POST['id'];
$datos=mysqli_query($conexion,$consulta);

while($fila=mysqli_fetch_array($datos))
{
  $tipo_alimento=$fila['id_tipo_alimento'];
  $alimento=$fila['alimento'];
  $descripcion=$fila['descripcion'];
  $precio=$fila['precio'];
}
 ?>

<div class="form">
  <input type="text" value="<?php echo $_POST['id']; ?>" id="txt_id_update_alimento" hidden>
<label>Tipo Alimento</label>
<select id="txt_alimento_tipo_update" class="form-control">
<?php 
$consulta="SELECT * FROM tipo_alimento";
$datos=mysqli_query($conexion,$consulta);
while($fila=mysqli_fetch_array($datos))
{
  if($fila['id_tipo_alimento']==$tipo_alimento)
  {
    echo '<option value="'.$fila['id_tipo_alimento'].'" selected>'.$fila['tipo_alimento'].'</option>';
  }else
  {
    echo '<option value="'.$fila['id_tipo_alimento'].'">'.$fila['tipo_alimento'].'</option>';
  }
  
}
?>
</select>
<label>Nombre del alimento</label>
<input type="text" class="form-control"  id="txt_nombre_alimento_update" value="<?php echo $alimento; ?>"> 
<label>Descripción</label>
<input type="text" class="form-control" id="txt_descripcion_alimento_update" value="<?php echo $descripcion; ?>"> 
<label>Precio</label>
<input type="text" class="form-control" onkeypress="soloNumeros();" maxlength="3" id="txt_precio_alimento_update" value="<?php echo $precio; ?>"> 