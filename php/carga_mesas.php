<?php include "../control/conexion.php"; ?>
<?php 
$consulta="SELECT * FROM mesa WHERE id_sucursal=".$_POST['id_sucursal']." AND id_disponibilidad=1";
$datos=mysqli_query($conexion,$consulta);
while($fila=mysqli_fetch_array($datos))
{
	echo '<option value="'.$fila['id_mesa'].'">Mesa '.$fila['id_mesa'].' - Capacidad '.$fila['capacidad'].' Personas</option>';
}
 ?>