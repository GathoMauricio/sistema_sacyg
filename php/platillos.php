<?php include "../control/conexion.php" ?>
<?php session_start() ?>
<?php 
$consulta="SELECT * FROM tipo_alimento";
$datos=mysqli_query($conexion,$consulta);
?>
<div id="catalogo_alimentos">
	<center><h2 style="color:white">Menú</h2></center>
	
<div id="accordion">
  <?php 
  //Listando tipos de alimento
  while($fila=mysqli_fetch_array($datos))
  {
  	echo'<h3>'.$fila['tipo_alimento'].'</h3>';
  	echo'<div>';
  	$consulta2="SELECT * FROM alimento WHERE id_tipo_alimento=".$fila['id_tipo_alimento'];
  	$datos2=mysqli_query($conexion,$consulta2);
  	echo'<ul class="ui-menu">';
  	//Listando alimentos a partir de su respectivo tipo
  	while($fila2=mysqli_fetch_array($datos2))
  	{
  		echo '<li class="mueve" id="'.$fila2['id_alimento'].'"  style="cursor: move;border:solid yellow 1px;border-radius:5px;padding:5px;" title="'.$fila2['descripcion'].'">
  		'.$fila2['alimento'].' 
  		<span class="glyphicon glyphicon-usd" style="float: right;">
  		'.$fila2['precio'].'
  		</span>
  		</li>';
  	}
  	echo'</ul>';
  	echo'</div>';
  }
 
   ?>
  
</div>
</div>

<div id="div_orden">

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="carrito">
<center>

	<h2>Arrastra aquí tu orden</h2>
	<?php 
	if(isset($_SESSION['id_cliente']))
	{
		echo '
		<p class="bg-primary" style="width:70%">Bienvenid@ '.$_SESSION['nombre'].'</p>
		<input type="image" src="http://www.paypal.com/es_XC/i/btn/x-click-but01.gif" name="submit" alt="Make payments with PayPal - its fast, free and secure!" onclick="generarPedido();">
		';
	}else
	{
		echo '
		<p class="bg-danger" style="width:70%">Por favor 
		<a href="#" onclick="showLogin();">inicia sesion</a> o 
		<a href="#">registrate</a> 
		antes de comenzar</p>
		';
	}

	 ?>
	
	<br>
	<label id="lbl_total">Total: $0.00</label>
	
	<div class="form-inline">
		<label>Reservación</label>
		<input type="Radio" class="form-control" name="tipo_servicio" id="rb_reservacion" onclick="tipoServicio(1);" required>
		<label>Servicio a domicilio</label>
		<input type="Radio" class="form-control" name="tipo_servicio" id="rb_domicilio" onclick="tipoServicio(2);" required>
	</div>

	<div class="form" id="div_tipo_servicio"></div>

	


</center>


	
	<input type="hidden" name="cmd" value="_cart">
	<input type="hidden" name="upload" value="1">
	<input type="hidden" name="business" value="mauricio2769@gmail.com">
	<input type="hidden" name="currency_code" value="MXN">
	<input type="hidden" name="return" value="http://pagina de retorno">
	<div id="div_lista"></div>
</form>
</div>

<?php include "modal_login.php" ?>