<?php
    $to = "orunbaev848@gmail.com";
    $tema = "Заявка на консультацию по подбору продукции";
    $name = isset($_POST['username']) ? $_POST['username'] : '';
    $telephone = isset($_POST['tel']) ? $_POST['tel'] : '';
    $email = isset($_POST['mail']) ? $_POST['mail'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';

    $headers  = 'MIME-Version: 1.0' . "\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
    $headers .= 'From: Вкусно! <'.$to.'>'."\n";
    $headers .= "X-Sender: <" . "$to" . ">\r\n";
    $headers .= "Return-Path: <" . "$to" . ">\r\n";
    $headers .= "Error-To: <" . "$to" . ">\r\n";
    
    $subject = "Заявление на получение консультации";
    $recipient = $to;
    $content = "Имя: " . nl2br($name) . "\nСообщение: " . nl2br($description) . "\nТелефон: " . nl2br($telephone) . "\nПочта: " . nl2br($email);
    mail($recipient, $subject, $content, $headers);
?>