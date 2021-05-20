<?php
    $emailaddress = $_POST['emailaddress'];
    $concerncategory = ucwords($_POST['concerncategory']);
    $detailsfield = $_POST['detailsfield'];
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php';
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'mail.example.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = '';
        $mail->Password   = '';
        $mail->SMTPSecure = 'ssl'; 
        $mail->Port       = 465;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->setFrom('info@example.com', 'E-COM Mailer');
        $mail->addAddress('info@example.com');
        $mail->isHTML(true);
        $mail->Subject = $mail_subject;
        $mail->Body    = $mail_content;
        $mail->AltBody = 'Sample message';
        $mail->send();
        echo 'Message has been sent';
    }
    catch (Exception $e) { echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; }
?>