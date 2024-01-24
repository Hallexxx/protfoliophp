<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $descriptions = $_POST['descriptions'];
    $author = $_POST['author'];

    require_once('database.php');
    $db = new Database();
    $conn = $db->getConnection();

    // Ajout d'un nouvel article
    $query = "INSERT INTO blog_posts (title, category, description, author) VALUES (:title, :category, :descriptions, :author)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':descriptions', $descriptions);
    $stmt->bindParam(':author', $author);

    if ($stmt->execute()) {
        echo "New blog post added successfully!";
        header("Location: /");  // Rediriger vers la page principale après l'ajout
    } else {
        echo "Error adding new blog post.";
    }
}
?>
