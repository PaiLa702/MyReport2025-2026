<?php
include_once("CommonCode.php");

//ADD TO CART
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['product_id'])) {
    // Initialize the cart if it's empty
    if (!isset($_SESSION["Cart"])) {
        $_SESSION["Cart"] = [];
    }

    $idToAdd = $_POST['product_id'];

    //If item exists, increase quantity
    if (isset($_SESSION["Cart"][$idToAdd])) {
        $_SESSION["Cart"][$idToAdd]++;
    } else {
        $_SESSION["Cart"][$idToAdd] = 1;
    }

    header("Location: ShopCartContents.php?lang=" . $language);
    exit();
}

if (!isset($_SESSION["UserLogged"]) || $_SESSION["UserLogged"] !== true || $_SESSION["UserType"] === "Admin") {
    header("Location: Home.php?lang=" . $language);
    exit();
}

//REMOVE
if (isset($_GET['remove'])) {
    $idToRemove = $_GET['remove'];
    if (isset($_SESSION["Cart"][$idToRemove])) {
        unset($_SESSION["Cart"][$idToRemove]);
    }
    header("Location: ShopCartContents.php?lang=" . $language);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="Products.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $arrayOfTranslations["ShopCartTitle"] ?? "Your Alchemy Satchel" ?> | Pixel Potion Shop</title>
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
                <p><?= $arrayOfTranslations["CartEmptyMsg"] ?? "Your satchel is empty, traveler..." ?></p>
                <a href="Products.php?lang=<?= $language ?>" class="back-link">
                    <?= $arrayOfTranslations["CartReturnBtn"] ?? "Return to Shop" ?>
                </a>
            </div>
        <?php else: ?>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th><?= $arrayOfTranslations["CartTablePotion"] ?? "POTION" ?></th>
                        <th style="text-align: center;"><?= $arrayOfTranslations["CartTableQty"] ?? "QTY" ?></th>
                        <th style="text-align: right;"><?= $arrayOfTranslations["CartTablePrice"] ?? "PRICE" ?></th>
                        <th style="text-align: center;"><?= $arrayOfTranslations["CartTableAction"] ?? "REMOVE" ?></th>
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
                            <td style="text-align: center;">
                                <a href="ShopCartContents.php?lang=<?= $language ?>&remove=<?= $itemId ?>" class="remove-btn" style="color: #ff4b2b; text-decoration: none; font-weight: bold; font-size: 1.2rem;">&times;</a>
                            </td>
                        </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr class="cart-total-row">
                        <td colspan="2"><?= $arrayOfTranslations["CartGrandTotal"] ?? "GRAND TOTAL" ?></td>
                        <td style="text-align: right;"><?= number_format($grandTotal, 2) ?> EUR</td>
                        <td></td> 
                    </tr>
                </tfoot>
            </table>

            <div class="cart-actions">
                <a href="Products.php?lang=<?= $language ?>" class="continue-btn">
                    <?= $arrayOfTranslations["CartContinueBtn"] ?? "Continue Shopping" ?>
                </a>
                <button class="checkout-btn">
                    <?= $arrayOfTranslations["CartFinalizeBtn"] ?? "Finalize Order" ?>
                </button>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>