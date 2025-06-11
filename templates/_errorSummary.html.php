<?php if (!empty($errors)): ?>
  <section class="container">
  <div class="error-summary">
    <ul>
      <?php foreach ($errors as $error): ?>
        <li><?= $error ?></li>
      <?php endforeach ?>
    </ul>
  </div>
</section>
<?php endif ?>