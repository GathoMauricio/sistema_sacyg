<?php include"../../control/conexion.php"; ?>

<?php 
header("X-XSS-Protection: 0");
$consulta= "UPDATE mesa
SET 
id_sucursal=	".$_POST['id_sucursal'].",
id_disponibilidad=	".$_POST['id_disponibilidad'].",
numero_mesa=	".$_POST['numero_mesa'].",
capacidad=	".$_POST['capacidad']."
WHERE id_mesa=".$_POST['id_mesa'];
mysqli_query($conexion,$consulta);

 ?>