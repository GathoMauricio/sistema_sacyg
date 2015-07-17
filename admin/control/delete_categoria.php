<?php include"../../control/conexion.php"; ?>
<?php 
$consulta= "DELETE FROM tipo_alimento WHERE id_tipo_alimento=".$_POST['id'];
mysqli_query($conexion,$consulta);
 ?>