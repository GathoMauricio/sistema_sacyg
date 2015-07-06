<?php include "../../control/conexion.php" ?>
<?php 
$consulta="SELECT * FROM empleado e LEFT JOIN sucursal s 
ON e.id_sucursal=s.id_sucursal LEFT JOIN usuario u 
ON e.id_usuario=u.id_usuario LEFT JOIN rol r 
ON r.id_rol=u.id_rol";
$datos=mysqli_query($conexion,$consulta);

echo'<br>';
echo '<table class="table">';
echo '
<tr class="info">
<td>Nombre</td>
<td>Sucursal</td>
<td>Teléfono</td>
<td>Email</td>
<td>Opciones</td>
</tr>';
while($fila=mysqli_fetch_array($datos))
{
echo '<tr class="active">
<td>'.$fila['nombre'].' '.$fila['ap_paterno'].' '.$fila['ap_materno'].'</td>
<td>'.$fila['tipo_rol'].' / '.$fila['sucursal'].'</td>
<td>'.$fila['telefono'].'</td>
<td>'.$fila['email'].'</td>
<td>
<button class="btn btn-default" title="Detalles">
<span class="glyphicon glyphicon-list-alt"></span>
</button>
<button class="btn btn-warning" title="Actualizar">
<span class="glyphicon glyphicon-pencil"></span>
</button>
<button class="btn btn-danger" title="Eliminar">
<span class="glyphicon glyphicon-trash"></span>
</button>
</td></tr>';
}
echo'</table>';
 ?>
