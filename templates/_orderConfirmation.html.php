<div class="container">
    <h3><?= $pageHeading ?></h3>
        <?php if($orderId>0):?>
            <h2>Order Summary</h2>
                <div class ="container">
                    <ul>
                        <li>Order Number: <?= esc($orderId) ?></li>
                        <li>First Name: <?= esc($firstName ?? "") ?></li>
                        <li>Last Name: <?= esc($lastName ?? "") ?></li>
                        <li>Email: <?= esc($email ?? "") ?></li>
                        <li>Address: <?= esc($address ?? "") ?></li>
                        <li>Phone: <?= esc($phone ?? "") ?></li>     
                </div>
                <h2>Order Total Price: $<?= esc($cart->calculateTotal()) ?></h2>
                <p>Thank you, your order number is <?= $orderId ?></p>
            <?php else: ?>
            <p>Something went wrong and the order was not placed</p>
        <?php endif; ?>
    
    <p><a href="cart.php">Back to the start</a></p>
</div>