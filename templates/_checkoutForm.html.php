<?php
?>

<div class="container">
    <h3>Checkout</h3>
        <form method="post" action="thanks.php" id="checkout">
                <fieldset>
                    <legend>Delivery Details</legend>
                        <?php
                            if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
                                echo "<div class='error'>";
                                foreach ($_SESSION['errors'] as $error) {
                                    echo "<p>" . htmlspecialchars($error) . "</p>";
                                }
                                echo "</div>";
                                unset($_SESSION['errors']); // Clear errors after displaying them
                            }
                        ?>
                        <p>
                        <label for="firstName">First Name:</label>
                        <input type="text" id="firstName" name="firstName">
                        </p>
                        <p>
                        <label for="lastName">Last Name:</label>
                        <input type="text" id="lastName" name="lastName">
                        </p>
                        <p>
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address">
                        </p>
                        <p>
                        <label for="phone">Phone:</label>
                        <input type="text" id="phone" name="phone">
                        </p>
                        <p>
                        <label for="email">Email:</label>
                        <input type="text" id="email" name="email">
                        </p>
                </fieldset>

                <fieldset>
                      <legend>Payment</legend>
                        <p>
                        <label for="creditcard">Credit card number:</label>
                        <input type="text" id="creditcard" name="creditcard">
                        </p>
                        <p>
                        <label for="nameOnCard">Name on card:</label>
                        <input type="text" id="nameOnCard" name="nameOnCard">
                        </p>
                        <p>
                        <label for="expiry">Expiry date:</label>
                        <input type="text" id="expiry" name="expiry">
                        </p>
                        <p>
                        <label for="csv">CSV:</label>
                        <input type="text" id="csv" name="csv">
                        </p>
                        <p><input type="submit" name="pay" value="Pay"></p>
                  </fieldset>
          </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="scripts/registerPageValidation.js"></script>
