<?php include "../control/conexion.php" ?>
<?php 
$consulta="SELECT * FROM tipo_alimento";
$datos=mysqli_query($conexion,$consulta);
?>
<div id="catalogo_alimentos">
	<center><h2>Menú</h2></center>
	
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
<center>

	<h2>Arrastra aquí tu orden</h2>
	<div class="form-inline">
		<label>Reservación</label>
		<input type="Radio" class="form-control" name="tipo_servicio" id="rb_reservacion" onclick="tipoServicio(1);" checked>
		<label>Servicio a domicilio</label>
		<input type="Radio" class="form-control" name="tipo_servicio" id="rb_domicilio" onclick="tipoServicio(2);">
	</div>
	<div class="form" id="div_reservacion" style="float:right;text-align:left">

		<label>Fecha</label><br>
		<input type="date" class="form-control"><br>
		<label>N° de personas</label><br>
		<input type="number"  min="1" max="10" class="form-control" value="1"><br>
		<label>Hora</label><br>
		<input type="time" class="form-control"><br>
	</div>
	<div class="form-inline" id="div_domicilio" hidden>DOMICILIO</div>
</center>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="carrito">
	
	<input type="hidden" name="cmd" value="_cart">
	<input type="hidden" name="upload" value="1">
	<input type="hidden" name="business" value="mauricio2769@gmail.com">
	<input type="hidden" name="currency_code" value="MXN">
	<input type="hidden" name="return" value="http://pagina de retorno">
	<div id="div_lista"></div>
	<center>
		<input type="image" src="http://www.paypal.com/es_XC/i/btn/x-click-but01.gif" name="submit" alt="Make payments with PayPal - it's fast, free and secure!" onclick="generarPedido();">
		<br>
		<label id="lbl_total">Total: $0.00</label>
	</center>
</form>
</div>