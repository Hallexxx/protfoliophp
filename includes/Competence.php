<?php

include_once 'database.php';

    class Competence {
        private $id;
        private $name;
        private $level;
        private $database;

        public function __construct($id, $name, $level, $database) {
            $this->id = $id;
            $this->name = $name;
            $this->level = $level;
            $this->database = $database;
        }
        public function delete() {
            $query = "DELETE FROM skills WHERE id = :id";
            $params = [':id' => $this->id];
        
            if ($this->database->executeQuery($query, $params)) {
                echo "Competence deleted successfully.";
            } else {
                echo "Error deleting competence.";
            }
        }
        
        public function update($newLevel) {
            $query = "UPDATE skills SET niveau = :level WHERE id = :id";
            $params = [':level' => $newLevel, ':id' => $this->id];
        
            if ($this->database->executeQuery($query, $params)) {
                echo "Competence updated successfully.";
            } else {
                echo "Error updating competence.";
            }
        }
        
    }

    // Usage
    $database = new Database();
    $conn = $database->getConnection();

    if (isset($_POST['name'])) {
        $competence = new Competence($_POST['id'], $_POST['name'], $_POST['level'], $database);
    
        if (isset($_POST['delete'])) {
            $competence->delete();
        } elseif (isset($_POST['update'])) {
            $newLevel = $_POST['level'];
            $competence->update($newLevel);
        }
    }    

?>
