<?php
    $to = "orunbaev848@gmail.com";
    $tema = "Заявка на консультацию по подбору продукции";
    $name = isset($_POST['username-modal']) ? $_POST['username-modal'] : '';
    $telephone = isset($_POST['tel-modal']) ? $_POST['tel-modal'] : '';

    $headers  = 'MIME-Version: 1.0' . "\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
    $headers .= 'From: Вкусно! <'.$to.'>'."\n";
    $headers .= "X-Sender: <" . "$to" . ">\r\n";
    $headers .= "Return-Path: <" . "$to" . ">\r\n";
    $headers .= "Error-To: <" . "$to" . ">\r\n";
    
    $subject = "Заявление на телефонный звонок";
    $recipient = $to;
    $content = "Имя: " . nl2br($name) . "\nТелефон: " . nl2br($telephone);
    mail($recipient, $subject, $content, $headers);
?>