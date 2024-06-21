<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $email = htmlspecialchars($_POST["email"]);
    $datenaiss = htmlspecialchars($_POST["datenaiss"]);
    $labo = htmlspecialchars($_POST["labo"]);
    $autreLabo = htmlspecialchars($_POST["autreLabo"]);
    $equipe = htmlspecialchars($_POST["equipe"]);
    $statut = htmlspecialchars($_POST["admin"]);
    $autre = htmlspecialchars($_POST["autreStatut"]);
    $responsable = htmlspecialchars($_POST["responsable"]);
    $datefin = htmlspecialchars($_POST["datefin"]);
    $check = isset($_POST["check"]) ? 'coché' : 'non coché';
    $descriptif = htmlspecialchars($_POST["descriptif"]);
    $justifier = htmlspecialchars($_POST["justifier"]);
    $checkFr = isset($_POST["checkFr"]) ? 'coché' : 'non coché';
    $checkEn = isset($_POST["checkEn"]) ? 'coché' : 'non coché';

    $to = "charlotte.ruiz@hotmail.fr"; 
    $subject = "Demande d'acces aux ressources du PSMN";
    
    $message = "Mail reçu de : $nom $prenom pour une demande d'accès aux ressources du PSMN\n\n";
    $message .= "Email : $email\n";
    $message .= "Date de naissance : $datenaiss\n";
    $message .= "Laboratoire : $labo\n";
    $message .= "Autre laboratoire: $autreLabo\n";
    $message .= "Équipe (ou Groupe, Projet) : $equipe\n";
    $message .= "Statut administratif : $statut\n";
    $message .= "Autre : $autre\n";
    $message .= "Responsable d'ouverture de compte : $responsable\n";
    $message .= "Date de fin : $datefin\n";
    $message .= "No compute (accès data uniquement)  : $check\n";
    $message .= "Descriptif du domaine scientifique : $description\n";
    $message .= "Pour les membres des laboratoires hors du site de Gerland: justifier cette demande : $justifier\n";
    $message .= "Français : $checkFr\n";
    $message .= "English : $checkEn\n";
    
    $headers = "From: " . $email;
    
    if (mail($to, $subject, $message, $headers)) {
        echo json_encode(["status" => "success", "message" => "E-mail envoyé avec succès !"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Erreur lors de l'envoi de l'e-mail."]);
    }
} 
?>
