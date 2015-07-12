<?php session_start(); ?>
<?php include "conexion.php"; ?>
<?php 
	$usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
	$contrasena=filter_var($_POST['contrasena'], FILTER_SANITIZE_STRING);
	$consulta="SELECT * FROM cliente 
	WHERE usuario='".$usuario."' AND contrasena='".md5($contrasena)."' AND estatus_activo=1";
	$datos=mysqli_query($conexion,$consulta);

	if($fila=mysqli_fetch_array($datos))
	{
		
		$_SESSION['id_cliente']=$fila['id_cliente'];
		$_SESSION['nombre']=$fila['nombre'];
		echo true;
	}else
	{
		echo false;
	}
	
 ?>