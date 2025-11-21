<?php

session_start();

if (isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    session_start();
}


//var_dump($_SESSION);
if (!isset($_SESSION["UserLogged"])) {
    $_SESSION["UserLogged"] = false;
}



$language = "EN";
if (isset($_GET["lang"])) {
    $language = $_GET["lang"];
}



$arrayOfTranslations = [];

$fileTranslations = fopen("Translations.csv", "r");
while (!feof($fileTranslations)) {
    $lineFromFile = fgets($fileTranslations);
    $piecesOfTranslations = explode(";", $lineFromFile);


    if ($language == "EN") {
        $arrayOfTranslations[$piecesOfTranslations[0]] = ($piecesOfTranslations[1]);
    } else {
        $arrayOfTranslations[$piecesOfTranslations[0]] = ($piecesOfTranslations[2]);
    }
}

?>

<div class="navBar">
    <?php

    ?>

    <a <?= ($callingPage == $arrayOfTranslations["HomeBtn"]) ? "class='highlight'" : ""; ?>
        href="Home.php?lang=<?= $language ?> < $language ?>"> <?= $arrayOfTranslations["HomeBtn"] ?></a>

    <a <?= ($callingPage == $arrayOfTranslations["ContactBtn"]) ? "class='highlight'" : ""; ?>
        href="Home.php?lang=<?= $language ?> < $language ?>"> <?= $arrayOfTranslations["ContactBtn"] ?></a>

    <a <?= ($callingPage == $arrayOfTranslations["ProductBtn"]) ? "class='highlight'" : ""; ?>
        href="Home.php?lang=<?= $language ?> < $language ?>"> <?= $arrayOfTranslations["ProductBtn"] ?></a>

    <a <?= ($callingPage == $arrayOfTranslations["RegisterBtn"]) ? "class='highlight'" : ""; ?>
        href="Home.php?lang=<?= $language ?> < $language ?>"> <?= $arrayOfTranslations["RegisterBtn"] ?></a>
    <?php
    if (!$_SESSION["UserLogged"]) {
    ?>
        <a <?= ($callingPage == $arrayOfTranslations["LoginBtn"]) ? "class='highlight'" : ""; ?>
            href="Login.php?lang=<?= $language ?>"> <?= $arrayOfTranslations["LoginBtn"] ?></a>
    <?php
    } else {
        print("Welcome, " . $_SESSION["Username"] . "!");
    ?>

        <form>
            <select name="lang" onchange="this.form.submit()">
                <option value="EN" <?php if ($language == "EN") print("selected"); ?>>English</option>
                <option value="PT" <?php if ($language == "PT") print("selected"); ?>>Portuguese</option>
            </select>
        </form>
</div>

<?php
    }
?>

<?php
function userAlreadyRegistered($checkedUser)
{
    $bReturnValue = false;
    $fHandler = fopen("Client.csv", "r");
    while (!feof($fHandler)) {
        $newLine = fgets($fHandler);
        $items = explode(";", $newLine);
        if ($items[0] == $checkedUser) {
            $bReturnValue = true;
        }
    }
    fclose($fHandler);
    return $bReturnValue;
}

?>