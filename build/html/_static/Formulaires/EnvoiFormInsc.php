<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $email = htmlspecialchars($_POST["email"]);
    $labo = htmlspecialchars($_POST["labo"]);

    $to = "charlotte.ruiz@hotmail.fr"; 
    $subject = "Inscription a la liste de diffusion CBP";
    
    $message = "Mail recu de : $nom $prenom pour s'inscrire à la liste de diffusion\n\n";
    $message .= "Email : $email\n";
    $message .= "Laboratoire : $labo\n";
    
    $headers = "From: " . $email;
    
    if (mail($to, $subject, $message, $headers)) {
        echo json_encode(["status" => "success", "message" => "E-mail envoyé avec succès !"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Erreur lors de l'envoi de l'e-mail."]);
    }
} 
?>
