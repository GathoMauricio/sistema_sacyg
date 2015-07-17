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
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="../css/alert.css">
	<script type="text/javascript" src="../js/jquery/jquery.js"></script>
	<script type="text/javascript" src="../js/jquery/jquery-ui.js"></script>
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
		width: 100%;
		height: 65px;
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
		width: 100%;
		height: 450px;
		
	}
	</style>
</head>
<body>
<center>
<div id="cabecera" >
Bienvenido: <?php echo $_SESSION['empleado']; ?>
<a href="cerrar_sesion.php" style="float:right;">Cerrar sesion</a>
</div>


<div id="pestanas">
<ul>
	<li><a href="#p_sucursal">Sucursales</a></li>
	<li><a href="#p_mesas">Mesas</a></li>
	<li><a href="#p_empleados">Empleados</a></li>
	<li><a href="#p_alimentos">Alimentos</a></li>
	<li><a href="#p_categorias">Categorias</a></li>
</ul>

<div id="p_sucursal">

<div class="titulo" id="sucursal">Sucursales 
<button class="btn btn-default"style="float:right;" title="Agregar nuevo" onclick = "nuevaSucursal();"><span class="glyphicon glyphicon-plus" ></span></button>
</div>
<div id="tabla_sucursal" class="tabla"></div>
<hr>

</div>
<div id="p_mesas">

<div class="titulo" id="mesa">Mesas 
<button class="btn btn-default"style="float:right;" title="Agregar nuevo" onclick="showNuevaMesa();"><span class="glyphicon glyphicon-plus" ></span></button>
</div>
<div id="tabla_mesa" class="tabla"></div>
<hr>
</div>
<div id="p_empleados">

<div class="titulo" id="empleado">Empleados 
<button class="btn btn-default"style="float:right;" title="Agregar nuevo" onclick="nuevoEmpleado();"><span class="glyphicon glyphicon-plus" ></span></button>
</div>
<div id="tabla_empleado" class="tabla"></div>
<hr>
<<<<<<< HEAD
<center><a href="#cabecera">
	Ir al inicio
	<span class="glyphicon glyphicon-hand-up"></span>
</a></center>
<div class="titulo" id="alimento">Alimento 
<button class="btn btn-default"style="float:right;" title="Agregar nuevo" onclick="nuevoAlimento();"><span class="glyphicon glyphicon-plus" ></span></button>
=======
</div>
<div id="p_alimentos">
<center>

<div class="titulo" id="alimento">Alimentos
<button class="btn btn-default"style="float:right;" title="Agregar nuevo" onclick="nuevoAlimento();">
<span class="glyphicon glyphicon-plus" ></span>
</button>
>>>>>>> origin/master
</div>
<div id="tabla_alimento" class="tabla"></div>
<hr>
</div>

<div id="p_categorias">


<div class="titulo" id="alimento">Categorias 
<button class="btn btn-default"style="float:right;" title="Agregar nuevo" onclick="nuevaCategoria();">
	<span class="glyphicon glyphicon-plus" ></span>
</button>
</div>
<div id="tabla_categoria" class="tabla"></div>
</center>

</div>
</div>
<br>
<center>
<label>SACYG <span class="glyphicon glyphicon-copyright-mark"></span> 2015</label>
</center>

<?php include "modal/nueva_mesa.php"; ?>
<?php include "modal/nueva_sucursal.php"; ?>
<?php include "modal/nuevo_empleado.php"; ?>
<?php include "modal/nuevo_alimento.php"; ?>
<?php include "modal/nueva_categoria.php"; ?>

<?php include "modal/modificar_sucursal.php"; ?>
<?php include "modal/modificar_alimento.php"; ?>
</body>
</html>