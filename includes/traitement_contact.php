<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];

        // Créez une nouvelle instance de la classe Database
        require_once('database.php'); // Assurez-vous que le fichier Database.php est inclus correctement
        $db = new Database();
        $conn = $db->getConnection();

        // Insérez les données du formulaire dans la table contact_messages
        $query = "INSERT INTO contact_messages (name, email, phone, message) VALUES (:name, :email, :phone, :message)";
        $stmt = $conn->prepare($query);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':message', $message);

        if ($stmt->execute()) {
            echo json_encode(array('success' => true, 'message' => 'Message sent successfully!'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Error sending message.'));
        }
    } else {
        echo "Invalid request method.";
    }
?>