<?php
include_once("CommonCode.php");
includeCSS("Products.css");

NavigationBar("Products");

$sql = "SELECT * FROM products";
$result = $connection->query($sql);

echo "<div class='product-container'>";

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $image = $row['ImageLink'];
        $rarity = $row['Rarity'] ?? 'Common';
        $rarityClass = strtolower($rarity);

        $name = ($language === "EN") ? $row['ProductNameEN'] : $row['ProductNamePT'];
        $desc = ($language === "EN") ? $row['DescriptionEN'] : $row['DescriptionPT'];
        $effect = ($language === "EN") ? $row['EffectEN'] : $row['EffectPT'];
?>

        <div class="product-card rarity-<?= $rarityClass ?>">
            <div class="rarity-badge"><?= strtoupper($rarity) ?></div>

            <div class="image-section">
                <img src="Pictures/<?= htmlspecialchars($image) ?>" alt="<?= htmlspecialchars($name) ?>">
            </div>

            <div class="info-section">
                <h3><?= htmlspecialchars($name) ?></h3>
                <p class="price"><?= number_format($row['Price'], 2) ?> EUR</p>
                <p class="description"><?= htmlspecialchars($desc) ?></p>

                <div class="effect-box">
                    <span class="effect-label">EFFECT:</span> <?= htmlspecialchars($effect) ?>
                </div>
            </div>

            <?php if (isset($_SESSION["UserType"]) && $_SESSION["UserType"] !== "Admin") : ?>
                <form method="POST" action="ShopCartContents.php" class="buy-form">
                    <input type="hidden" name="product_id" value="<?= $row['ProductID'] ?>">
                    <button type="submit" class="buy-btn">ADD TO CART</button>
                </form>
            <?php else : ?>
                <div class="admin-lock">
                    <p>VIEWING AS ADMIN</p>
                    <span>PURCHASE DISABLED</span>
                </div>
            <?php endif; ?>
        </div>

<?php
    }
} else {
    echo "<p class='empty-msg'>The shop is currently empty. Check back after the next ritual.</p>";
}

echo "</div>";
?>