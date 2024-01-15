<?php

$database = new Database();
$db = $database->getConnection();
$user = new User($database);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($user->login($username, $password) > 0) {
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
            <div class="login_social">
                <div class="go"><i class="fab fa-google"></i>  Google</div>
            </div>
        </form>
    </body>
</html>


