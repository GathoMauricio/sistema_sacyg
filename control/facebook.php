<?php include "conexion.php" ?>
<?php 
$consulta="SELECT * FROM facebook WHERE nombre='".$_POST['nombre']."'";
$datos=mysqli_query($conexion,$consulta);
if($fila=mysqli_fetch_array($datos))
{
	
}else
{
	$consulta="INSERT INTO facebook(nombre) VALUES ('".$_POST['nombre']."')";
	mysqli_query($conexion,$consulta);
}
 ?>