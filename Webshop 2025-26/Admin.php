<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel | Pixel Potion Shop</title>
    <link rel="stylesheet" type="text/css" href="Admin.css?v=<?php echo time(); ?>">

</head>

<body>
<?php
include_once("CommonCode.php"); includeCSS("Admin.css");

// Check if user is Admin
if (!$_SESSION["UserLogged"] || $_SESSION["UserType"] !== "Admin") {
    echo "<p style='text-align:center; margin-top:50px; color:red;'>Access denied. Admins only.</p>";
    echo "<p style='text-align:center;'><a href='Home.php?lang=$language'>Return Home</a></p>";
    exit;
}

NavigationBar($arrayOfTranslations["AdminBtn"] ?? "Admin Panel");


$message = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $productNameEN = trim($_POST["productNameEN"]);
    $productNamePT = trim($_POST["productNamePT"]);
    $imageLink = trim($_POST["imageLink"]);
    $price = trim($_POST["price"]);
    $descriptionEN = trim($_POST["descriptionEN"]);
    $effectEN = trim($_POST["effectEN"]);
    $descriptionPT = trim($_POST["descriptionPT"]);
    $effectPT = trim($_POST["effectPT"]);

    if ($productNameEN && $productNamePT && $imageLink && $price) {
        $fileHandler = fopen("Products.csv", "a");
        fwrite($fileHandler, "\n$productNameEN;$imageLink;$price;$descriptionEN;$effectEN;$descriptionPT;$effectPT;$productNamePT");
        fclose($fileHandler);
        $message = "<div class='success'>Product successfully added!</div>";
    } else {
        $message = "<div class='error'>Please fill in all required fields.</div>";
    }
}
?>

<div class="register" style="max-width:600px; margin:50px auto;">
    <h2>Admin Panel - Create Product</h2>
    <?= $message ?>
    <form method="POST">
        <label>Product Name (EN)</label>
        <input type="text" name="productNameEN" required>

        <label>Product Name (PT)</label>
        <input type="text" name="productNamePT" required>

        <label>Image Link</label>
        <input type="text" name="imageLink" required>

        <label>Price (EUR)</label>
        <input type="number" name="price" step="0.01" required>

        <label>Description (EN)</label>
        <input type="text" name="descriptionEN">

        <label>Effect (EN)</label>
        <input type="text" name="effectEN">

        <label>Description (PT)</label>
        <input type="text" name="descriptionPT">

        <label>Effect (PT)</label>
        <input type="text" name="effectPT">

        <button type="submit">Add Product</button>
    </form>
</div>

</body>
</html>
