<?php include"../../control/conexion.php"; ?>
<?php 
$consulta= "INSERT INTO empleado(id_usuario, id_sucursal, nombre, ap_paterno, 
	ap_materno, fecha_nacimiento, telefono, email, calle_numero, colonia, municipio, cp) 
VALUES (".$_POST['empleado_usuario'].",
	".$_POST['empleado_sucursal'].",
	'".$_POST['nombre']."',
	'".$_POST['ap_paterno']."',
	'".$_POST['ap_materno']."',
	'".$_POST['fecha_nacimiento']."',
	'".$_POST['telefono']."',
	'".$_POST['email']."',
	'".$_POST['calle_numero']."',
	'".$_POST['colonia']."',
	'".$_POST['municipio']."',
	'".$_POST['cp']."'
	)";
mysqli_query($conexion,$consulta);
 ?>