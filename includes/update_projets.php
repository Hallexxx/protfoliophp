<?php
include_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $projectId = $_POST['project-id'];
    $newName = $_POST['new-name'];
    $newImage = $_POST['new-image'];

    $database = new Database();
    $conn = $database->getConnection();

    $query = "UPDATE projets SET name_projets = :newName, img_projets = :newImage WHERE id = :projectId";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':newName', $newName);
    $stmt->bindParam(':newImage', $newImage);
    $stmt->bindParam(':projectId', $projectId);

    if ($stmt->execute()) {
        echo "Project updated successfully!";
        header("Location: /");
    } else {
        echo "Error updating project.";
    }
} else {
    echo "Invalid request method.";
}
?>
