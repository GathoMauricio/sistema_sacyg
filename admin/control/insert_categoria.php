<?php include"../../control/conexion.php"; ?>
<?php 
$consulta= "INSERT INTO tipo_alimento (tipo_alimento) VALUES ('".$_POST['categoria']."')";
mysqli_query($conexion,$consulta);
echo "Elregistro se ha insertado con exito";
 ?>