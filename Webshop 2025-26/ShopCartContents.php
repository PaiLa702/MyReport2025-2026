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
    
    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
        </tr>

    <?php
    foreach ($_SESSION["Cart"] as $itemId => $itemQuantity) {
    ?>
    <tr>
        <td><?= $itemId ?></td>
        <td><?= $itemQuantity ?></td>
    </tr>
    <?php
    }
    ?>

    </table>

</body>

</html>