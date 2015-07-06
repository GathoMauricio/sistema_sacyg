
<?php include"../../control/conexion.php"; ?>
<?php 
$consulta= "DELETE FROM sucursal WHERE id_sucursal=".$_POST['id_sucursal'];
mysqli_query($conexion,$consulta);
echo "Se elimino con exito";
 ?>