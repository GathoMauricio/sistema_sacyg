<?php session_start() ?>
<?php include "../control/conexion.php" ?>

<?php 
if(!isset($_SESSION['administrador']))
{
	header("Location: index.php");
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Administración</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/alert.css">
	<script type="text/javascript" src="../js/jquery/jquery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/alert.js"></script>
	<script type="text/javascript" src="codigo.js"></script>
	<style type="text/css">
	body
	{
		background: url(../img/fondo_restaurante.png);
	}
	#cabecera
	{
		width: 100%;
		height: auto;
		padding: 10px;
		background-color: #000;
		-webkit-border-top-left-radius: 10px;
		-webkit-border-top-right-radius: 10px;
		-moz-border-radius-topleft: 10px;
		-moz-border-radius-topright: 10px;
		border-top-left-radius: 10px;
		border-top-right-radius: 10px;
		color: #fff;
		font-size: 20px;
		text-align: left;
		border-bottom: solid 5px #58ACFA;
		
	}
	.titulo
	{
		width: 90%;
		height: auto;
		padding: 10px;
		background-color: #000;
		-webkit-border-top-left-radius: 10px;
		-webkit-border-top-right-radius: 10px;
		-moz-border-radius-topleft: 10px;
		-moz-border-radius-topright: 10px;
		border-top-left-radius: 10px;
		border-top-right-radius: 10px;
		color: #fff;
		font-size: 20px;
		border-bottom: solid 5px #58ACFA;
	}
	.tabla
	{
		width: 90%;
		height: 200px;
		overflow: scroll;
	}
	</style>
</head>
<body>
<center>
<div id="cabecera" >
Bienvenido: <?php echo $_SESSION['empleado']; ?>
<a href="cerrar_sesion.php" style="float:right;">Cerrar sesion</a>
</div>

<center><a href="#cabecera">
	Ir al inicio
	<span class="glyphicon glyphicon-hand-up"></span>
</a></center>
<div class="titulo" id="sucursal">Sucursal 
<button class="btn btn-default"style="float:right;" title="Agregar nuevo" onclick = "nuevaSucursal();"><span class="glyphicon glyphicon-plus" ></span></button>
</div>
<div id="tabla_sucursal" class="tabla"></div>
<hr>
<center><a href="#cabecera">
	Ir al inicio
	<span class="glyphicon glyphicon-hand-up"></span>
</a></center>
<div class="titulo" id="mesa">Mesa 
<button class="btn btn-default"style="float:right;" title="Agregar nuevo" onclick="showNuevaMesa();"><span class="glyphicon glyphicon-plus" ></span></button>
</div>
<div id="tabla_mesa" class="tabla"></div>
<hr>
<center><a href="#cabecera">
	Ir al inicio
	<span class="glyphicon glyphicon-hand-up"></span>
</a></center>
<div class="titulo" id="empleado">Empleado 
<button class="btn btn-default"style="float:right;" title="Agregar nuevo" onclick="nuevoEmpleado();"><span class="glyphicon glyphicon-plus" ></span></button>
</div>
<div id="tabla_empleado" class="tabla"></div>
<hr>
<center>
<a href="#cabecera">
	Ir al inicio
<span class="glyphicon glyphicon-hand-up"></span>
</a>
</center>
<div class="titulo" id="alimento">Alimento 
<button class="btn btn-default"style="float:right;" title="Agregar nuevo" onclick="nuevoAlimento();">
<span class="glyphicon glyphicon-plus" ></span>
</button>
</div>
<div id="tabla_alimento" class="tabla"></div>

<hr>
<center>
<a href="#cabecera">
	Ir al inicio
<span class="glyphicon glyphicon-hand-up"></span>
</a>
</center>
<div class="titulo" id="alimento">Categoria 
<button class="btn btn-default"style="float:right;" title="Agregar nuevo" onclick="nuevaCategoria();">
	<span class="glyphicon glyphicon-plus" ></span>
</button>
</div>
<div id="tabla_categoria" class="tabla"></div>
</center>

<br><br> 

<center>
<label>SACYG <span class="glyphicon glyphicon-copyright-mark"></span> 2015</label>
</center>

<br><br>

<?php include "modal/nueva_mesa.php"; ?>
<?php include "modal/nueva_sucursal.php"; ?>
<?php include "modal/nuevo_empleado.php"; ?>
<?php include "modal/nuevo_alimento.php"; ?>
<?php include "modal/nueva_categoria.php"; ?>

<?php include "modal/modificar_sucursal.php"; ?>
<?php include "modal/modificar_alimento.php"; ?>
</body>
</html>