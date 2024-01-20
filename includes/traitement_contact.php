<?php
include_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $phone = isset($_POST['phone']) ? $_POST['phone'] : null;
    $message = isset($_POST['message']) ? $_POST['message'] : null;

    $database = new Database();
    $db = $database->getConnection();

    $query = "INSERT INTO messages (name, email, phone, message) VALUES (:name, :email, :phone, :message)";
    $stmt = $db->prepare($query);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':message', $message);

    try {
        $stmt->execute();
        echo "Message sent successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
