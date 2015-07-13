<?php date_default_timezone_set("Mexico/General"); ?>
<!DOCTYPE html>
<html>
<head>

	<title>Restaurante</title>
	 <meta description="">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	 
   <script type="text/javascript" src="js/jquery/jquery.js"></script>
  <script type="text/javascript" src="js/jquery/jquery-ui.js"></script>
  <script type="text/javascript" src="js/responsiveslides.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/facebook.js"></script>
  <script type="text/javascript" src="js/code.js"></script>

  <link rel="shortcut icon" href="img/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/responsiveslides.css">
  <link rel="stylesheet" type="text/css" href="css/font.css">

</head>
<body>
<center>

<!-- Inicio de la barra de menú-->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#" onclick="">
      	SACYG
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav">
      	
        <li>
            <a href="#" onclick="cargarInicio();">
			         <span class="glyphicon glyphicon-home"></span> 
        	     Inicio
            </a>
        </li>
        <li>
            <a href="#" onclick="cargarPlatillos();">
               <span class="glyphicon glyphicon-cutlery"></span> 
               Platillos
               /
               <span class="glyphicon glyphicon-shopping-cart"></span>
               Pedido
            </a>
        </li>
        <li>
            <a href="#" onclick="cargarEstablecimientos();">
               <span class="glyphicon glyphicon-map-marker"></span> 
               Establecimientos
            </a>
        </li>
        <li>
            <a href="#" onclick="cargarContactanos();">
               <span class="glyphicon glyphicon-envelope"></span> 
               Contáctanos
            </a>
        </li>
        <li>
            <a href="#" onclick="cargarQuienes();">
               <span class="glyphicon glyphicon-eye-open"></span> 
               Quienes Somos
            </a>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="menu_item">
          <a href="#" id="login" >
          <img src="img/registra_facebook.png" height="20">
          Registrate para recibir menú del día
          </a>
       </li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- Fin de la barra de menú-->
<div id="contenedor_menu">
</div>
</center>
<center>
<script>
 // Cargando SDK asincrono de FACEBOOK
      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
</script>
<!--DIV Redes Sociales-->
     <div class="social">
        <ul>
            <li><a href="#" target="_blank" class="icon-facebook"></a></li>
            <li><a href="#" target="_blank" class="icon-twitter"></a></li>
            <li><a href="#" target="_blank" class="icon-youtube"></a></li>
        </ul>
    </div>
    <!--END Redes Sociales-->
<div id="div_banner1" >
<img src="img/logorestaurante1.png" style="width:100%;height:100%;">
</div> 
<br> 
<div id="contenedor_principal">

<div id="div_slides">
  
<ul class="rslides">
  <li><img src="img/slides/img1.jpg" alt=""></li>
  <li><img src="img/slides/img2.jpg" alt=""></li>
  <li><img src="img/slides/img3.jpg" alt=""></li>
</ul>

</div>
<div id="div_frase">
<img src="img/slogan.jpg" style="width:100%;height:100%;">
</div>


