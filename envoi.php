<?php
// Activer l'affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['envoyer']) or $_SERVER["REQUEST_METHOD"] == "POST") {
  // Sanitisation des données
  $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
  $service = filter_input(INPUT_POST, 'service', FILTER_SANITIZE_STRING);
  $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
  $periode = filter_input(INPUT_POST, 'periode', FILTER_SANITIZE_STRING);

  // Destinataire de l'e-mail
  $destinataire = 'cabinet.beaudelaire.conseil@gmail.com';

  // Sujet de l'e-mail
  $sujet = 'Prise de rendez-vous pour une affaire '.$service;

  // Construire le corps du message
  $contenu = "Nom : $nom\n";
  $contenu .= "Email : $email\n\n";
  $contenu .= "Message :\n$comment\n";

  // En-têtes de l'e-mail
  $headers = "From: $nom <$email>\r\n";
  $headers .= "Reply-To: $email\r\n";

  // Envoyer l'e-mail
  if(mail($destinataire, $sujet, $contenu, $headers)) {
    echo "<script type='text/javascript'>alert('Votre message a été envoyé avec succès');</script>";
  } else {
    echo "<script type='text/javascript'>alert('Une erreur s'est produite lors de l'envoi du message.');</script>";
  }
}
?>
