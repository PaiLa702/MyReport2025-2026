<?php
$language = "EN";
if (isset($_GET["lang"])) {
    $language = $_GET["lang"];
}


//print("Current language: " . $language);

$arrayOfTranslations = [];

$fileTranslations = fopen("Translations.csv", "r");
while (!feof($fileTranslations)) {
    $lineFromFile = fgets($fileTranslations);
    $piecesOfTranslations = explode(";", $lineFromFile);
    //$arrayOfTranslations[$piecesOfTranslations[0]] = ($language == "EN") ? $piecesOfTranslations[1] : $piecesOfTranslations[2];

    if($language == "EN") {
        $arrayOfTranslations[$piecesOfTranslations[0]] = ($piecesOfTranslations[1]);
    } else {
        $arrayOfTranslations[$piecesOfTranslations[0]] = ($piecesOfTranslations[2]);
    }
}

//var_dump($arrayOfTranslations);

function NavigationBar($callingPage)
{
    global $language;
    global $arrayOfTranslations;
    $navigationBarLinks = [
        $arrayOfTranslations["HomeBtn"] => "Home.php",
        $arrayOfTranslations["ContactBtn"] => "Contact.php",
        $arrayOfTranslations["ProductsBtn"] => "Products.php",
        $arrayOfTranslations["RegisterBtn"] => "Register.php",
    ];

?>

    <div class="navBar">
        <?php
        foreach ($navigationBarLinks as $keyVariable => $valueVariable) {
        ?>

            <a <?= ($callingPage == $keyVariable) ? "class='highlight'" : ""; ?>
                href="<?= $valueVariable ?>?lang=<?= $language ?>"> <?= $keyVariable ?> </a>;
        <?php
        }


        ?>
        <form>
            <select name="lang" onchange="this.form.submit()">
                <option value="EN" <?php if ($language == "EN") print("selected"); ?>>English</option>
                <option value="RO" <?php if ($language == "RO") print("selected"); ?>>Romanian</option>
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

    if (file_exists("Clients.csv")) {
        $fHandler = fopen("Clients.csv", "r");
        while (!feof($fHandler)) {
            $newLine = fgets($fHandler);
            $items = explode(";", trim($newLine));
            if ($items[0] === $checkedUser) {
                $bReturnValue = true;
                break;
            }
        }
        fclose($fHandler);
    }

    return $bReturnValue;
}
?>