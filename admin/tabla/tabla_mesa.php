<?php include "../../control/conexion.php" ?>
<?php 
$consulta="SELECT * 
FROM mesa m
LEFT JOIN sucursal s ON m.id_sucursal = s.id_sucursal
LEFT JOIN disponibilidad d ON m.id_disponibilidad = d.id_disponibilidad
ORDER BY m.id_sucursal, m.numero_mesa, m.id_disponibilidad";
$datos=mysqli_query($conexion,$consulta);

echo'<br>';
echo '<table class="table">';
echo '
<tr class="info">
<td>N° de Mesa</td>
<td>Sucursal</td>
<td>Capacidad</td>
<td>Estatus</td>
<td>Opciones</td>
</tr>';
while($fila=mysqli_fetch_array($datos))
{
echo '<tr class="active">
<td>'.$fila['numero_mesa'].'</td>
<td>'.$fila['sucursal'].'</td>
<td>'.$fila['capacidad'].'</td>
<td>'.$fila['estatus'].'</td>
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
