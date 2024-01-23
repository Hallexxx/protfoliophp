<?php

require_once('database.php');

// Classe pour gérer les opérations sur les messages
class MessageManager
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Récupérer tous les messages
    public function getMessages()
    {
        $query = "SELECT * FROM contact_messages";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

// Connexion à la base de données à l'aide de la classe Database
$db = new Database();
$conn = $db->getConnection();

// Utilisation de la classe pour récupérer les messages
$messageManager = new MessageManager($conn);
$messages = $messageManager->getMessages();

?>