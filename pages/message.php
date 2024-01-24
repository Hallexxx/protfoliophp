<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Messages reçus</title>
        <link rel="stylesheet" href="/css/blog.css">
    </head>

    <nav class="navbar">
            <div class="logo">Alexandre Perez</div>
            <ul class="nav-list">
                <li class="menu-deroulant"><a href="/">Accueil</a></li>
                <li class="menu-deroulant"><a href="/blog">blog</a></li></li>
            </ul>
    </nav>
    <body>
        <h1>Messages reçus</h1>

        <?php
        foreach ($messages as $message) {
            echo "<p><strong>De :</strong> {$message['name']}</p>";
            echo "<p><strong>Email :</strong> {$message['email']}</p>";
            echo "<p><strong>Message :</strong> {$message['message']}</p>";
            echo "<hr>";
        }
        ?>

    </body>

</html>