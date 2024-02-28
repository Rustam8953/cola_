<?php
  $to = "orunbaevr848@gmail.com";
  $tema = "Заявка на консультацию по подбору продукции";
  $body = array();
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    $body[] = array(
      "name" => $row['username'],
      "telephone" => $row['tel'],
      "email" => $row['mail'],
      "description" => $row['description']
    );
  };

  $headers  = 'MIME-Version: 1.0' . "\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
  $headers .= 'From: '.$to.''."\n";

  $subject = "Subject";
  $recipient = $to;
  $content = implode("\n", $body);
  mail($recipient, $subject, $content, $headers);
?>