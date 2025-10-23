
<html lang="en">
<head>
</head>
<body>

<?php
$carsAvailable = ["Volvo", "Saab", "Mercedes", "Audi", "Dacia"];

if (isset($_POST["fname"], $_POST["lname"], $_POST["cars"])) {
    if (!isset($carsAvailable[$_POST["cars"]])) {
        PRINT ("ha ha + youare a hacker ! Stop bothering me");
        die();
    }
    print("User " . $_POST["fname"] . " loves " . $_POST["cars"]);
}
?>

<form method="POST">
    <label for="fname">First name:</label><br>
    <input type="text" id="fname" name="fname"><br>
    <label for="lname">Last name:</label><br>
    <input type="text" id="lname" name="lname"><br>
    Pick your favourite car:
    <select name="cars" id="cars">
        <?php
        foreach ($carsAvailable as $i => $car) {
        ?>
            <option value="<?= $i ?>"><?= $car ?></option>
        <?php
        }
        ?>
    </select><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>
