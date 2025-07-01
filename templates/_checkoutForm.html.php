
<div class="container">
    <h3>Checkout</h3>
        <form method="post" action="checkout.php" id="checkout">
                <fieldset>
                    <legend>Delivery Details</legend>
                        <p>
                        <label for="firstName">First Name:</label>
                        <input type="text" id="firstName" name="firstName" value="<?= htmlspecialchars($firstName) ?>">
                        <?php if (isset($errors["firstName"])): ?>
                        <span class="error"><?= $errors["firstName"] ?></span>
                        <?php endif; ?>
                        </p>
                        <p>
                        <label for="lastName">Last Name:</label>
                        <input type="text" id="lastName" name="lastName" value="<?= htmlspecialchars($lastName) ?>">
                        <?php if (isset($errors["lastName"])): ?>
                        <span class="error"><?= $errors["lastName"] ?></span>
                        <?php endif; ?>
                        </p>
                        <p>
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" value="<?= htmlspecialchars($address) ?>">
                        <?php if (isset($errors["address"])): ?>
                        <span class="error"><?= $errors["address"] ?></span>
                        <?php endif; ?>
                        </p>
                        <p>
                        <label for="phone">Phone:</label>
                        <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($phone) ?>">
                        <?php if (isset($errors["phone"])): ?>
                        <span class="error"><?= $errors["phone"] ?></span>
                        <?php endif; ?>
                        </p>
                        <p>
                        <label for="email">Email:</label>
                        <input type="text" id="email" name="email" value="<?= htmlspecialchars($email) ?>">
                        <?php if (isset($errors["email"])): ?>
                        <span class="error"><?= $errors["email"] ?></span>
                        <?php endif; ?>
                        </p>
                </fieldset>

                <fieldset>
                      <legend>Payment</legend>
                        <p>
                        <label for="creditcard">Credit card number:</label>
                        <input type="text" id="creditcard" name="creditcard" value="<?= htmlspecialchars($creditcard) ?>">
                        <?php if (isset($errors["creditcard"])): ?>
                        <span class="error"><?= $errors["creditcard"] ?></span>
                        <?php endif; ?>
                        </p>
                        <p>
                        <label for="nameOnCard">Name on card:</label>
                        <input type="text" id="nameOnCard" name="nameOnCard" value="<?= htmlspecialchars($nameOnCard) ?>">
                        <?php if (isset($errors["nameOnCard"])): ?>
                        <span class="error"><?= $errors["nameOnCard"] ?></span>
                        <?php endif; ?>
                        </p>
                        <p>
                        <label for="expiry">Expiry date:</label>
                        <input type="text" id="expiry" name="expiry" value="<?= htmlspecialchars($expiry) ?>">
                        <?php if (isset($errors["expiry"])): ?>
                        <span class="error"><?= $errors["expiry"] ?></span>
                        <?php endif; ?>
                        </p>
                        <p>
                        <label for="csv">CSV:</label>
                        <input type="text" id="csv" name="csv" value="<?= htmlspecialchars($csv) ?>">
                        <?php if (isset($errors["csv"])): ?>
                        <span class="error"><?= $errors["csv"] ?></span>
                        <?php endif; ?>
                        </p>
                        <p><input type="submit" name="pay" value="Pay"></p>
                  </fieldset>
          </form>
</div>
<script src="scripts/checkoutValidation.js"></script>
