<?php
$host = "mail.dahmersolar.com.br";
$port = "465";
$username = "contato@dahmersolar.com.br";
$password = "";

$from_email = $_POST['from'];
$from_name = $_POST['name'];
$subject = $_POST['subject'];
$content = $_POST['content'];
$to = $_POST['to'];

require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';
$mail->Host = $host;
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->Port = $port;
$mail->Username = $username;
$mail->Password = $password;
$mail->SetFrom($from_email, $from_name);
$mail->Subject = $subject;
$mail->MsgHTML($content);
$mail->AddAddress($to);

if ($mail->Send()) {
   echo 'Enviado com sucesso';
} else {
   echo 'Erro: '.$mail->ErrorInfo;
}