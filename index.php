<?php
    include('includes/database.php');
    include('includes/user.php');

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $uri = $_SERVER['REQUEST_URI'];
    $uriParts = explode('/', $uri);

    switch ($uriParts[1]) {
        case '':
            include_once('includes/header.php');
            require 'pages/portfolio.php';
            break;
        case 'login':
            include_once('includes/header.php');
            require 'pages/login.php';
            break;
        case 'about':
            require 'pages/about.php';
            break;
        case 'contact':
            include_once('includes/header.php');
            include_once('includes/traitement_contact.php');
            require 'pages/contact.php';
            break;
        case 'blog':
            include_once('includes/FilterPosts.php');
            include_once('includes/Categories.php');
            require 'pages/blog.php';
            break;
        case 'article':
            // Vérifier si l'ID de l'article est présent dans l'URL
            if (isset($uriParts[2])) {
                // Charger la page article.php
                include_once('pages/article.php');
            } else {
                // L'ID de l'article n'est pas présent, renvoyer vers la page d'accueil ou afficher une erreur
                include_once('pages/404.php');
            }
            break;
        default:
            require 'pages/404.php';
            break;
    }
?>