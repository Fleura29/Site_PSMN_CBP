<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $email = htmlspecialchars($_POST["email"]);
    $courriel = htmlspecialchars($_POST["courriel"]);
    $demande = htmlspecialchars($_POST["demande"]);
    $plateau = htmlspecialchars($_POST["plateau"]);
    $entite = htmlspecialchars($_POST["entite"]);
    $autre = htmlspecialchars($_POST["autre"]);
    $projet = htmlspecialchars($_POST["projet"]);
    $description = htmlspecialchars($_POST["description"]);

    $to = "charlotte.ruiz@hotmail.fr"; 
    $subject = "Demande d'expertise en informatique scientifique";
    
    $message = "Mail reçu de : $nom $prenom pour une demande d'expertise en informatique scientifique\n\n";
    $message .= "Email : $email\n";
    $message .= "Courriel de la personne marraine : $courriel\n";
    $message .= "Demande : $demande\n";
    $message .= "Plateau technique : $plateau\n";
    $message .= "Entite : $entite\n";
    $message .= "Autre (si entité non ENS): $autre\n";
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
