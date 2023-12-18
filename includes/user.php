<?php
class User {
    private $conn;

    public function __construct($db) {
        $this->conn = $db->getConnection();
    }

    public function login($username, $password) {
        $query = "SELECT * FROM admin WHERE user = :user AND password = :password";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':user', $username);
        $stmt->bindParam(':password', $password);

        $stmt->execute();

        return $stmt->rowCount();
    }
}
?>
