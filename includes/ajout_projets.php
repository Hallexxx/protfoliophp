<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $img_projets = $_POST['img_projets']; 

    require_once('database.php');
    $db = new Database();
    $conn = $db->getConnection();

    $query = "INSERT INTO projets (name_projets, img_projets) VALUES (:name, :img_projets)";
    $stmt = $conn->prepare($query);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':img_projets', $img_projets);

    if ($stmt->execute()) {
        echo "Message sent successfully!";
        console_log("Message sent successfully!");
        header("Location: /");
    } else {
        echo "Error sending message.";
    }
}
?>