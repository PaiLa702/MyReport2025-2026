<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="ShopStyles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    include_once ("CommonCode.php");
    NavigationBar();
    ?>

    <div class="Products">
        <h2>Our Products</h2>

        <div class="ProductItem">
            <h3>Potion of Monday Motivation</h3>
            <p>Bright orange energy potion. Smells like coffee and broken dreams.</p>
            <p>Effect: Temporarily removes urge to go back to bed.</p>
            <p>Price: $10.00</p>
        </div>

        <div class="ProductItem">
            <h3>Late Homework Forgiveness Potion</h3>
            <p>Comes with a fake excuse scroll tied to the bottle.</p>
            <p>Effect: Won't actually help, but might make your teacher laugh.</p>
            <p>Price: $15.00</p>
        </div>

        <div class="ProductItem">
            <h3>Anger Management Vial</h3>
            <p>Red, smoky potion that cools when shaken.</p>
            <p>Effect: Prevents you from throwing your phone during group projects.</p>
            <p>Price: $20.00</p>
        </div>

    </div>

</body>
</html>