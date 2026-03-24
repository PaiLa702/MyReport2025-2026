<?php
include_once("CommonCode.php");

if (!isset($_SESSION["UserLogged"]) || $_SESSION["UserLogged"] !== true) {
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
    includeCSS("ShopCart.css");
    $pageTitle = $arrayOfTranslations["ShopCartTitle"] ?? "Your Alchemy Satchel";
    NavigationBar($pageTitle);
    ?>

    <h2 class="cart-title"><?= $pageTitle ?></h2>

    <div class="cart-wrapper">
        <?php if (empty($_SESSION["Cart"])): ?>
            <div class="empty-cart-msg">
                <p>Your satchel is empty, traveler...</p>
                <a href="Products.php?lang=<?= $language ?>" class="back-link">Return to Shop</a>
            </div>

        <?php else: ?>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Potion</th>
                        <th style="text-align: center;">Qty</th>
                        <th style="text-align: right;">Price</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $grandTotal = 0;
                    foreach ($_SESSION["Cart"] as $itemId => $qty) {
                        $stmt = $connection->prepare("SELECT * FROM products WHERE ProductID = ?");
                        $stmt->bind_param("i", $itemId);
                        $stmt->execute();
                        $res = $stmt->get_result();
                        
                        if ($row = $res->fetch_assoc()) {
                            $pName = ($language == "EN") ? $row["ProductNameEN"] : $row["ProductNamePT"];
                            $subtotal = $row['Price'] * $qty;
                            $grandTotal += $subtotal;
                    ?>
                        <tr>
                            <td class="potion-name"><?= htmlspecialchars($pName) ?></td>
                            <td style="text-align: center;"><?= $qty ?></td>
                            <td style="text-align: right;" class="gold-text"><?= number_format($subtotal, 2) ?> EUR</td>
                        </tr>
                    <?php
                        }
                    }
                    ?>

                </tbody>
                
                <tfoot>
                    <tr class="cart-total-row">
                        <td colspan="2">GRAND TOTAL</td>
                        <td style="text-align: right;"><?= number_format($grandTotal, 2) ?> EUR</td>
                    </tr>
                </tfoot>
            </table>

            <div class="cart-actions">
                <a href="Products.php?lang=<?= $language ?>" class="continue-btn">Continue Shopping</a>
                <button class="checkout-btn">Finalize Order</button>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>