<?php session_start(); ?>
<?php 
if(!isset($_SESSION['id_cliente']))
{
	header("Location: index.php");
}
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Recuperacion de contraseña</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery/jquery.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.js"></script>
	<style type="text/css">
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
		border-bottom: solid 5px #58ACFA;
		
	}
	#administracion
	{
		width: 40%;
		padding: 10px;
		border:solid 2px #000;
		border-radius: 10px;
	}
	#login
	{
		width: 90%;
		padding: 10px;
		border: solid 2px #000;
		border-radius: 10px;
		background-color: #E6E6E6;
	}
	</style>
	<script type="text/javascript">
	
	function recuperar()
	{
		$("#img_login").prop("src","img/load.gif")
		var contrasena = $("#txt_contrasena_recuperacion").prop("value");
		var recontrasena = $("#txt_recontrasena_recuperacion").prop("value");
		
		if(contrasena.length<=0 || recontrasena.length<=0)
		{
			alert("Por favor llena ambos campos");
		}else
		{
			if(contrasena!=recontrasena)
			{
				alert("Atencion!!! Las contraseñas no coinciden ");
			}else
			{
				$.post("control/actualizar_contrasena.php",{
					contrasena:contrasena
				},function(data){
					window.location="index.php?recuperacion=true";
				});
			}
		}

		
		
	}
	</script>
</head>
<body>
<div id="cabecera">
Control de contraseña SACYG
</div>
<br><br>
<center>
<div id="administracion">
	<h6></h6>
<h3 style="color:#58ACFA;">Recuperacion de cuenta</h3>
Ingresa tu nueva contraseña:

<div class="form" id="login">
<label>Contraseña</label>
<input type="password" class="form-control" id="txt_contrasena_recuperacion">
<label>Confirma Contraseña</label>
<input type="password" class="form-control" id="txt_recontrasena_recuperacion">
<br>
<img src="admin/login.png" style="width:60px;float:left;" id="img_login">
<br>
<button class="btn btn-info" style="float:right;" onclick="recuperar();">Cambiar mi contraseña</button>
<br><br><br>
</div>
</div>
</center>
</body>
</html>