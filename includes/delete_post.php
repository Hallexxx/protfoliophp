<?php
include_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postId = $_POST['post-id'];

    $database = new Database();
    $conn = $database->getConnection();

    $query = "DELETE FROM blog_posts WHERE id = :postId";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':postId', $postId);

    if ($stmt->execute()) {
        echo "Post deleted successfully!";
    } else {
        echo "Error deleting post.";
    }
} else {
    echo "Invalid request method.";
}
?>
