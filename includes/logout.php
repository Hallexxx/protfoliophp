<?php
session_start();

// Indiquer que l'utilisateur n'est plus en mode admin
$_SESSION['admin'] = false;

// Détruire complètement la session
session_destroy();

// Répondre à la requête AJAX avec une réponse réussie
http_response_code(200);
?>
