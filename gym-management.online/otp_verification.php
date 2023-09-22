<?php
// Include the PHPMailer library
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Generate a random six-digit OTP
$otp = rand(100000, 999999);

// Set up the email message with the OTP
$message = "Your one-time password is: " . $otp;

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

// Set the SMTP settings for your email service
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'your_email@gmail.com';  // Replace with your own email address
$mail->Password = 'your_email_password';  // Replace with your own email password
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Set the email message properties
$mail->setFrom('your_email@gmail.com', 'Your Name');
$mail->addAddress($_POST['email']);  // Get the user's email address from the login form
$mail->Subject = 'One-Time Password Login';
$mail->Body = $message;

// Send the email
if (!$mail->send()) {
    // If there was an error sending the email, handle it here
    echo 'Email could not be sent. Error: ' . $mail->ErrorInfo;
} else {
    // If the email was sent successfully, redirect the user to the OTP verification page
    header('Location: otp_verification.php?email=' . $_POST['email'] . '&otp=' . $otp);
}
?>
