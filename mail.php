<?php
require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';

$name=$_POST["name"];
$email=$_POST["email"];
$subject=$_POST["subject"];
$comments=$_POST["comments"];

$mail = new PHPMailer\PHPMailer\PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'mail.kurumsaleposta.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'email@hasanhakanerden.online';
    $mail->Password   = 'hk8qmNZC0D4.:.-1';
    $mail->SMTPSecure = false;
    $mail->SMTPAutoTLS = false;
    $mail->Port       = 587;
    $mail->CharSet = 'UTF-8';
    $mail->setFrom($email, $name);
    $mail->addAddress('hasanhakanerden@gmail.com'); //Alıcı adresi
    $mail->addAddress('email@hasanhakanerden.online'); //Alıcı adresi
    $mail->addReplyTo($email, $name);
    $mail->isHTML(true);
    $mail->Subject = 'hasanhakanerden.online Sitesinden Mesaj Var: '.$subject;
    $mail->Body    = 'İsim: '.$name.'<br>E-posta: '.$email.'<br>Mesaj: '.$comments;
    $mail->AltBody = 'İsim: '.$name.' -- E-posta: '.$email.' -- Mesaj: '.$comments;
    $mail->send();
    $success=true;
    header("location:index.html#ok");
}
 catch (Exception $e) {
        echo $e->errorMessage();die();
    header("location:index.html#err");
}


?>
