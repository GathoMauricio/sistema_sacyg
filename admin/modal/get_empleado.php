<?php 
include "../../control/conexion.php";
$consulta="SELECT * FROM empleado e LEFT JOIN usuario u 
ON e.id_usuario=u.id_usuario LEFT JOIN nomina n 
ON u.id_nomina=n.id_nomina 
WHERE id_empleado=".$_POST['id'];
$datos=mysqli_query($conexion,$consulta);
while($fila=mysqli_fetch_array($datos))
{
    $id_sucursal=$fila['id_sucursal'];
    $nombre=$fila['nombre'];
    $ap_paterno=$fila['ap_paterno'];
    $ap_materno=$fila['ap_materno'];
    $fecha_nacimiento=$fila['fecha_nacimiento'];
    $telefono=$fila['telefono'];
    $email=$fila['email'];
    $calle_numero=$fila['calle_numero'];
    $colonia=$fila['colonia'];
    $municipio=$fila['municipio'];
    $cp=$fila['cp'];

    $id_rol=$fila['id_rol'];

    $hora_entrada=$fila['hora_entrada'];
    $hora_salida=$fila['hora_salida'];
    $sueldo=$fila['sueldo'];
}
 ?>


<div class="form">
        <input type="text" id="txt_id_empleado_update" value="<?php echo $_POST['id']; ?>" hidden> 
        
        <label>Rol del Empleado</label>
        <select class="form-control" id="txt_rol_empleado_update">
          <?php
            $consulta="SELECT * FROM rol";
            $datos=mysqli_query($conexion,$consulta);
            while($fila=mysqli_fetch_array($datos))
            {
              if($fila['id_rol']==$id_rol)
              {
                echo '<option value="'.$fila['id_rol'].'" selected>'.$fila['tipo_rol'].'</option>';
              }else
              {
                echo '<option value="'.$fila['id_rol'].'">'.$fila['tipo_rol'].'</option>';
              }
              
            }
           ?>
        </select>
        <label>Hora de entrada</label>
        <input type="time" class="form-control" id="txt_hora1_empleado_update" value="<?php echo $hora_entrada; ?>">
        <label>Hora de salida</label>
        <input type="time" class="form-control" id="txt_hora2_empleado_update" value="<?php echo $hora_salida; ?>">
        <label>sueldo</label>
        <input type="text" onkeypress="soloNumeros();" class="form-control" id="txt_sueldo_empleado_update" value="<?php echo $sueldo; ?>">
        <label>Sucursal</label>
        <select id="txt_sucursal_empleado_update" class="form-control">
          <?php
            $consulta="SELECT * FROM sucursal";
            $datos=mysqli_query($conexion,$consulta);
            while($fila=mysqli_fetch_array($datos))
            {
              echo '<option value="'.$fila['id_sucursal'].'">'.$fila['sucursal'].'</option>';
            }
           ?>
         </select>
        <label>Nombre del empleado</label>
        <input type="text" class="form-control" id="txt_nombre_empleado_update" value="<?php echo $nombre; ?>"> 
        <label>Apellido paterno</label>
        <input type="text" class="form-control" id="txt_apaterno_empleado_update" value="<?php echo $ap_paterno; ?>"> 
        <label>Apellido materno</label>
        <input type="text" class="form-control" id="txt_amaterno_empleado_update" value="<?php echo $ap_materno; ?>"> 
        <label>Fecha de nacimiento</label>
        <input type="date" class="form-control" id="txt_fecha_empleado_update" value="<?php echo $fecha_nacimiento; ?>"> 
        <label>Telefono</label>
        <input type="text" onkeypress="soloNumeros();" class="form-control" id="txt_telefono_empleado_update" value="<?php echo $telefono; ?>"> 
        <label>E-mail</label>
        <input type="text" class="form-control" id="txt_email_empleado_update" value="<?php echo $email; ?>"> 
        <label>Calle-numero</label>
        <input type="text" class="form-control" id="txt_calle_numero_empleado_update" value="<?php echo $calle_numero; ?>"> 
        <label>Colonia</label>
        <input type="text" class="form-control" id="txt_colonia_empleado_update" value="<?php echo $colonia; ?>"> 
        <label>Municipio</label>
        <input type="text" class="form-control" id="txt_municipio_empleado_update" value="<?php echo $municipio; ?>"> 
        <label>Codigo Postal</label>
        <input type="text" onkeypress="soloNumeros();" class="form-control" id="txt_cp_empleado_update" value="<?php echo $cp; ?>"> 
        </div>