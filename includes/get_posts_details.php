<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $postId = $_GET['id'];

    require_once('database.php');
    $db = new Database();
    $conn = $db->getConnection();

    $query = "SELECT * FROM blog_posts WHERE id = :postId";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':postId', $postId);
    $stmt->execute();
    $postDetails = $stmt->fetch(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($postDetails);
    exit; // Assurez-vous de terminer l'exécution du script ici
}
?>

