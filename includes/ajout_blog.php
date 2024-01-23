<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postId = $_POST['postId'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $descriptions = $_POST['descriptions'];
    $author = $_POST['author'];

    require_once('database.php');
    $db = new Database();
    $conn = $db->getConnection();

    if (isset($_POST['update'])) {
        // Mise à jour du post
        $query = "UPDATE blog_posts SET title = :title, category = :category, description = :descriptions, author = :author WHERE id = :postId";
    } elseif (isset($_POST['delete'])) {
        // Suppression du post
        $query = "DELETE FROM blog_posts WHERE id = :postId";
    }

    $stmt = $conn->prepare($query);
    $stmt->bindParam(':postId', $postId);

    if (isset($_POST['update'])) {
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':descriptions', $descriptions);
        $stmt->bindParam(':author', $author);
    }

    if ($stmt->execute()) {
        echo "Action success!";
    } else {
        echo "Error performing action.";
    }
}
?>
