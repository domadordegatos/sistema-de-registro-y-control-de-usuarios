<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './phpmailer/Exception.php';
require './phpmailer/PHPMailer.php';
require './phpmailer/SMTP.php';

$mail = new PHPMailer(true);
$correo=$_POST['form1'];
$id=$_POST['form2'];
try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'tesis.archivos.unisangil@gmail.com';                     // SMTP username
    $mail->Password   = 'mueblerojo2';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients

    $mail->setFrom('tesis.archivos.unisangil@gmail.com', 'R&C-UNISANGIL');
    $mail->addAddress($correo);     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'ARCHIVO REPORTE';
    // $mail->Body    = 'El presente registro contiene información clasificada que solo podra ser usada
    // para la entrega de informes de usuarios administrativos, analisis estatidisico para la mejora
    // de los entornos, seguimiento a usuarios especificos con el fin de detallar robos, daños u otras
    // circunstancias. Tambien esta sujeta a todos los derechos de privacidad y tratamiento de la información
    // de Unisangil.';
    $mail->Body = file_get_contents("http://localhost/tesis/interfaces/vista_reporte_pdf.php?id_report=".$id);


    $mail->send();
    // echo 'EL MENSAJE SE ENVIO';
    echo 1;
} catch (Exception $e) {
    echo 2;
    // echo "ERROR AL ENVIAR : {$mail->ErrorInfo}";
}
?>
