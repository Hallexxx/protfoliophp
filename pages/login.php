<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$database = new Database();
$db = $database->getConnection();
$user = new User($database);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    $user = new User(new Database());

    if ($user->login($username, $password)) {
        $_SESSION['admin'] = true; // Démarrez la session admin
        echo "Login successful! <script>window.location.href='/';</script>";
        exit();
    } else {
        echo "Login failed!";
    }
}
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/login.css">
        <link rel="stylesheet" href="/css/portfolio.css">
        <script src="https://unpkg.com/gsap@3.9.0/dist/gsap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <script src="/JS/animation.js"></script>
    </head>
    <body>
        <div class="background">
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
        <form class="login" method="post" action="">
            <h3>Login Here</h3>

            <label for="username">Username</label>
            <input type="text" placeholder="Email or Phone" id="username" name="username">

            <label for="password">Password</label>
            <input type="password" placeholder="Password" id="password" name="password">

            <button type="submit">Log In</button>
        </form>
    </body>
</html>


