<?php
include_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $compId = $_POST['comp-id'];

    $database = new Database();
    $conn = $database->getConnection();

    $query = "DELETE FROM skills WHERE id = :compId";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':compId', $compId);

    if ($stmt->execute()) {
        echo "Competence deleted successfully!";
    } else {
        echo "Error deleting competence.";
    }
} else {
    echo "Invalid request method.";
}
?>
