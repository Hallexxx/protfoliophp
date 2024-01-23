<?php

class Categories {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getCategories() {
        $sql = "SELECT DISTINCT category FROM blog_posts";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $categories = $stmt->fetchAll(PDO::FETCH_COLUMN);

        // Débogage
        var_dump($categories);

        return $categories;
    }
}

// Utilisation :
$database = new Database(); // Assurez-vous d'avoir la classe Database pour établir la connexion PDO
$categoriesHandler = new Categories($database->getConnection());
$categories = $categoriesHandler->getCategories();

// Retourne les catégories au format JSON
echo json_encode($categories);
?>
