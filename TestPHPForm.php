<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $carsAavailable = ["Volvo", "BMW", "Toyota", "Honda", "Mercedes", "Opel"];

    if (isset($_GET["lname"], $_GET["cars"])) {
        print("User " . $_GET["fname"] . " loves " . $_GET["cars"]);
    }
    ?>

    <form>
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname"><br>
        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname"><br>
        Pick your favorite car:
        <select name="cars" id="cars">
            <?php
            foreach ($carsAavailable as $i => $car ) {
            ?>
                <option value="<?= $i ?>"> <?= $car ?> </option>
            <?php
            }
            ?>
        </select><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>