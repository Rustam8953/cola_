<?php
    $to = "orunbaev848@gmail.com";
    $name = isset($_POST['product-name']) ? $_POST['product-name'] : '';
    $telephone = isset($_POST['product-tel']) ? $_POST['product-tel'] : '';
    $email = isset($_POST['product-mail']) ? $_POST['product-mail'] : '';
    $description = isset($_POST['product-item']) ? $_POST['product-item'] : '';

    $headers  = 'MIME-Version: 1.0' . "\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
    $headers .= 'From: Вкусно! <'.$to.'>'."\n";
    $headers .= "X-Sender: <" . "$to" . ">\r\n";
    $headers .= "Return-Path: <" . "$to" . ">\r\n";
    $headers .= "Error-To: <" . "$to" . ">\r\n";
    
    $subject = "Заявка на получение консультации по товару: " . nl2br($description);
    $recipient = $to;
    $content = "Имя: " . nl2br($name) . "\nТовар: " . nl2br($description) . "\nТелефон: " . nl2br($telephone) . "\nПочта: " . nl2br($email);
    mail($recipient, $subject, $content, $headers);
?>