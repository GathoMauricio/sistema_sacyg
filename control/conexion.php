<?php 
/*$usuario_bd="sac099_root";
$contrasena_bd="hannibal2769";
$host_bd="localhost";
$base_de_datos="sac099_sacyg";*/
$usuario_bd="root";
$contrasena_bd="";
$host_bd="localhost";
$base_de_datos="sacyg";
$conexion=mysqli_connect($host_bd,$usuario_bd,$contrasena_bd,$base_de_datos);
mysqli_set_charset($conexion, "utf8");
?>