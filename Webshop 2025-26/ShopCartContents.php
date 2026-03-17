<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="Products.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potions | Pixel Potion Shop</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&family=Press+Start+2P&family=VT323&display=swap" rel="stylesheet">
</head>

<body>

    <?php
    include_once("CommonCode.php");
    includeCSS("Products.css");
    $pageTitle = $arrayOfTranslations["ShopCartTitle"] ?? "Shopping Cart";
    NavigationBar($pageTitle);
    ?>

    <h2><?= $pageTitle ?></h2>

    <?php
    foreach ($_SESSION['cart'] as $productId => $quantity) {
    ?>
        <tr>
            <td><?= $productId ?></td>
            <td><?= $quantity ?></td>
        </tr>
    <?php
    }
    ?>

</body>

</html>