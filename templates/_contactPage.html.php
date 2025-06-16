<?php
  
  // References/includes
  // require_once __DIR__ . "/../includes/formHelpers.php";
  // require_once ROOT_DIR . "includes/formHelpers.php";
  require_once INCLUDES_DIR . "formHelpers.php";

?>
<section class="section-bar">
    <div class="container">
       <h3>Contact Us</h3>
     
        <p>Please fill out the contact form.</p>

          <?php include TEMPLATES_DIR . "_errorSummary.html.php" ?>

            <form class="contact-form" action="contact.php" method="post" novalidate>
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
                    <label for="contact">Reason for Contact:</label>
                    <select name="contact" id="contact"> 
                      <option <?= setSelected("contact", "inquiry") ?> value="Inquiry">Inquiry</option>
                      <option <?= setSelected("contact", "question") ?> value="Question">Question</option>
                      <option <?= setSelected("contact", "feedback") ?> value="Feedback">Feedback</option>
                    </select>
                  </div>

                  <div class="form-row">
                    <label for="newsletter">Sign up to newsletter?<input type="checkbox" name="newsletter" id="newsletter" value="yes" <?= setChecked("newsletter", "yes") ?>></label>
                  </div>

                  <div class="form-row">
                    <label for="comments">Any comments?</label>
                    <textarea name="comments" id="comments" cols="30" rows="4"><?= getEncodedValue("comments") ?></textarea>
                  </div>

                  <div class="form-row">
                    <!-- <button type="submit" name="action" value="register">Register</button> -->
                    <button type="submit" name="submitContact">Submit</button>
                  </div>
              </fieldset>
         </form>
    </div>
</section>
</form>

<?php $footerScripts = <<<HTML
  <script src="scripts/registerPageValidation.js"></script>
HTML;

