<?php include"../../control/conexion.php"; ?>
<?php 
$consulta= "DELETE FROM mesa WHERE id_mesa=".$_POST['id_mesa'];
mysqli_query($conexion,$consulta);
echo "Se elimino con exito";
 ?>