<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $email = htmlspecialchars($_POST["email"]);
    $equipe = htmlspecialchars($_POST["equipe"]);
    $labo = htmlspecialchars($_POST["labo"]);
    $autreLabo = htmlspecialchars($_POST["autreLabo"]);
    $admin = htmlspecialchars($_POST["admin"]);
    $autre = htmlspecialchars($_POST["autreStatut"]);

    $type = htmlspecialchars($_POST["type"]);
    $statut = htmlspecialchars($_POST["statutLogi"]);
    $logiciel = htmlspecialchars($_POST["logiciel"]);
    $version = htmlspecialchars($_POST["version"]);
    $url = htmlspecialchars($_POST["url"]);

    $to = "charlotte.ruiz@hotmail.fr"; 
    $subject = "Demande d'installation ou de mise a jour d'un logiciel";
    
    $message = "Mail reçu de : $nom $prenom pour demande d'installation ou de mise à jour d'un logiciel\n\n";
    $message .= "Email : $email\n";
    $message .= "Equipe : $equipe\n";
    $message .= "Laboratoire : $labo\n";
    $message .= "Autre : $autreLabo\n";
    $message .= "Statut administratif : $admin\n";
    $message .= "Autre : $autre\n\n";
    $message .= "Logiciel :\n\n";
    $message .= "Type de demande : $type\n";
    $message .= "Statut du logiciel : $statut\n";
    $message .= "Nom du logiciel : $logiciel\n";
    $message .= "Version : $version\n";
    $message .= "URL de téléchargement : $url\n";
    
    $headers = "From: " . $email;
    
    if (mail($to, $subject, $message, $headers)) {
        echo json_encode(["status" => "success", "message" => "E-mail envoyé avec succès !"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Erreur lors de l'envoi de l'e-mail."]);
    }
} 
?>
