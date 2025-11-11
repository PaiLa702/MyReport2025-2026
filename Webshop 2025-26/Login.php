<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="ShopStyles.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&family=Press+Start+2P&family=VT323&display=swap" rel="stylesheet">

</head>

<body>
   <?php
include_once("CommonCode.php");
NavigationBar("Login");

/*
$correctUsername = "wizard";
$correctPassword = "potion123";
*/

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === $correctUsername && $password === $correctPassword) {
        $message = "<div class='success'>🪄 You are logged in, mighty alchemist!</div>";
    } else {
        $message = "<div class='error'>❌ Wrong username or password. The potion failed.</div>";
    }
}
?>

    <div class="login-container">
        <h2>Login to Your Magic Account</h2>

        <form method="POST" action="Login.php">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter password" required>

            <button type="submit">Login</button>
        </form>

        <?= $message ?>
    </div>

</body>
</html>
