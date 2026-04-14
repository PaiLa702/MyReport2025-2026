<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="Products.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potions | Pixel Potion Shop</title>
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
        $sqlQuery = $connection->prepare("SELECT * FROM Products;");
        $sqlQuery->execute();
        $result = $sqlQuery->get_result();

        while ($row = $result->fetch_assoc()) {
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

                <?php 
                //Only show the BUY button if the user is logged in AND is a regular customer
                if ($_SESSION["UserLogged"] && $_SESSION["UserType"] === "regular") : 
                ?>
                   <form method="POST" action="Products.php?lang=<?= $language ?>" class="buy-container">
                        <input type="number" value="1" min="1" name="quantityToBuy" style="background-color: #8e6fff69; color: black; width: 40px;">
                        <input type="hidden" value="<?= $id ?>" name="itemToBuy">
                        <input type="submit" value="BUY" class="buy-button">
                    </form>

                <?php 

                //If logged in but user is Admin disable purchasing
                elseif ($_SESSION["UserLogged"] && $_SESSION["UserType"] === "Admin") : 
                ?>
                <p style="font-size: 0.7rem; color: #ffbcff; margin-bottom: 15px;">
                     <?= $arrayOfTranslations["AdminPurchaseDisabled"]?>
                </p>

                <?php 
                //Otherwise user is not logged in
                else: 
                ?>
                <p style="font-size: 0.7rem; color: #ffbcff; margin-top: 10px;">
                    <?= $arrayOfTranslations["LoginToPurchase"] ?? "Login to Purchase" ?>
                </p>
                <?php endif; ?>
            </div>
            
        <?php
        }
        $connection->close();
        ?>
    </div>
</body>
</html>