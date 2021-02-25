<?php 

$para = "heycleanmx@hotmail.com , luisjavier004@hotmail.com";

$asunto = "Mensaje desde web";

$mailheader  = 'MIME-Version: 1.0' . "\r\n";
$mailheader .= "Content-type: text/html; charset-utf-8\r\n";
$mailheader .= "From: ".$_POST["correo"]."\r\n";
$mailheader .= "Reply-To: ".$_POST["correo"]."\r\n";


$MESSAGE_BODY = "Nombre: ".$_POST["nombre"]."\n";
$MESSAGE_BODY .= "\n<br>Email: ".$_POST["correo"]."\n";
$MESSAGE_BODY .= "\n<br>Telefono: ".$_POST["telefono"]."\n";
$MESSAGE_BODY .= "\n<br>Mensaje: ".nl2br($_POST["mensaje"])."\n";
$MESSAGE_BODY .= "\n<br><br>Hora de Envio: ".date("h:i:sa")."\n";
$MESSAGE_BODY .= "\n<br>Fecha de Envio: ".date("Y-m-d")."\n";

mail($para, $asunto, $MESSAGE_BODY, $mailheader) or die("Error al enviar email");

header('Location: index.php');

?>