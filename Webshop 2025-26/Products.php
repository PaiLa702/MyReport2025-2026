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
    NavigationBar($arrayOfTranslations["ProductBtn"]);
    
    // Database connection
    $connection = new mysqli("localhost", "root", "", "Webshop2025_26");
    ?>

    <h2><?= $arrayOfTranslations["ProductTitle"] ?></h2>

    <div class="ProductItems">
        <?php
        $sqlQuery = $connection->prepare("SELECT * FROM Products;");
        $sqlQuery->execute();
        $result = $sqlQuery->get_result();

        while ($row = $result->fetch_assoc()) {
            // Check for at least 8 or 9 columns as per your DB structure
            if (count($row) >= 8) {
                $name = ($language == "EN") ? $row["ProductNameEN"] : $row["ProductNamePT"];
                $desc = ($language == "EN") ? $row["DescriptionEN"] : $row["DescriptionPT"];
                $effect = ($language == "EN") ? $row["EffectEN"] : $row["EffectPT"];
                $price = $row["Price"];
                $image = $row["ImageLink"];
                $id = $row["ProductID"]; 
        ?>
                <div class="OneProduct">
                    <div><?= $name ?></div>
                    <img src="Pictures/<?= $image ?>">
                    <div><?= $desc ?></div>
                    <div><?= $effect ?></div>
                    <div><?= $price ?>EUR</div>

                    <form method="POST" action="ShopCartContents.php?lang=<?= $language ?>" class="buy-container">
                        <input type="number" value="1" min="1" name="quantityToBuy" style="background-color: #8e6fff69; color: black; width: 50px;">
                        <input type="hidden" value="<?= $id ?>" name="itemToBuy">
                        <input type="submit" value="BUY" class="buy-button">
                    </form>
                </div>
        <?php
            }
        }
        $connection->close();
        ?>
    </div>

</body>
</html>