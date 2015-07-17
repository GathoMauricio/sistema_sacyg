<?php include"../../control/conexion.php"; ?>
<?php 
$consulta= "DELETE FROM alimento WHERE id_alimento=".$_POST['id'];
mysqli_query($conexion,$consulta);
 ?>