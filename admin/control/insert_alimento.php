<?php include"../../control/conexion.php"; ?>
<?php 
$consulta= "INSERT INTO alimento
(
	id_tipo_alimento,
	alimento,
	descripcion,
	precio
) 
VALUES
(
	".$_POST['tipo_alimento'].",
	'".$_POST['alimento']."',
	'".$_POST['descripcion']."',
	".$_POST['precio']."
)";
mysqli_query($conexion,$consulta);
echo "Elregistro se ha insertado con exito";
 ?>