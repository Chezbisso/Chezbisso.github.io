<?php
// Vérifier les champs vides
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['phone']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$subject = strip_tags(htmlspecialchars($_POST['subject']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Créez l'e-mail et envoyez le message //

$to = "contact@chezbisso.com"; // Ajoutez votre adresse e-mail entre le "" en remplaçant votrenom@votredomaine.com - C'est là que le formulaire enverra un message.

$subject = "Formulaire de contact:  $name";
$body = "Vous avez reçu un nouveau message depuis le formulaire de contact :.\n\n"."Voici les détails:\n\nNom: $name\n\nSujet: $subject\n\nEmail: $email\n\nPhone: $phone\n\nMessage:\n$message";

$header = "From: noreply@chezbisso.com\n"; // Il s'agit de l'adresse e-mail à partir de laquelle le message généré sera. Nous vous recommandons d'utiliser quelque chose comme noreply@yourdomain.com.

$header .= "Reply-To: $email";  

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
