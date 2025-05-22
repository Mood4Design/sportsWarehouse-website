<section class="container">
  <h3>About Us</h3>

  <p>Please read about us to know better.</p>

  <?php if (empty($about)): ?>

    <p>Sorry, no about information available.</p>

  <?php else: ?>

  <dl class="about-list">
    <?php foreach ($about as $aboutName => $aboutDesc): ?>
      <dt><?= esc($aboutName) ?></dt>
      <dd><?= esc($aboutDesc) ?></dd>
    <?php endforeach ?>
  </dl>
</section>
<?php endif ?>