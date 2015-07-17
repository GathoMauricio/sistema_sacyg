<?php include "conexion.php" ?>
<?php 
if(isset($_GET['c']))
{
	$consulta="SELECT * FROM cliente WHERE codigo_activacion='".$_GET['c']."'";
	$datos=mysqli_query($conexion,$consulta);
	if($fila=mysqli_fetch_array($datos))
	{
		$consulta="UPDATE cliente SET estatus_activo=1 WHERE id_cliente=".$fila['id_cliente'];
		mysqli_query($conexion,$consulta);
		header("Location: ../index.php?activacion=true");
	}
}
 ?>