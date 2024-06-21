<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $email = htmlspecialchars($_POST["email"]);
    $labo = htmlspecialchars($_POST["labo"]);
    $autre = htmlspecialchars($_POST["autre"]);
    $categorie = htmlspecialchars($_POST["categorie"]);
    $probleme = htmlspecialchars($_POST["probleme"]);
    $resolution = htmlspecialchars($_POST["resolution"]);

    $to = "charlotte.ruiz@hotmail.fr"; 
    $subject = "Suggerer une entree de F.A.Q.";
    
    $message = "Mail reçu de : $nom $prenom pour suggérer une entrée de F.A.Q.\n\n";
    $message .= "Email : $email\n";
    $message .= "Laboratoire : $labo\n";
    $message .= "Autre : $autre\n";
    $message .= "Catégorie : $categorie\n";
    $message .= "Problème : $probleme\n";
    $message .= "Résolution proposée: $resolution\n";
    
    $headers = "From: " . $email;
    
    if (mail($to, $subject, $message, $headers)) {
        echo json_encode(["status" => "success", "message" => "E-mail envoyé avec succès !"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Erreur lors de l'envoi de l'e-mail."]);
    }
} 
?>
