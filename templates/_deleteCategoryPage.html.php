<div class="container">
    <h3>Delete category</h3>
    <p>Use the form below to delete a category from the system.</p>
    <p><strong>NOTE:</strong> This page is only accessible to logged-in users with admin privileges.</p>
        <legend>Delete Category</legend>

            <?php include "_errorSummary.html.php"; ?>
                <form action="deleteCategory.php" method="post">
                    <fieldset>
                        <legend>Delete Category</legend>
                        <label for="categoryId">Category ID:</label>
                        <input type="text" id="categoryId" name="categoryId" required><br><br>
                        <button type="submit" value="Delete category" name="submitDeleteCategory">Delete category</button>
                    </fieldset>
                </form>
</div>