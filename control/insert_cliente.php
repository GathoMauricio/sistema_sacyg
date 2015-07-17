<?php include "conexion.php" ?>
<?php 
//sanitizando variables para quitar caracteres especiales
$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
$telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'],  FILTER_SANITIZE_EMAIL);
$rfc = filter_var($_POST['rfc'], FILTER_SANITIZE_STRING);
$calle_numero = filter_var($_POST['calle_numero'], FILTER_SANITIZE_STRING);
$colonia = filter_var($_POST['colonia'], FILTER_SANITIZE_STRING);
$municipio = filter_var($_POST['municipio'], FILTER_SANITIZE_STRING);
$cp = filter_var($_POST['cp'], FILTER_SANITIZE_STRING);
$contrasena = filter_var($_POST['contrasena'], FILTER_SANITIZE_STRING);
$codigo = date('YdmHms');

$consulta="INSERT INTO cliente 
(nombre,telefono,email,rfc_cliente,calle_numero,colonia,municipio,cp,contrasena,codigo_activacion) VALUES 
(
'".$nombre."',
'".$telefono."',
'".$email."',
'".$rfc."',
'".$calle_numero."',
'".$colonia."',
'".$municipio."',
'".$cp."',
'".md5($contrasena)."',
'".$codigo."'
)";
mysqli_query($conexion,$consulta);
require_once 'mail/lib/swift_required.php';

$transport = Swift_SmtpTransport::newInstance('mail.sacygrestaurantes.com', 587)
->setUsername('contacto@sacygrestaurantes.com')
->setPassword('contacto');
		    
$mailer = Swift_Mailer::newInstance($transport);
$message = Swift_Message::newInstance("Activacion de cuenta SACYG")
->setFrom(array('contacto@sacygrestaurantes.com' => 'Activacion de cuenta SACYG'))
->setTo(array($email => $nombre))
->setBody("Para activar tu cuenta SACYG da click sobre el siguiente enlace http://sacygrestaurantes.com/control/activacion.php?c=".$codigo);
$mailer->send($message);
echo "Te hemos enviado un email para validar tu cuenta\nEn caso de no encontrarlo, revisa tu bandeja de correo no deseado o SPAM";
?>