<?php
require 'mail.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    

    try {
        // Configure PHPMailer for email sending

        // ... (same configuration as before)

        // Recipients
        $mail->setFrom($email, htmlspecialchars($name));
        $mail->addAddress('beloufawissalamina@gmail.com');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Us Message';
        $mail->Body = '<p><strong>Name:</strong> ' . htmlspecialchars($name) . '</p>' .
                      '<p><strong>Email:</strong> ' . htmlspecialchars($email) . '</p>' .
                      '<p><strong>Message:</strong> ' . htmlspecialchars($message) . '</p>';

        $mail->send();
        echo 'Email has been sent';
        header("Location: index.php");
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>