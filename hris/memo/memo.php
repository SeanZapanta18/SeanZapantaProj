<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

//Define some variables
$emails = $_POST['email']; // This will now be an array of email addresses.
$message = $_POST['message'];
$subject = $_POST['subject'];
$error = '';

// Validate the multiple email addresses
foreach ($emails as $email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = 'Please enter a valid email address.';
      break;
    }
  }

//Validate the message
if (empty($message)) {
  $error = 'Please enter a message.';
}

//Validate the subject
if (empty($subject)) {
  $error = 'Please enter a subject for the email.';
}

//If there are no errors, send the email
if (empty($error)) {
    try {
      //Server settings
      $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'humanresourcedepartmentccc@gmail.com';       //SMTP username
      $mail->Password   = 'bukjolbiboqmttti';                           //SMTP password
      $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect
  
      //Recipients
      // This is the only change you need to make
      foreach ($emails as $email) {
        $mail->addAddress($email);
      }
  
      //Content
      $mail->isHTML(true); //Set email format to HTML
      $mail->Subject = $subject;
      $mail->Body = $message;
  
      //Send the email
      $mail->send();
      $mail->SMTPDebug = 0;
  
      //Display a success message
      echo '<script>alert("Message has been sent!"); window.location.href = "index.php";</script>';
    } catch (Exception $e) {
      //Display an error message
      echo '<script>alert("Message could not be sent. Mailer Error: {$mail->ErrorInfo}"); window.location.href = "index.php";</script>';
    }
  } else {
    //Display the validation error
    echo '<script>alert("' . $error . '"); window.location.href = "index.php";</script>';
  }