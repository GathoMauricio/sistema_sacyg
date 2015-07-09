<?php include"../../control/conexion.php"; ?>
<?php 
$consulta= "INSERT INTO mesa(mesa) VALUES ('".$_POST['numero_mesa']."')";
mysqli_query($conexion,$consulta);
 ?>