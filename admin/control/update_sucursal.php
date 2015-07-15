<?php include"../../control/conexion.php"; ?>

<?php 
header("X-XSS-Protection: 0");
$consulta= "UPDATE sucursal 
SET 
sucursal=	'".$_POST['sucursal']."',
telefono=	'".$_POST['telefono']."',
calle_numero=	'".$_POST['calle_numero']."',
colonia=	'".$_POST['colonia']."',
delegacion=	'".$_POST['delegacion']."',
cp=	'".$_POST['cp']."' 
WHERE id_sucursal=".$_POST['id_sucursal'];
mysqli_query($conexion,$consulta);
echo $consulta;
 ?>
