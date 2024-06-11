<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $email = htmlspecialchars($_POST["email"]);
    $laboratoire = htmlspecialchars($_POST["labo"]);

    $autre = htmlspecialchars($_POST["autre"]);

    $to = "charlotte.ruiz@hotmail.fr"; 
    $subject = "Suggestion de question ou thème pour le café du jeudi";
    
    $message = "Mail reçu de : $nom $prenom pour une suggestion de question ou thème pour le café du jeudi\n\n";
    $message .= "Email : $email\n";
    $message .= "Laboratoire : $laboratoire\n";
    $message .= "Autre : $autre\n";
    $message .= "Question ou thème : $question";
    
    $headers = "From: " . $email;
    
    if (mail($to, $subject, $message, $headers)) {
        echo json_encode(["status" => "success", "message" => "E-mail envoyé avec succès !"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Erreur lors de l'envoi de l'e-mail."]);
    }
} 
?>
