<?php
    include('includes/header.php');
    include('includes/database.php');
    include('includes/user.php');

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $uri = $_SERVER['REQUEST_URI'];

    switch ($uri) {
        case '/':
            require 'pages/portfolio.php';
            break;
        case '/login':
            include_once('includes/logout.php');
            require 'pages/login.php';
            break;
        case '/about':
            require 'pages/about.php';
            break;
        case '/contact':
            include_once('includes/traitement_contact.php');
            require 'pages/contact.php';
            break;
        case '/blog':
            require 'pages/blog.php';
            break;
        default:
            require 'pages/404.php';
            break;
    }
?>