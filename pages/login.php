<?php

$database = new Database();
$db = $database->getConnection();
$user = new User($database);



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User(new Database());

    if ($user->login($username, $password)) {
        $_SESSION['admin'] = true; // Set session variable to indicate admin login
        header("Location: /portfolio");
        exit();
    } else {
        echo "Login failed!";
    }
}
?>

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


