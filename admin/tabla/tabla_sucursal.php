<?php include "../../control/conexion.php" ?>
<?php 
$consulta="SELECT * FROM sucursal";
$datos=mysqli_query($conexion,$consulta);

echo'<br>';
echo '<table class="table">';
echo '<tr class="info">
<td>Sucursal</td>
<td>Teléfono</td>
<td>Dirección</td>
<td>Opciones</td></tr>';
while($fila=mysqli_fetch_array($datos))
{
echo '<tr class="active">
<td>'.$fila['sucursal'].'</td>
<td>'.$fila['telefono'].'</td>
<td>'.$fila['calle_numero'].' '.$fila['colonia'].' '.$fila['delegacion'].' '.$fila['cp'].'</td>
<td>
<button class="btn btn-default" title="Detalles">
<span class="glyphicon glyphicon-list-alt"></span>
</button>
<button class="btn btn-warning" title="Actualizar">
<span class="glyphicon glyphicon-pencil"></span>
</button>
<button class="btn btn-danger" id ="'.$fila['id_sucursal'].'" onclick="deleteSucursal(this.id)" title="Eliminar">
<span class="glyphicon glyphicon-trash"></span>
</button>
</td></tr>';
}
echo'</table>';
 ?>