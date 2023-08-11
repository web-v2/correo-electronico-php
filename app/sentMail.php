<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
date_default_timezone_set('America/Bogota');

require 'plugins/PHPMailer/src/Exception.php';
require 'plugins/PHPMailer/src/PHPMailer.php';
require 'plugins/PHPMailer/src/SMTP.php';

function sent_mail($addres,$cc,$suj,$data){
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0; //0=debugging Off, 1=errors and messages, 2=messages only - Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'aquivatucorreogmail';        // SMTP username
        $mail->Password   = 'aquivatupasswordtwofactor';                   // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->CharSet    = 'UTF-8';
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );

        //Recipients
        $mail->setFrom('correo de recepcion', 'Nombre en corto');
        $mail->addAddress($addres, $suj);     // Add a recipient
        //$mail->addCC($cc);
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $suj;
        $mail->Body    = $data;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

         if(!$mail->send()){
			    echo $agregado = "Pronto nos comunicremos contigo.";
	      }
        //echo 'Message has been sent';
        return 'OK';
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}".$e->getMessage();
    }
}

?>
