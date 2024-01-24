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
            include_once('includes/ajout_competence.php');
            include_once('includes/ajout_projets.php');
            include_once('includes/ajout_experience.php');
            include_once('includes/Competence.php');
            include_once('includes/update_projets.php');
            include_once('includes/delete_projets.php');
            include_once('includes/update_comp.php');
            include_once('includes/delete_comp.php');
            require 'pages/portfolio.php';
            break;
        case 'login':
            include_once('includes/header.php');
            require 'pages/login.php';
            break;
        case 'contact':
            include_once('includes/header.php');
            include_once('includes/traitement_contact.php');
            require 'pages/contact.php';
            break;
        case 'blog':
            include_once('includes/FilterPosts.php');
            include_once('includes/ajout_blog.php');
            include_once('includes/Categories.php');
            include_once('includes/get_posts_details.php');
            require 'pages/blog.php';
            break;
        case 'message':
            include_once('includes/affichage_contact.php');
            require 'pages/message.php';
            break;
        case 'logout':
            require 'pages/logout.php';
            break;
        case 'article':
            if (isset($uriParts[2])) {
                include_once('pages/article.php');
            } else {
                // L'ID de l'article n'est pas présent, renvoyer vers la page d'accueil ou afficher une erreur
                include_once('pages/403.php');
            }
            break;
        default:
            require 'pages/404.php';
            break;
    }
?>