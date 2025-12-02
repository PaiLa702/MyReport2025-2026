<?php
session_start();

// Logout
if (isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    session_start();
}

// User login state
if (!isset($_SESSION["UserLogged"])) {
    $_SESSION["UserLogged"] = false;
}

// Language
$language = isset($_GET["lang"]) ? $_GET["lang"] : "EN";

// Load translations
$arrayOfTranslations = [];
$fileTranslations = fopen("Translations.csv", "r");

while (($line = fgets($fileTranslations)) !== false) {

    $line = trim($line);
    if ($line === "") continue;

    $pieces = explode(";", $line);
    if (count($pieces) < 3) continue;

    $key = $pieces[0];
    $arrayOfTranslations[$key] = ($language === "EN") ? $pieces[1] : $pieces[2];
}

fclose($fileTranslations);


// ------------------------------------------------
// NAVIGATION BAR FUNCTION
// ------------------------------------------------
function NavigationBar($callingPage)
{
    global $arrayOfTranslations, $language;
?>
    <div class="navBar">

        <a href="Home.php?lang=<?= $language ?>"
            <?= ($callingPage === $arrayOfTranslations["HomeBtn"]) ? "class='highlight'" : "" ?>>
            <?= $arrayOfTranslations["HomeBtn"] ?>
        </a>

        <a href="Contact.php?lang=<?= $language ?>"
            <?= ($callingPage === $arrayOfTranslations["ContactBtn"]) ? "class='highlight'" : "" ?>>
            <?= $arrayOfTranslations["ContactBtn"] ?>
        </a>

        <a href="Products.php?lang=<?= $language ?>"
            <?= ($callingPage === $arrayOfTranslations["ProductBtn"]) ? "class='highlight'" : "" ?>>
            <?= $arrayOfTranslations["ProductBtn"] ?>
        </a>

        <a href="Register.php?lang=<?= $language ?>"
            <?= ($callingPage === $arrayOfTranslations["RegisterBtn"]) ? "class='highlight'" : "" ?>>
            <?= $arrayOfTranslations["RegisterBtn"] ?>
        </a>

        <?php if (!$_SESSION["UserLogged"]) : ?>
            <a href="Login.php?lang=<?= $language ?>"
                <?= ($callingPage === $arrayOfTranslations["LoginBtn"]) ? "class='highlight'" : "" ?>>
                <?= $arrayOfTranslations["LoginBtn"] ?>
            </a>
        <?php else: ?>
            <span>Welcome, <?= $_SESSION["Username"] ?>!</span>
        <?php endif; ?>

        <!-- Always-visible language selector -->
        <form method="get" style="display:inline-block; margin-left:20px;">
            <select name="lang" onchange="this.form.submit()">
                <option value="EN" <?= ($language == "EN") ? "selected" : "" ?>>English</option>
                <option value="PT" <?= ($language == "PT") ? "selected" : "" ?>>Portuguese</option>
            </select>
        </form>

    </div>
<?php
}
?>


<?php
// --------------------------------------------------------
// Helper function
// --------------------------------------------------------
function userAlreadyRegistered($checkedUser)
{
    $fHandler = fopen("Client.csv", "r");

    while (!feof($fHandler)) {
        $line = trim(fgets($fHandler));
        if ($line == "") continue;

        $items = explode(";", $line);

        if ($items[0] == $checkedUser) {
            fclose($fHandler);
            return true;
        }
    }

    fclose($fHandler);
    return false;
}
?>
