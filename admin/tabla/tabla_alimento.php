<?php include "../../control/conexion.php" ?>
<?php 
$consulta="SELECT * FROM alimento a LEFT JOIN tipo_alimento t 
ON a.id_tipo_alimento=t.id_tipo_alimento ORDER BY t.tipo_alimento";
$datos=mysqli_query($conexion,$consulta);

echo'<br>';
echo '<table class="table">';
echo '
<tr class="info">
<td>Tipo de alimento</td>
<td>Alimento</td>
<td>Descripción</td>
<td>Precio</td>
<td>Opciones</td>
</tr>';
while($fila=mysqli_fetch_array($datos))
{
echo '<tr class="active">
<td>'.$fila['tipo_alimento'].'</td>
<td>'.$fila['alimento'].'</td>
<td>'.$fila['descripcion'].'</td>
<td>$'.$fila['precio'].'</td>
<td>
<button class="btn btn-warning" id="'.$fila['id_alimento'].'" title="Actualizar" onclick="showUpdateAlimento(this.id);">
<span class="glyphicon glyphicon-pencil"></span>
</button>
<button class="btn btn-danger" title="Eliminar" id="'.$fila['id_alimento'].'" onclick="deleteAlimento(this.id);">
<span class="glyphicon glyphicon-trash"></span>
</button>
</td></tr>';
}
echo'</table>';
 ?>
