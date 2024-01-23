<?php

class FilterPosts {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getFilteredPosts($category) {
        $sql = "SELECT * FROM blog_posts WHERE category = :category ORDER BY created_at DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":category", $category, PDO::PARAM_STR);
        $stmt->execute();

        $filteredPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $filteredPosts;
    }
}

// Utilisation :
$database = new Database(); // Assurez-vous d'avoir la classe Database pour établir la connexion PDO
$filterPostsHandler = new FilterPosts($database->getConnection());

// Récupère la catégorie passée en paramètre (via GET par exemple)
$category = $_GET['category'] ?? '';

// Retourne les articles filtrés au format JSON
echo json_encode($filterPostsHandler->getFilteredPosts($category));
