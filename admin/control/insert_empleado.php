<?php include"../../control/conexion.php"; ?>
<?php 
$consulta= "INSERT INTO empleado(empleado) VALUES ('".$_POST['nombre']."')";
mysqli_query($conexion,$consulta);
 ?>