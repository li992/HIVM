<?php
use PHPMailer\PHPMailer\PHPMailer;
include_once 'PHPMailer/Exception.php';
include_once 'PHPMailer/SMTP.php';
include_once 'PHPMailer/Exception.php';

$mail = new PHPMailer();
    
$mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    
$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    
$mail->Username   = 'qiaoyi096@example.com';                     // SMTP username
    
$mail->Password   = 'lqY199612091814';                               // SMTP password
    
$mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
    
$mail->Port       = 465;                                    // TCP port to connect to
    
$mail->setFrom('no-reply@hivm.com', 'Sender');
    
$mail->addAddress('mus.jonny.lee@gmail.com');     // Add a recipient       
    
$mail->addCC('qiaoyi096@gmail.com');

    
$mail->isHTML(true);                                  // Set email format to HTML
    
$mail->Subject = 'Here is the subject';
    
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
    
$mail->send()
?>