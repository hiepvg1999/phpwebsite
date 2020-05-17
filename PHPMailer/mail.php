<?php 
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function sanitize_my_email($field) {
    $field = filter_var($field, FILTER_SANITIZE_EMAIL);
    if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings                     // Enable verbose debug output
    $mail->isSMTP();                                          // Send using SMTP
    $mail->Host       = 'stmp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'nguyenmanhhiep1101@gmail.com';                     // SMTP username
    $mail->Password   = 'nguyenmanhhiep_11011999';                          // SMTP password
    $mail->SMTPSecure = 'TLS';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom('nguyenmanhhiep1101@gmail.com', 'Mailer');
    $to_email = $_REQUEST['email'];
    echo $to_email;
    $secure_check = sanitize_my_email($to_email);
    if($secure_check==false){
    	echo 'Invalid Mail';
    }else{
    	$mail->addAddress($to_email, $_REQUEST['fullname']);
    }
    $mail->addReplyTo('nguyenmanhhiep1101@gmail.com', 'Information');
    // Content
    $mail->isHTML(true);              
    $mail->Subject = 'Order trip from KateBoyBlog';
    $sl = $_REQUEST['sluong'];
    $mail->Body    = 'Your total price is '.$sl.' VND.Thank you for booking a trip in our website';
    //$mail->send();
    echo 'Message has been sent<br>';
    echo '<a href="../index.php">Home</a>';
} 
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

 ?>