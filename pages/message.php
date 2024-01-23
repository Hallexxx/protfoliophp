<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages reçus</title>
</head>

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