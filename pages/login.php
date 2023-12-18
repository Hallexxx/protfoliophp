<?php
include('includes/header.php');
include('Database.php');
include('User.php');

$database = new Database();
$db = $database->getConnection();
$user = new User($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($user->login($username, $password) > 0) {
        header("Location: portfolio.php");
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
        <form>
            <h3>Login Here</h3>

            <label for="username">Username</label>
            <input type="text" placeholder="Email or Phone" id="username">

            <label for="password">Password</label>
            <input type="password" placeholder="Password" id="password">

            <button>Log In</button>
            <div class="social">
            <div class="go"><i class="fab fa-google"></i>  Google</div>
            <div class="fb"><i class="fab fa-facebook"></i>  Facebook</div>
            </div>
        </form>
    </body>
</html>

<?php
include('includes/footer.php');
?>

