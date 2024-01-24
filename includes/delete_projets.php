<?php
include_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $projectId = $_POST['project-id'];

    $database = new Database();
    $conn = $database->getConnection();

    $query = "DELETE FROM projets WHERE id = :projectId";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':projectId', $projectId);

    if ($stmt->execute()) {
        echo "Project deleted successfully!";
        header("Location: /");
    } else {
        echo "Error deleting project.";
    }
} else {
    echo "Invalid request method.";
}
?>
