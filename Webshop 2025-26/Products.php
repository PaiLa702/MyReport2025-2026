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
            <h3>Product 1</h3>
            <p>Description of Product 1.</p>
            <p>Price: $10.00</p>
        </div>

        <div class="ProductItem">
            <h3>Product 2</h3>
            <p>Description of Product 2.</p>
            <p>Price: $15.00</p>
        </div>

        <div class="ProductItem">
            <h3>Product 3</h3>
            <p>Description of Product 3.</p>
            <p>Price: $20.00</p>
        </div>

    </div>
</body>
</html>