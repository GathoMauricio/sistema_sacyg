<?php include "../control/conexion.php" ?>
<?php 
$consulta="SELECT * FROM sucursal ";
$datos=mysqli_query($conexion,$consulta);
while($fila=mysqli_fetch_array($datos))
{
echo'
<div id="contenedor_establecimientos">
<h3 style="color:white">'.$fila['sucursal'].'</h3>
<h4 style="color:white">Telefono: '.$fila['telefono'].'</h4>
<h5 style="color:white">Calle '.$fila['calle_numero'].' Col: '.$fila['colonia'].' Del. '.$fila['delegacion'].' C.P: '.$fila['cp'].'</h5>
'.$fila['mapa'].'
</div>
<br>
';
}
 ?>

