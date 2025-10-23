<?php

function NavigationBar($scallingPage)
{
?>
    <div class="navBar">
        <a <?php if ($scallingPage == "Home") print "class='highlight'"; ?> href="Home.php">Home</a>
        <a <?php if ($scallingPage == "Contact") print "class='highlight'"; ?> href="Contact.php">Contact</a>
        <a <?php if ($scallingPage == "Products") print "class='highlight'"; ?> href="Products.php">Products</a>
        <a <?php if ($scallingPage == "Register") print "class='highlight'"; ?> href="Register.php">Register</a>
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