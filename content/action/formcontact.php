<?php
    $emailaddress = strtolower($_POST['emailaddress']);
    $mail_subject = ucwords($_POST['concerncategory']);
    if ($mail_subject == 1) { $mail_subject = "Report"; }
    elseif ($mail_subject == 2) { $mail_subject = "Emergency"; }
    elseif ($mail_subject == 3) { $mail_subject = "Feedback"; }
    elseif ($mail_subject == 4) { $mail_subject = "Others"; }
    $mail_content = $_POST['detailsfield'];
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php';
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'kalsaybglm@gmail.com';
        $mail->Password   = 'ecombestresearch';
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
        $mail->addAddress($emailaddress);
        $mail->isHTML(true);
        $mail->Subject = $mail_subject;
        $mail->Body    = $mail_content;
        $mail->AltBody = 'Sample message';
        $mail->send();
        echo 'Message has been sent';
    }
    catch (Exception $e) { echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; }
?>