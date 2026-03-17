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
    
    
    $connection = new mysqli("localhost", "root", "", "Webshop2025_26");

    
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    ?>

    <h2><?= $arrayOfTranslations["ProductTitle"] ?></h2>

    <div class="ProductItems">
        <?php
        $sqlQuery = $connection->prepare("SELECT * FROM products;");
        $sqlQuery->execute();
        $result = $sqlQuery->get_result();

        while ($row = $result->fetch_assoc()) {
            
            if (count($row) >= 9) {
                $name = ($language == "EN") ? $row["ProductNameEN"] : $row["ProductNamePT"];
                $desc = ($language == "EN") ? $row["DescriptionEN"] : $row["DescriptionPT"];
                $effect = ($language == "EN") ? $row["EffectEN"] : $row["EffectPT"];
                $price = $row["Price"];
                $image = $row["ImageLink"];
                $id = $row["ProductID"]; 
        ?>
                <div class="OneProduct">
                    <h3><?= $name ?></h3>
                    <img src="Pictures/<?= $image ?>" alt="<?= $name ?>">
                    <p class="description"><?= $desc ?></p>
                    <p class="effect"><em><?= $effect ?></em></p>
                    <p class="price"><strong><?= $price ?> EUR</strong></p>

                    <form method="POST" action="CartHandler.php" class="buy-container">
                        <input type="number" placeholder="Qty" name="quantityToBuy">
                        <input type="hidden" name="product_id" value="<?= $id ?>" name="itemToBuy">
                        <input type="submit" value="BUY">
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