<div class="container">
    <h3>Update category</h3>
    <p>Use the form below to update an existing category in the system.</p>
    <p>This page is only accessible to logged-in users with admin privileges.</p>
        <legend>Update Category</legend>

            <?php include "_errorSummary.html.php"; ?>
                <form action="updateCategory.php" method="post">
                    <fieldset>
                        <legend><b>Update Category</b></legend>
                        <label for="categoryId">Category ID:</label>
                        <input type="text" id="categoryId" name="categoryId" value="<?php echo isset($_GET['categoryId']) && isset($categoryToUpdate) ? $categoryToUpdate->getCategoryId() : ''; ?>" required <?php echo isset($_GET['categoryId']) && isset($categoryToUpdate) ? 'readonly' : ''; ?>><br><br>
                        <label for="categoryName">Category Name:</label>
                        <input type="text" id="categoryName" name="categoryName" value="<?php echo isset($_GET['categoryId']) && isset($categoryToUpdate) ? $categoryToUpdate->getCategoryName() : ''; ?>" required><br><br>
                        <button type="submit" value="Update category" name="submitUpdateCategory">Update category</button>
                    </fieldset>
                </form>
</div>