<div class="container">
    <h3>Add new category</h3>
    <p>Use the form below to add a new category to the system.</p>
    <p><strong>NOTE:</strong> This page is only accessible to logged-in users with admin privileges.</p>
        <legend>Add Category</legend>

            <?php include "_errorSummary.html.php"; ?>
                <form action="addCategory.php" method="post">
                    <fieldset>
                        <legend><strong>Add Category</strong></legend>
                        <label for="categoryName">Category Name:</label>
                        <input type="text" id="categoryName" name="categoryName" required><br><br>
                        <button type="submit" value="Add new category" name="submitAddCategory">Add new category</button>
                    </fieldset>
                </form>
</div>