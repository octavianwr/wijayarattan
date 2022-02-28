
<?php
    require 'PHPMailerAutoload.php';

    $mail = new PHPMailer;

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'user@example.com';                 // SMTP username
    $mail->Password = 'secret';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

    $mail->From = $_REQUEST['email'];
    $mail->FromName = $_REQUEST['name'];
    $mail->addAddress('octavian.wr@gmail.com', 'Octavian Reksa');     // Add a recipient
    $mail->addReplyTo('octavian.wr@gmail.com', 'octavian.wr@gmail.com');


    // $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    // $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Get in Touch';
    $mail->Body    = $_REQUEST['message'];
    $mail->AltBody = $_REQUEST['message'];

    if(!$mail->send()) {
        alert('Message could not be sent.');
        alert('Mailer Error: ' . $mail->ErrorInfo);
    } else {
        alert('Message has been sent');
    }
?>