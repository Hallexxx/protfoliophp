<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name_experience = $_POST['name_experience'];
    $img_experience = $_POST['img_experience'];

    require_once('database.php');
    $db = new Database();
    $conn = $db->getConnection();

    $query = "INSERT INTO experience (name_experience, img_experience) VALUES (:name_experience, :img_experience)";
    $stmt = $conn->prepare($query);

    $stmt->bindParam(':name_experience', $name_experience);
    $stmt->bindParam(':img_experience', $img_experience);

    if ($stmt->execute()) {
        echo "Expérience ajoutée avec succès !";
        header("Location: /"); // Rediriger selon vos besoins
    } else {
        echo "Erreur lors de l'ajout de l'expérience.";
    }
}
?>
