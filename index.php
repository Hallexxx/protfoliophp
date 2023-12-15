<?php
    // index.php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $uri = $_SERVER['REQUEST_URI'];

    switch ($uri) {
        case '/':
            require 'pages/portfolio.php';
            break;
        case '/about':
            require 'pages/about.php';
            break;
        case '/contact':
            require 'pages/contact.php';
            break;
        case '/login':
            require 'pages/login.php';
            break;
        default:
            require 'pages/404.php';
            break;
    }
?>