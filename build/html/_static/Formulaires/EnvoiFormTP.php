<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $email = htmlspecialchars($_POST["email"]);
    $laboratoire = htmlspecialchars($_POST["labo"]);
    $evenement = htmlspecialchars($_POST["evenement"]);
    $salle = htmlspecialchars($_POST["salle"]);
    $datedeb = htmlspecialchars($_POST["datedeb"]);
    $horairedeb = htmlspecialchars($_POST["horairedeb"]);
    $datefin = htmlspecialchars($_POST["datefin"]);
    $horairefin = htmlspecialchars($_POST["horairefin"]);
    $nbparticipants = htmlspecialchars($_POST["nbparticipants"]);
    $autre = htmlspecialchars($_POST["autre"]);

    $to = "charlotte.ruiz@hotmail.fr"; 
    $subject = "Reservation salle de TP";
    
    $message = "Mail reçu de : $nom $prenom pour une demande de réservation de salle de TP\n\n";
    $message .= "Email : $email\n";
    $message .= "Laboratoire : $laboratoire\n";
    $message .= "Évènement : $evenement\n";
    $message .= "Salle : $salle\n";
    $message .= "Date de début : $datedeb\n";
    $message .= "Horaire de début : $horairedeb\n";
    $message .= "Date de fin : $datefin\n";
    $message .= "Horaire de fin : $horairefin\n";
    $message .= "Nombre estimatif de participants : $nbparticipants\n";
    $message .= "Autres renseignements : $autre\n";
    
    $headers = "From: " . $email;
    
    if (mail($to, $subject, $message, $headers)) {
        echo json_encode(["status" => "success", "message" => "E-mail envoyé avec succès !"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Erreur lors de l'envoi de l'e-mail."]);
    }
} 
?>
