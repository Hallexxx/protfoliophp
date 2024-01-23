<?php
    session_start();

    // Déconnexion de la session
    session_destroy();

    // Redirection vers la page principale
    header("Location: /");
    exit();
?>
