<?php
if (isset($_GET['id'])) {
    $articleId = $_GET['id'];

    // Utiliser la connexion à la base de données pour récupérer les détails de l'article
    $database = new Database();
    $pdo = $database->getConnection();

    $stmt = $pdo->prepare("SELECT * FROM articles WHERE id = :id");
    $stmt->bindParam(':id', $articleId);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Récupérer les données de l'article
        $article = $stmt->fetch(PDO::FETCH_ASSOC);

        // Inclure le fichier d'en-tête
        include_once('includes/header.php');
?>

        <div class="article-container">
            <div class="article-details">
                <h1><?= htmlspecialchars($article['title']) ?></h1>
                <p><?= htmlspecialchars($article['content']) ?></p>
                <!-- Ajoutez ici d'autres détails de l'article si nécessaire -->
            </div>
            <div class="article-image">
                <img src="<?= htmlspecialchars($article['image_url']) ?>" alt="<?= htmlspecialchars($article['title']) ?>">
            </div>
        </div>

<?php
        // Inclure le fichier de pied de page
        include_once('includes/footer.php');
    } else {
        // Aucun article trouvé avec l'ID fourni
        include_once('pages/404.php');
    }
} else {
    // ID de l'article non fourni dans l'URL
    include_once('pages/404.php');
}
?>