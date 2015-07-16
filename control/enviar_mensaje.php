<?php 

require_once 'mail/lib/swift_required.php';

$transport = Swift_SmtpTransport::newInstance('mail.sacygrestaurantes.com', 587)
->setUsername('contacto@sacygrestaurantes.com')
->setPassword('contacto');
		    
$mailer = Swift_Mailer::newInstance($transport);
$message = Swift_Message::newInstance("Mensaje de SACYG")
->setFrom(array('contacto@sacygrestaurantes.com' => 'Mensaje de SACYG'))
->setTo(array("mauricio2769@gmail.com" => "Administrador"))
->setBody("Mensaje de: ".$_POST['email']."\n".$_POST['asunto']."\n".$_POST['mensaje']);
$mailer->send($message);
echo "TU MENSAJE HA SIDO ENVIADO!!!";
 ?>