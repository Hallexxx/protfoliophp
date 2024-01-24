<?php

$database = new Database(); 
$categoriesHandler = new Categories($database->getConnection());
$categories = $categoriesHandler->getCategories();

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

        return $categories;
    }
}

echo json_encode($categories);

?>
