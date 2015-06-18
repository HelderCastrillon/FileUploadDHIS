<?php
// repository 
$to  = $_POST['to']; 
// tittle
$subject = $_POST['subject'];
// body of the message
$message = $_POST['message'];
require_once('../PHPMailer/class.phpmailer.php');
$mail = new PHPMailer();
//indico a la clase que use SMTP
$mail­>IsSMTP();
//permite modo debug para ver mensajes de las cosas que van ocurriendo
$mail­>SMTPDebug = 2;
//Debo de hacer autenticación SMTP
$mail­>SMTPAuth = true;
$mail­>SMTPSecure = "ssl";
//indico el servidor de Gmail para SMTP
$mail­>Host = "smtp.gmail.com";
//indico el puerto que usa Gmail
$mail­>Port = 465;
//indico un usuario / clave de un usuario de gmail
$mail­>Username = "sistemas@saludcauca.gov.co";
$mail­>Password = "Sistemas5126";
$mail­>SetFrom('sistemas@saludcauca.gov.co', 'Oficina de Sistemas');
$mail­>Subject = $subject ;
$mail­>MsgHTML($message);
//indico destinatario
$address = $to;
$mail­>AddAddress($address, "Supervisor");
if(!$mail­>Send()) {
echo "Error al enviar: " . $mail­>ErrorInfo;
} else {
echo "Mensaje enviado!";
}