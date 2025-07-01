<div class="container">
<h3>Create admin user</h3>

<p>Create a new admin user in the database - You need a authorised username and password to login first. The password will be stored as a hash (not plaintext).</p>
<?php if (isset($errorMessage)) : ?>
  <div class="error-message"><?= htmlspecialchars($errorMessage) ?></div>
<?php endif; ?>

<?php if (isset($successMessage)) : ?>
  <div class="success-message"><?= htmlspecialchars($successMessage) ?></div>
<?php endif; ?>

<?php

?>

<form action="createUser.php" method="post" novalidate>
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
      <button type="submit" name="submitCreateUser">Create new user</button>
    </div>
  </fieldset>
</form>
</div>