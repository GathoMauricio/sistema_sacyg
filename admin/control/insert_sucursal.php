<?php include"../../control/conexion.php"; ?>

<?php 
header("X-XSS-Protection: 0");
$consulta= "INSERT INTO sucursal(sucursal,telefono, mapa, calle_numero, colonia, delegacion, cp) 
VALUES ('".$_POST['sucursal']."','".$_POST['telefono']."','".$_POST['mapa']."','".$_POST['calle_numero']."','".$_POST['colonia']."','".$_POST['delegacion']."','".$_POST['cp']."')";
mysqli_query($conexion,$consulta);
 echo $consulta;
 ?>
