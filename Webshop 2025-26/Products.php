<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="Products.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&display=swap" rel="stylesheet">
    <style>
    </style>
</head>

<body>

    <?php
    include_once("CommonCode.php");
    includeCSS("Products.css");
    NavigationBar($arrayOfTranslations["ProductBtn"]);
    $connection = new mysqli("localhost", "root","","Webshop2025_26");
    ?>


    <h2><?= $arrayOfTranslations["ProductTitle"] ?></h2>

    <style>
        input[type="number"] {
            background-color: #8e6fff69;
            color: black;
        }
    </style>

    <div class="ProductItems">
        <?php
       $sqlQuery = $connection->prepare("SELECT * FROM products;");
        $sqlQuery->execute();
        $result = $sqlQuery->get_result();
        while ($row=$result->fetch_assoc()) {
            if (count($row) == 9) {
        ?>
                <div class="OneProduct">
                    <div><?= $row[$language == "EN" ? "ProductNameEN" : "ProductNamePT"] ?></div>
                    <img src=" Pictures/<?= $row["ImageLink"] ?>">
                    <div><?= $row[$language == "EN" ? "DescriptionEN" : "DescriptionPT"] ?></div>
                    <div><?= $row[$language == "EN" ? "EffectEN" : "EffectPT"] ?></div>
                    <div><?= $row["Price"] ?>EUR</div>
                </div>
        <?php
            }
        }
        ?>
    </div>

</body>

</html>