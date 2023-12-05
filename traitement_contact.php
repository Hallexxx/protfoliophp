<?php
// traitement_contact.php

include('base_de_donnees.php'); // Assurez-vous que le fichier est inclus pour avoir $conn disponible

// Exemple de traitement d'un message de contact
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Utilisez des déclarations préparées pour éviter les injections SQL
$stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    echo "Message envoyé avec succès.";
} else {
    echo "Erreur lors de l'envoi du message : " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
