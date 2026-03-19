<?php
include_once("CommonCode.php");

// SECURITY CHECK: Kick out anyone not logged in
if (!$_SESSION["UserLogged"]) {
    header("Location: Login.php?lang=" . $language);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="Products.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Satchel | Pixel Potion Shop</title>
</head>
<body>

    <?php
    includeCSS("Products.css");
    $pageTitle = $arrayOfTranslations["ShopCartTitle"] ?? "Shopping Cart";
    NavigationBar($pageTitle);
    ?>

    <h2><?= $pageTitle ?></h2>

    <div class="cart-wrapper" style="max-width: 600px; margin: 0 auto; color: white; font-family: 'VT323'; font-size: 1.5rem;">
        <?php if (empty($_SESSION["Cart"])): ?>
            <p>Your satchel is empty!</p>
        <?php else: ?>
            <table style="width: 100%;">
                <tr style="border-bottom: 2px solid white;">
                    <th>Potion</th>
                    <th>Qty</th>
                    <th>Price</th>
                </tr>
                <?php
                foreach ($_SESSION["Cart"] as $itemId => $itemQuantity) {
                    $stmt = $connection->prepare("SELECT * FROM products WHERE ProductID = ?");
                    $stmt->bind_param("i", $itemId);
                    $stmt->execute();
                    $res = $stmt->get_result();
                    if ($row = $res->fetch_assoc()) {
                        $pName = ($language == "EN") ? $row["ProductNameEN"] : $row["ProductNamePT"];
                        echo "<tr>
                                <td>$pName</td>
                                <td style='text-align:center;'>$itemQuantity</td>
                                <td style='text-align:right;'>" . ($row['Price'] * $itemQuantity) . " EUR</td>
                              </tr>";
                    }
                }
                ?>
            </table>
        <?php endif; ?>
    </div>

</body>
</html>