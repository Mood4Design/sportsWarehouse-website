<?php
  
  // References/includes
  // require_once __DIR__ . "/../includes/formHelpers.php";
  // require_once ROOT_DIR . "includes/formHelpers.php";
  require_once INCLUDES_DIR . "formHelpers.php";

?>
<section class="section-bar">
  <div class="container">
      <h3>Login</h3>
        <p>Please fill out the login form.</p>
        <?php include TEMPLATES_DIR . "_errorSummary.html.php" ?>
          <form action="login.php" method="post" novalidate>
            <fieldset>
              <legend>Personal information</legend>
              <div class="form-row">
                <label for="firstName">First name:</label>
                <input type="text" id="firstName" name="firstName" placeholder="First name" required <?= setValue("firstName") ?>>
              </div>

              <div class="form-row">
                <label for="lastName">Last name:</label>
                <input type="text" id="lastName" name="lastName" placeholder="Last name" <?= setValue("lastName") ?>>
              </div>

              <div class="form-row">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="name@email.com" <?= setValue("email") ?>>
              </div>

              <div class="form-row">
                <label for="password1">Password:</label>
                <input type="password" id="password1" name="password1" placeholder="Must be 10+ characters" <?= setValue("password1") ?>>
              </div>

              <div class="form-row">
                <label for="password2">Re-type Password:</label>
                <input type="password" id="password2" name="password2" placeholder="Must Match Password" <?= setValue("password2") ?>>
              </div>

              <div class="form-row">
                <input type="checkbox" name="newsletter" id="newsletter" value="yes" <?= setChecked("newsletter", "yes") ?>>
                <label for="newsletter">Sign up to newsletter?</label>
              </div>

              <div class="form-row">
                <input type="checkbox" name="terms" id="terms" value="yes" <?= setChecked("terms", "yes") ?>>
                <label for="terms">Agree to terms &amp; conditions</label>
              </div>

              <div class="form-row">
                <!-- <button type="submit" name="action" value="register">Login</button> -->
                <button type="submit" name="submitLogin">Login</button>
              </div>
            </fieldset>
          </form>
    </div>
</section>