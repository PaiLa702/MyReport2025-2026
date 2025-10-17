<?php

function NavigationBar($scallingPage)
{
?>
    <div class="navBar">
        <a <?php if ($scallingPage == "Home") print "class='highlight'"; ?> href="Home.php">Home</a>
        <a <?php if ($scallingPage == "Contact") print "class='highlight'"; ?> href="Contact.php">Contact</a>
        <a <?php if ($scallingPage == "Products") print "class='highlight'"; ?> href="Products.php">Products</a>
    </div>
<?php
}

?>