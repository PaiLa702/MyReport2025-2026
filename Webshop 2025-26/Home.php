<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="ShopStyles.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    include_once("CommonCode.php");
    NavigationBar("Home");
    ?>


    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&family=Press+Start+2P&family=VT323&display=swap" rel="stylesheet">

    <div class="homepage">
        
        <h1><?= $arrayOfTranslations["HomeTitle"]?></h1>
        <p><?= $arrayOfTranslations["HomeText"]?></p>
        <img src="Pictures/wizard.gif" style="width:300px; height:auto;">
    </div>

</body>

</html>