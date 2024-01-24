<?php
include_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $compId = $_POST['comp-id'];
    $newName = $_POST['new-name'];
    $newLevel = $_POST['new-level'];

    $database = new Database();
    $conn = $database->getConnection();

    $query = "UPDATE skills SET skill_name = :newName, niveau = :newLevel WHERE id = :compId";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':newName', $newName);
    $stmt->bindParam(':newLevel', $newLevel);
    $stmt->bindParam(':compId', $compId);

    if ($stmt->execute()) {
        echo "Competence updated successfully!";
    } else {
        echo "Error updating competence.";
    }
} else {
    echo "Invalid request method.";
}
?>
