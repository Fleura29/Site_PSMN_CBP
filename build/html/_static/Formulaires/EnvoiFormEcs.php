<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $email = htmlspecialchars($_POST["email"]);
    $laboratoire = htmlspecialchars($_POST["labo"]);
    $autre = htmlspecialchars($_POST["autre"]);
    $projet = htmlspecialchars($_POST["projet"]);
    $description = htmlspecialchars($_POST["description"]);

    $to = "charlotte.ruiz@hotmail.fr"; 
    $subject = "Demande d'expertise en Calcul Scientifique et HPC";
    
    $message = "Mail reçu de : $nom $prenom pour une demande d’expertise en Calcul Scientifique et HPC\n\n";
    $message .= "Email : $email\n";
    $message .= "Laboratoire : $laboratoire\n";
    $message .= "Autre: $autre\n";
    $message .= "Projet de recherche: $projet\n";
    $message .= "Description de l'expertise sollicitée: $description\n";
    
    $headers = "From: " . $email;
    
    if (mail($to, $subject, $message, $headers)) {
        echo json_encode(["status" => "success", "message" => "E-mail envoyé avec succès !"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Erreur lors de l'envoi de l'e-mail."]);
    }
} 
?>
