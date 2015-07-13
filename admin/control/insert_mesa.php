<?php include"../../control/conexion.php"; ?>
<?php 
$consulta= "INSERT INTO mesa(id_sucursal, id_disponibilidad, numero_mesa, capacidad) 
VALUES (".$_POST['sucursal_mesa'].",1,".$_POST['numero_mesa'].",".$_POST['capacidad'].")";
mysqli_query($conexion,$consulta);
 echo $consulta;
 ?>