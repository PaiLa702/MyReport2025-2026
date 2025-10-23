<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="ShopStyles.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join the Guild | Pixel Potion Shop</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Cinzel+Decorative&family=VT323&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    include_once("CommonCode.php");
    NavigationBar("Register");
    ?>

    <?php
    $showForm = true;


    if (isset($_POST['username'], $_POST['password'], $_POST['passwordAgain'])) {
        $showForm = false;
        print "<div class='register'><p>✨ Registration in progress...</p>";


        if ($_POST['password'] == $_POST['passwordAgain'] && !userAlreadyRegistered($_POST['username'])) {
            print "<p>✅ Passwords match! Welcome, apprentice brewer <strong>{$_POST['username']}</strong>.<br>";
            print "Your scroll of membership is being recorded in the guild archives...</p>";


            $fileHandler = fopen("Clients.csv", "a");
            fwrite($fileHandler, "\n" . $_POST['username'] . ";" . $_POST['password']);
            fclose($fileHandler);

            print "<p>🪄 Registration successful!</p></div>";
        } else {
            $showForm = true;
            print "<p>❌ Error: Either your passwords do not match, or the adventurer name already exists.<br>";
            print "Please try again, noble brewer!</p></div>";
        }
    }

    if ($showForm) {
    ?>
        <section class="register">
            <h2>Register as an Apprentice Brewer 🧪</h2>
            <p>Join the guild and start your potion-making journey!
                Gain access to secret recipes, member-only discounts, and exclusive magical brews.</p>

            <form class="register-form" method="POST">
                <label for="username">Adventurer Name:</label>
                <input type="text" id="username" name="username" placeholder="e.g., Elara the Swift" required>

                <label for="password">Secret Word (Password):</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required>

                <label for="passwordAgain">Repeat Secret Word:</label>
                <input type="password" id="passwordAgain" name="passwordAgain" placeholder="••••••••" required>

                <button type="submit">Join the Guild ✨</button>
            </form>
        </section>
    <?php
    }
    ?>
</body>

</html>