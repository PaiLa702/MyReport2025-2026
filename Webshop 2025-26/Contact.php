<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="ShopStyles.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&family=Press+Start+2P&family=VT323&display=swap" rel="stylesheet">

</head>

<body>

    <?php
    include_once("CommonCode.php");
    NavigationBar();
    ?>

     <section class="contact">
        <h2>Contact the Potion Master</h2>
        <p>Need help with your order, a replacement bottle, or a custom brew idea? Send us a message below and we’ll respond faster than a teleportation spell!</p>

        
            <form class="contact-form">
                <label for="name">Adventurer Name:</label>
                <input type="text" id="name" placeholder="e.g., Merlin the Focused">

                <label for="email">Raven Address (Email):</label>
                <input type="email" id="email" placeholder="you@example.com">

                <label for="subject">Potion Inquiry:</label>
                <input type="text" id="subject" placeholder="Which potion calls to you?">

                <label for="message">Your Message:</label>
                <textarea id="message" rows="5" placeholder="Type your message spell here..."></textarea>

                <button type="submit">Send Your Scroll ✉️</button>
            </form>

        

        <div class="contact-details">
            <p>🦉 <strong>Raven Address:</strong> support@pixelpotions.shop</p>
            <p>🔮 <strong>Crystal Ball Hotline:</strong> +1 (555) MAGIC-01</p>
            <p>🏰 <strong>Workshop Location:</strong> Somewhere between reality and imagination.</p>
        </div>
    </section>


</body>

</html>