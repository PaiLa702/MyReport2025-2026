<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="ShopStyles.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&display=swap" rel="stylesheet">
    <style>
    </style>
</head>

<body>

    <?php
    include_once("CommonCode.php");
    NavigationBar("Products");
    ?>


    <h2>Our Products</h2>

    <style>
        input[type="number"] {
            background-color: #8e6fff69;
            color: black;
        }
    </style>
    <div class="AllProducts">
        <div class="ProductItem">
            <img src="Pictures/Potion_Motivation.png" alt="Potion of Monday Motivation" class="ProductImage">
            <h3>Potion of Monday Motivation</h3>
            <p>Bright orange energy potion. Smells like coffee and broken dreams.</p>
            <p>Effect: Temporarily removes urge to go back to bed.</p>
            <p>Price: $14.00</p>
            <label for="qty_motivation">Quantity:</label>
            <input type="number" id="qty_motivation" name="qty_motivation" min="1" value="1">
        </div>

        <div class="ProductItem">
            <img src="Pictures/Potion_Forgiveness.png" alt="Late Homework Forgiveness Potion" class="ProductImage">
            <h3>Late Homework Forgiveness Potion</h3>
            <p>Purple potion that comes with a fake excuse scroll tied to the bottle.</p>
            <p>Effect: Won't actually help, but might make your teacher laugh.</p>
            <p>Price: $16.00</p>
            <label for="qty_forgiveness">Quantity:</label>
            <input type="number" id="qty_forgiveness" name="qty_forgiveness" min="1" value="1">
        </div>

        <div class="ProductItem">
            <img src="Pictures/Anger_Vial.png" alt="Anger Management Vial" class="ProductImage">
            <h3>Anger Management Vial</h3>
            <p>A shimmering blue potion that clears distractions and boosts concentration.</p>
            <p>Effect: Lets you study for hours without checking your phone (well… almost).</p>
            <p>Price: $22.00</p>
            <label for="qty_anger">Quantity:</label>
            <input type="number" id="qty_anger" name="qty_anger" min="1" value="1">
        </div>

        <div class="ProductItem">
            <img src="Pictures/Potion_Focus.png" alt="Potion of Infinite Focus" class="ProductImage">
            <h3>Potion of Infinite Focus</h3>
            <p>Bright blue energy potion. Smells like coffee and broken dreams.</p>
            <p>Effect: Temporarily removes urge to go back to bed.</p>
            <p>Price: $12.00</p>
            <label for="qty_focus">Quantity:</label>
            <input type="number" id="qty_focus" name="qty_focus" min="1" value="1">
        </div>

        <div class="ProductItem">
            <img src="Pictures/Confidence_Elixir.png" alt="Confidence Elixir" class="ProductImage">
            <h3>Confidence Elixir</h3>
            <p>A bright golden liquid that radiates warmth.</p>
            <p>Effect: Temporarily boosts self-esteem — perfect before presentations or first dates.</p>
            <p>Price: $18.00</p>
            <label for="qty_confidence">Quantity:</label>
            <input type="number" id="qty_confidence" name="qty_confidence" min="1" value="1">
        </div>

        <div class="ProductItem">
            <img src="Pictures/Potion_Procrastination.png" alt="Potion of Eternal Procrastination" class="ProductImage">
            <h3>Potion of Eternal Procrastination</h3>
            <p>A swirling teal and purple mixture that looks lazy just sitting there.</p>
            <p>Effect: Makes you feel productive while achieving absolutely nothing.</p>
            <p>Price: $29.00</p>
            <label for="qty_procrastination">Quantity:</label>
            <input type="number" id="qty_procrastination" name="qty_procrastination" min="1" value="1">
        </div>
    </div>


</body>

</html>