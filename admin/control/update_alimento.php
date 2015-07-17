<?php include"../../control/conexion.php"; ?>

<?php 
header("X-XSS-Protection: 0");
$consulta= "UPDATE alimento 
SET 
id_tipo_alimento=	".$_POST['tipo_alimento'].",
alimento=	'".$_POST['alimento']."',
descripcion=	'".$_POST['descripcion']."',
precio=	".$_POST['precio']."

WHERE id_alimento=".$_POST['id_alimento'];
mysqli_query($conexion,$consulta);

 ?>