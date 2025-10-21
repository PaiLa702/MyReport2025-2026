<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Pixel Potion Shop</title>
    <link rel="stylesheet" type="text/css" href="ShopStyles.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Cinzel+Decorative&family=VT323&display=swap" rel="stylesheet">
</head>

<body>
   <?php
include_once("CommonCode.php");
NavigationBar("Register");

// --- Default: show the registration form ---
$showForm = true;

// --- Handle form submission ---
if (isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['confirm'])) {
    $showForm = false;
    print("<h3>Registration in process...</h3>");

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm = trim($_POST['confirm']);

    // --- Check if passwords match ---
    if ($password === $confirm) {
        print("<p>Passwords match. Registering user...</p>");

        // --- Hash password before saving (for security) ---
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // --- Open or create Clients.csv file ---
        $file = fopen("Clients.csv", "a");

        if ($file) {
            // Write header if file is empty
            if (filesize("Clients.csv") === 0) {
                fputcsv($file, ["Username", "Email", "Password"]);
            }

            // --- Save user info as a new row ---
            fputcsv($file, [$username, $email, $hashedPassword]);
            fclose($file);

            print("<p style='color:green;'>Success! You have been registered 🧙‍♂️</p>");
        } else {
            print("<p style='color:red;'>Error: Unable to open Clients.csv</p>");
        }
    } else {
        $showForm = true;
        print("<p style='color:red;'>Error: The two passwords do not match. Please try again!</p>");
    }
}

// --- Display form if needed ---
if ($showForm) {
?>
    <h2>Register as an Apprentice Brewer 🧪</h2>
    <form method="POST" action="">
        <div>
            <label for="username">Adventurer Name:</label><br>
            <input type="text" name="username" id="username" required>
        </div>

        <div>
            <label for="email">Raven Address (Email):</label><br>
            <input type="email" name="email" id="email" required>
        </div>

        <div>
            <label for="password">Secret Word (Password):</label><br>
            <input type="password" name="password" id="password" required>
        </div>

        <div>
            <label for="confirm">Repeat Secret Word:</label><br>
            <input type="password" name="confirm" id="confirm" required>
        </div>

        <input type="submit" value="Join the Guild ✨">
    </form>
<?php
}
?>
</body>
</html>
