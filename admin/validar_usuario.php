
<?php session_start(); ?>
<?php include "../control/conexion.php"; ?>
<?php 
	$consulta="SELECT * FROM empleado e LEFT JOIN usuario u 
	ON  e.id_usuario=u.id_usuario 
	WHERE 
	usuario='".md5($_POST['usuario'])."' AND 
	contrasena='".md5($_POST['contrasena'])."' AND 
	id_rol=1";
	$datos=mysqli_query($conexion,$consulta);

	while($fila=mysqli_fetch_array($datos))
	{
		$_SESSION['administrador']=$fila['id_usuario'];
		$_SESSION['empleado']=$fila['nombre']." ".$fila['ap_paterno']." ".$fila['ap_materno'];
		echo true;
	}
	
 ?>