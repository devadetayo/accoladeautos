<?php

    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);

    if (isset($_POST['send_mail'])) {
        // Get the form data and sanitize it
        $name = htmlspecialchars(trim($_POST['name']));
        $email = htmlspecialchars(trim($_POST['email']));
        $phone = htmlspecialchars(trim($_POST['phone']));
        $subject = htmlspecialchars(trim($_POST['subject']));
        $message = htmlspecialchars(trim($_POST['send_mail'])); // Fixed variable name from 'message' to 'send_mail'

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp-relay.brevo.com';        // Set your SMTP server here
            $mail->SMTPAuth   = true;
            $mail->Username   = '6b9352002@smtp-brevo.com';  // Your SMTP username
            $mail->Password   = 'YURdrqPtp25MjGmN';     // Your SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable SSL encryption
            $mail->Port       = 465;                        // TCP port for SSL connection

            // Recipients
            $mail->setFrom($email, 'Adeniyi Adetayo'); // Your email and name
            $mail->addAddress('webdevadetayo@gmail.com');           // Add a recipient

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = "<h2>New Message from Contact Form</h2>
                            <p><strong>Name:</strong> {$name}</p>
                            <p><strong>Email:</strong> {$email}</p>
                            <p><strong>Phone:</strong> {$phone}</p>
                            <p><strong>Message:</strong> {$message}</p>";
            $mail->AltBody = "Name: {$name}\nEmail: {$email}\nPhone: {$phone}\nMessage: {$message}";

            // Send the email
            $mail->send();
            redirect('confirmation');
        } catch (Exception $e) {
            array_push($errors, "We are sorry we couldn't process your request");
            redirect('error');
        }
    }