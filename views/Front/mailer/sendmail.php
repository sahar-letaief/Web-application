<?php

    require_once('PHPMailerAutoLoad.php');

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true ;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '465';
    $mail->isHTML();
    $mail->Username = 'yassine.bs125@gmail.com';
    $mail->Password = 'Salwaghozzi10';
    $mail->SetFrom('no-reply@yassbass.org');
    $mail->Subject = 'hello world';
    $mail->Body = " a test ";
    $mail->addAddress('yassine.bensalha@esprit.tn');

    $mail->send();
    
?>