<?php
// repository 
$to  = $_POST['to']; 
$toName  = $_POST['toName'];
$fromName  = $_POST['fromName'];  
// tittle
$subject = $_POST['subject'];
// body of the message
$message = $_POST['message'];
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require 'PHPMailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "sistemas@saludcauca.gov.co";

//Password to use for SMTP authentication
$mail->Password = "Sistemas5126";

//Set who the message is to be sent from
$mail->setFrom('no-reply@saludcauca.gov.co', $fromName);

//Set who the message is to be sent to
$mail->addAddress($to, $toName);

//Set the subject line
$mail->Subject = $subject;

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($message);

//Replace the plain text body with one created manually
$mail->AltBody = 'Sistema de correos de Secretaría Departamental de Salud';



//send the message, check for errors
if (!$mail->send()) {
    echo '{"user":"'.$to.'",'
		. '"status":"error",'
		. '"description":"'.$mail­>ErrorInfo.'"}';
} else {
    echo '{"user":"'.$to.'",'
		. '"status":"success",'
		. '"description":"success"}';
}
