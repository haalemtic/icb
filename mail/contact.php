<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "info@example.com"; // Change this email to your //
$subject = "$m_subject:  $name";
$body = "Vous avez reçu un nouveau message de votre site ICB.\n\n"."Voici les détails:\n\nNom: $name\n\n\nAdresse Email: $email\n\nSujet: $m_subject\n\nMessage: $message";
$header = "De: $email";
$header .= "Reply-To: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
