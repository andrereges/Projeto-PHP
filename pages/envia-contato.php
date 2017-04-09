<?php
require_once("../libs/PHPMailer/PHPMailerAutoload.php");

$nome = $_POST["nome"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];

$mail = new PHPMailer();

$mail ->CharSet = "UTF-8";
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "andreriggs90@gmail.com";
$mail->Password = "amarmell";

# Quem está enviando -> admininstrador
$mail->setFrom("andreriggs90@gmail.com", "Página de produtos Alura");
# Quem vai receber a mensagem
$mail->addAddress("dreeh.silva@hotmail.com");
# Formato HTML
$mail->isHTML(true); 

# Título
$mail->Subject = "Email de contato da loja";
# Corpo da mensagem
$mail->msgHTML("<html>de: {$nome}<br/>email: {$email}<br/>mensagem: {$mensagem}</html>");
# Corpo da mensagem alternativo, caso não aceite tags html para formatação
$mail->AltBody = "de: {$nome}\nemail:{$email}\nmensagem: {$mensagem}";

if($mail->send()) {
    $_SESSION["success"] = "Mensagem enviada com sucesso";
    header("Location: index.php");
} else {
    $_SESSION["danger"] = "Erro ao enviar mensagem " . $mail->ErrorInfo;
    header("Location: contato.php");
}
die();