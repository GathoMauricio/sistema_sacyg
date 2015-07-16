<?php include "../../control/conexion.php" ?>
<?php 
$consulta="SELECT * FROM tipo_alimento";
$datos=mysqli_query($conexion,$consulta);

echo'<br>';
echo '<table class="table">';
echo '
<tr class="info">
<td>Tipo de alimento</td>
<td>Opciones</td>
</tr>';
while($fila=mysqli_fetch_array($datos))
{
echo '<tr class="active">
<td>'.$fila['tipo_alimento'].'</td>
<td>
<button class="btn btn-danger" id ="'.$fila['id_tipo_alimento'].'" onclick="deleteCategoria(this.id)" title="Eliminar">
<span class="glyphicon glyphicon-trash"></span>
</button>
</td></tr>';
}
echo'</table>';
 ?>
