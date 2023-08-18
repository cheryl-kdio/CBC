<?php
if(isset($_POST['envoyer']) or $_SERVER["REQUEST_METHOD"] == "POST") {
  $nom = $_POST['nom'];
  $email = $_POST['email'];
  $comment = $_POST['comment'];
  $service = filter_input(INPUT_POST, 'service', FILTER_SANITIZE_STRING);
  $date = $_POST['date'];
  $periode = $_POST['periode'];



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
  if(mail($destinataire, $sujet, $contenu, $headers) && mail($destinataire2, $sujet, $contenu, $headers)) {
    echo "<script type='text/javascript'>alert('Votre message a été envoyé avec succès');</script>" ;
  } else {
    echo "<script type='text/javascript'>Une erreur s'est produite lors de l'envoi du message;</script>";
  }
}
?>