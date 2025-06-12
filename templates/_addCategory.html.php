<div class="container">
    <h3>Add new category</h3>
    <p>Use the form below to add a new category to the system.</p>

    <?php include "_errorSummary.html.php"; ?>
    <form action="addCategory.php" method="post">
        <label for="categoryName">Category Name:</label>
        <input type="text" id="categoryName" name="categoryName" required><br><br>
        <input type="submit" value="Add new category" name="submitAddCategory">
    </form>
     <div class="form-row">
      <label for="photo">Photo:</label>
      <!-- MAX_FILE_SIZE must precede the file input field -->
      <input type="hidden" name="MAX_FILE_SIZE" value="<?= 100 * 1024 // 100KB ?>" />
      <input type="file" id="photo" name="photo" <?= setValue("photo") ?>>
    </div>
</div>