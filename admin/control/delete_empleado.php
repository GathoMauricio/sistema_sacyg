<?php include"../../control/conexion.php"; ?>
<?php 
$consulta= "DELETE FROM empleado WHERE id_empleado=".$_POST['id_empleado'];
mysqli_query($conexion,$consulta);
echo "Se elimino con exito";
 ?>