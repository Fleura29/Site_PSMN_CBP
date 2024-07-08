<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = htmlspecialchars($_POST["emailDesinscription"]);
    echo $email;

    $to = "charlotte.ruiz@hotmail.fr"; 
    $subject = "Desinscription de la liste de diffusion CBP";
    
    $message = "Mail recu de : $email pour se desinscrire de la liste de diffusion CBP\n\n";

    $headers = "From: " . $email;
    
    if (mail($to, $subject, $message, $headers)) {
        echo json_encode(["status" => "success", "message" => "E-mail envoyé avec succès !"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Erreur lors de l'envoi de l'e-mail."]);
    }
} 
?>
