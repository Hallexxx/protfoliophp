<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérez les données du formulaire
    $name = $_POST['name'] ?? '';
    $level = $_POST['level'] ?? '';

    require_once('database.php');
    $db = new Database();
    $conn = $db->getConnection(); // Utilisez $conn au lieu de $pdo

    // Insérez les données dans la base de données (vous devrez adapter ceci à votre structure de base de données)
    $query = "INSERT INTO skills (skill_name, niveau) VALUES (:name, :level)";
    $stmt = $conn->prepare($query); // Utilisez $conn au lieu de $pdo

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':level', $level);

    if ($stmt->execute()) {
        echo "Compétence ajoutée avec succès!";
    } else {
        echo "Erreur lors de l'ajout de la compétence : " . print_r($stmt->errorInfo(), true);
        die(); // ou exit();
    }
}
?>
