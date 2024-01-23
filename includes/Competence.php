<?php

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
            $query = "DELETE FROM competence WHERE id = :id";
            $params = [':id' => $this->id];

            $this->database->executeQuery($query, $params);
        }

        public function update($newLevel) {
            $query = "UPDATE competence SET niveau = :level WHERE id = :id";
            $params = [':level' => $newLevel, ':id' => $this->id];

            $this->database->executeQuery($query, $params);
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
            $newLevel = $_POST['new_level'];
            $competence->update($newLevel);
        }
    }

?>
