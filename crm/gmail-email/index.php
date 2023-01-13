<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';

// passing true in constructor enables exceptions in PHPMailer
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;

    $mail->Username = 'admin@horizonsliterary.us'; // YOUR gmail email
    $mail->Password = 'thankyouGodlovesUs143@'; // YOUR gmail password
    
    // Sender and recipient settings
    $mail->SetFrom('admin@horizonsliterary.us', 'Better Bound House');
    $mail->AddReplyTo('ansellim23@gmail.com', 'Agent Name');
    $mail->addAddress('ithelpdesk2022143@gmail.com', 'Better Bound House');

    // Setting the email content
    $mail->IsHTML(true);
    $mail->Subject = "TESTING EMAIL";
    $mail->Body = 'HTML message body. <b>Gmail</b> SMTP email body.';
    $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';
  
    $mail->send();
    echo "Email message sent.";
} catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}
?>
