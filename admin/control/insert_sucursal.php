<?php include"../../control/conexion.php"; ?>
<?php 
$consulta= "INSERT INTO sucursal(sucursal) VALUES ('".$_POST['nombre']."')";
mysqli_query($conexion,$consulta);
 ?>