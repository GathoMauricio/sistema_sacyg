<?php session_start() ?>
<?php include "conexion.php"; ?>
<?php 
$consulta="UPDATE cliente 
set contrasena='".md5($_POST['contrasena'])."' 
WHERE id_cliente=".$_SESSION['id_cliente'];
mysqli_query($conexion,$consulta);
session_destroy();
 ?>