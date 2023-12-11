<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email=$_POST['email'];
    $formCode=$_POST['formCode'];

    $mail = new PHPMailer(false);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                             //Enable SMTP authentication
        $mail->Username   = 'kellerroxana30@gmail.com';                     //SMTP username
        $mail->Password   = 'wcnw tthl ulzr uttm ';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('formify@gmail.com', 'Formify');
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(false);                                  //Set email format to HTML
        $mail->Subject = 'Cod Formular';
        $mail->Body    = $formCode;
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>