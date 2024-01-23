<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $level = $_POST['level'];

    require_once('database.php');
    $db = new Database();
    $conn = $db->getConnection();

    $query = "INSERT INTO skills (skill_name, niveau) VALUES (:name, :level)";
    $stmt = $conn->prepare($query);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':level', $level);

    if ($stmt->execute()) {
        echo "Message sent successfully!";
        console_log("Message sent successfully!");
        header("Location: /");
    } else {
        echo "Error sending message.";
    }
}
?>