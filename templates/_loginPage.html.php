
<div class="container">

        <h3>Login page</h3>
            <p>Welcome to the login page! Please enter your credentials to access the protected content.</p>

            <p>Logging in will give you access to the <a href="protected.php">protected.php</a> page with super-secret content!</p>

            <?php if (isset($errorMessage)) : ?>
                <div class="error-message">
                    <p><?= $errorMessage ?></p>
                </div>
            <?php endif; ?>

            <?php if (isset($successMessage)) : ?>
                <div class="success-message">
                    <p><?= $successMessage ?></p>
                </div>
            <?php endif; ?>

                  <form action="login.php" method="post" novalidate>
                        <fieldset>
                              <div class="form-row">
                                      <label for="username">Username:</label>
                                      <input type="text" name="username" id="username" value="<?= setValue("username") ?>" required>
                              </div>

                              <div class="form-row">
                                    <label for="password">Password:</label>
                                    <input type="password" name="password" id="password" value="<?= setValue("password") ?>" required>
                              </div>

                              <div class="form-row">
                                    <button type="submit" name="submitLogin">Login</button>
                              </div>
                        </fieldset>
                  </form>
</div>

