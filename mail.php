<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

// create error message
$error = '';

if (isset($_POST['submit'])) {
    // Set input variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    try {
        // SERVER SETTINGS
        // Enable verbose debug output
        $mail->SMTPDebug = 0;
        // Set mailer to use SMTP                                       
        $mail->isSMTP();
        // Specify main and backup SMTP servers                                         
        $mail->Host = 'smtp.gmail.com';
         // Enable SMTP authentication                       
        $mail->SMTPAuth = true;
        // SMTP username                                  
        $mail->Username = 'example@gmail.com';
        // SMTP password                     
        $mail->Password = 'password';
        // Enable TLS encryption, `ssl` also accepted (ssl or tls)                               
        $mail->SMTPSecure = 'ssl';
        // TCP port to connect to (SSL = 465 | TLS = 587)                                  
        $mail->Port = 465;                                     

        //RECIPIENTS
        // Senders information 
        $mail->setFrom($email,$name);
        // Recipients Information
        $mail->addAddress('kuolk19@gmail.com', 'Kuol Kuol');   
        // Reply to information
        $mail->addReplyTo($email, $name);
        // Add blind carbon copy 
        $mail->addBCC('kuollouk@gmail.com');

        // ATTATCHMENTS
        $mail->AddAttachment($_FILES['file']['tmp_name'], $_FILES['file']['name']);

        // CONTENT
        // Set email format to HTML
        $mail->isHTML(true);                                  
        $mail->Subject = $subject;
        $mail->Body    = $message;

        if($mail->send()){
            $error = 'Message has been sent';
        }

    } catch (Exception $e) {
        $error = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}