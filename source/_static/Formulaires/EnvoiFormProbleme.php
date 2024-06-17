<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $email = htmlspecialchars($_POST["email"]);
    $labo = htmlspecialchars($_POST["labo"]);
    $sujet = htmlspecialchars($_POST["sujet"]);
    $autre = htmlspecialchars($_POST["autre"]);
    $commentaire = htmlspecialchars($_POST["commentaire"]);

    $to = "charlotte.ruiz@hotmail.fr"; 
    $subject = "Signaler un probleme";
    
    $message = "Mail reçu de : $nom $prenom pour signaler un problème\n\n";
    $message .= "Email : $email\n";
    $message .= "Laboratoire : $labo\n";
    $message .= "Sujet : $sujet\n";
    $message .= "Autre : $autre\n";
    $message .= "Commentaire : $commentaire\n";
    
    $headers = "From: " . $email;
    
    if (mail($to, $subject, $message, $headers)) {
        echo json_encode(["status" => "success", "message" => "E-mail envoyé avec succès !"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Erreur lors de l'envoi de l'e-mail."]);
    }
} 
?>
