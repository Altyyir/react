<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
include 'dbconn.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$email = $_POST['email'];

$sql = "SELECT * FROM faculty_user WHERE email = '$email'";
$result = $conn->query($sql);
if(!$result->fetch_assoc()) {
    header('location: ./page-forgot-password.php?invalid=email');
    exit();
}

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '20-74301@g.batstate-u.edu.ph';                     //SMTP username
    $mail->Password   = 'ttewdocjbiqrrrpl';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('20-74301@g.batstate-u.edu.ph', 'React');
    $mail->addAddress($email);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Recover Account';
    $mail->Body    = 'Click the following <a href="http://localhost/capstone/newpassword.php">link</a> to recover your email.';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    
    session_start();
    $_SESSION['emailRecovery'] = $email;
    header('location: ./email.sent.success.php');
    exit();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}