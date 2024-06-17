<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $email = htmlspecialchars($_POST["email"]);
    $courriel = htmlspecialchars($_POST["courriel"]);
    $etablissement = htmlspecialchars($_POST["etablissement"]);
    $labo = htmlspecialchars($_POST["labo"]);
    $datedeb = htmlspecialchars($_POST["datedeb"]);
    $datefin = htmlspecialchars($_POST["datefin"]);
    $descriptif = htmlspecialchars($_POST["descriptif"]);
    $logiciels = htmlspecialchars($_POST["logiciels"]);

    $to = "charlotte.ruiz@hotmail.fr"; 
    $subject = "Demande d'ouverture de compte sur les equipements du CBP";
    
    $message = "Mail reçu de : $nom $prenom pour une demande d'ouverture de compte sur les équipements du CBP\n\n";
    $message .= "Email : $email\n";
    $message .= "Courriel de la personne marraine : $courriel\n";
    $message .= "Etablissement : $etablissement\n";
    $message .= "Laboratoire ou Département : $labo\n";
    $message .= "Date de début : $datedeb\n";
    $message .= "Date de fin : $datefin\n";
    $message .= "Descriptif du domaine: $descriptif\n";
    $message .= "Logiciels ou bibliotèques utilisés: $logiciels\n";
    
    $headers = "From: " . $email;
    
    if (mail($to, $subject, $message, $headers)) {
        echo json_encode(["status" => "success", "message" => "E-mail envoyé avec succès !"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Erreur lors de l'envoi de l'e-mail."]);
    }
} 
?>
