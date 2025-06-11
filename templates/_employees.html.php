<?php if (empty($employees)): ?>
  
  <p>No staff to display.</p>

<?php else: ?>

  <ul class="employee-list">

    <?php foreach ($employees as $employee): ?>

      <?php

        // Extract data
        $firstName = $employee["firstName"];
        $lastName = $employee["lastName"];
        $fullName = "$firstName $lastName";
        $position = $employee["title"];
        $photoFilename = $employee["photoPath"];

        // Set default image (photo)
        $imgSrc = "unavailable.png";

        // Check if employee photo exists
        if (!empty($photoFilename) && file_exists("photos/$photoFilename")) {

          // Use the photo from the DB
          $imgSrc = $photoFilename;

        }

      ?>

      <li class="employee" style="display: block;">
        <img src="photos/<?= urlencode($imgSrc) ?>" alt="Photo of The Person" class="employee__photo">
        <h3 class="employee__name"><?= esc($fullName) ?></h3>
        <p class="employee__title"><?= esc($position) ?></p>
      </li>
    <?php endforeach ?>

  </ul>

<?php endif ?>