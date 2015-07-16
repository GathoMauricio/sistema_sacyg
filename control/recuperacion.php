<?php include "conexion.php" ?>
<?php 

$consulta="SELECT * FROM cliente WHERE email='".$_POST['email']."'";
$datos=mysqli_query($conexion,$consulta);
if($fila=mysqli_fetch_array($datos))
{
	session_start();
	$_SESSION['id_cliente']=$fila['id_cliente'];
	require_once 'mail/lib/swift_required.php';

$transport = Swift_SmtpTransport::newInstance('mail.sacygrestaurantes.com', 587)
->setUsername('contacto@sacygrestaurantes.com')
->setPassword('contacto');
		    
$mailer = Swift_Mailer::newInstance($transport);
$message = Swift_Message::newInstance("Recuperacion de cuenta SACYG")
->setFrom(array('contacto@sacygrestaurantes.com' => 'Recuperacion de cuenta SACYG'))
->setTo(array($fila['email'] => "Cliente"))
->setBody("Ingresa al siguiente enlace para continuar con la recuperacion de tu cuenta http://sacygrestaurantes.com/recuperacion.php ");
$mailer->send($message);
echo "Revisa tu bandeja de entrada para continuar con el proceso";
}else
{
	echo "El e-mail ingresado no existe en nuestros registros.";
}
 ?>