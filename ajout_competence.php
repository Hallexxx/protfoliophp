<?php
// ajout_competence.php

include('base_de_donnees.php'); // Assurez-vous que le fichier est inclus pour avoir $conn disponible
$skillName = "HTML5";
$sql = "INSERT INTO skills (skill_name) VALUES ('$skillName')";
$conn->query($sql);
?>
