<?php 
include "../../control/conexion.php";
$consulta="SELECT * FROM mesa WHERE id_mesa=".$_POST['id'];
$datos=mysqli_query($conexion,$consulta);
while($fila=mysqli_fetch_array($datos))
{
  $id_sucursal=$fila['id_sucursal'];
  $id_disponibilidad=$fila['id_disponibilidad'];
  $numero_mesa=$fila['numero_mesa'];
  $capacidad=$fila['capacidad'];
}
?>

        <div class="form">
          <input type="text" value="<?php echo $_POST['id'] ?>" id="id_update_mesa" hidden>
          <label>Sucursal</label>
          <select id="txt_sucursal_mesa_update" class="form-control">
          <?php 
          $consulta="SELECT * FROM sucursal";
          $datos=mysqli_query($conexion,$consulta);
            while($fila=mysqli_fetch_array($datos))
            {
              if($fila['id_sucursal']==$id_sucursal)
              {
                echo '<option value="'.$fila['id_sucursal'].'" selected>'.$fila['sucursal'].'</option>';
              }else
              {
                echo '<option value="'.$fila['id_sucursal'].'">'.$fila['sucursal'].'</option>';
              }
              
            }
           ?>
           </select>
        <label>Numero de mesa</label>
        <input type="text" onkeypress="soloNumeros();" class="form-control" id="txt_numero_mesa_update" value="<?php echo $numero_mesa; ?>"> 
        <label>Capacidad</label>
        <input type="text" onkeypress="soloNumeros();" class="form-control" id="txt_capacidad_mesa_update" value="<?php echo $capacidad; ?>">
        <label>Disponibilidad</label>
        <select id="txt_disponibilidad_mesa_update" class="form-control">
          <?php 
          $consulta="SELECT * FROM disponibilidad";
          $datos=mysqli_query($conexion,$consulta);
            while($fila=mysqli_fetch_array($datos))
            {
              if($fila['id_disponibilidad']==$id_disponibilidad)
              {
                echo '<option value="'.$fila['id_disponibilidad'].'" selected>'.$fila['estatus'].'</option>';
              }else
              {
                echo '<option value="'.$fila['id_disponibilidad'].'">'.$fila['estatus'].'</option>';
              }
              
            }
           ?>
           </select>
      </div>
      