<!DOCTYPE html>
<html>
<head>
	<title>Iniciar sesión</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<script type="text/javascript" src="../js/jquery/jquery.js"></script>
	<script type="text/javascript" src="../js/jquery/jquery-ui.js"></script>
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
	$(document).ready(function(){

	});
	function validarAcceso()
	{
		$("#img_login").prop("src","load.gif")
		var usuario = $("#txt_usuario_login").prop("value");
		var contrasena = $("#txt_contrasena_login").prop("value");

		$.post('validar_usuario.php',{usuario:usuario,contrasena:contrasena},function(data){
			if(data>=1)
			{
				window.location = "admin.php";
				$("#img_login").prop("src","login.png");
			}else
			{
				$("#login").effect( "shake" );
				$("#img_login").prop("src","login.png");
			}
		});
		
	}
	</script>
</head>
<body>
<div id="cabecera">
Administración
</div>
<br><br>
<center>
<div id="administracion">
	<h6></h6>
<h3 style="color:#58ACFA;">Administración de SACYG</h3>
Usar un nombre de usuario y contraseña válido para poder tener acceso a la Administración..
<br>
<a href="../index.php">Ir a la página principal del sitio</a>
<br>
<div class="form" id="login">
<label>Nombre de usuario</label>
<input type="text" class="form-control" id="txt_usuario_login">
<label>Contraseña</label>
<input type="password" class="form-control" id="txt_contrasena_login">
<br>
<img src="login.png" style="width:60px;float:left;" id="img_login">
<br>
<button class="btn btn-info" style="float:right;" onclick="validarAcceso();">Acceso</button>
<br><br><br>
</div>
</div>
</center>
</body>
</html>