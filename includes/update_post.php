<?php
include_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postId = $_POST['post-id'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $descriptions = $_POST['descriptions'];
    $author = $_POST['author'];

    $database = new Database();
    $conn = $database->getConnection();

    $query = "UPDATE blog_posts SET title = :title, category = :category, description = :descriptions, author = :author WHERE id = :postId";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':descriptions', $descriptions);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':postId', $postId);

    if ($stmt->execute()) {
        echo "Competence updated successfully!";
    } else {
        echo "Error updating competence.";
    }
} else {
    echo "Invalid request method.";
}
?>
