<div class="container">
    <h3>Delete item</h3>
    <p>Use the form below to delete an item from the system.</p>
    <p><strong>NOTE:</strong> This page is only accessible to logged-in users with admin privileges.</p>
        <legend>Delete Item</legend>

            <?php include "_errorSummary.html.php"; ?>
                <form action="deleteItem.php" method="post">
                    <fieldset>
                        <legend>Delete Item</legend>
                        <label for="itemId">Item ID:</label>
                        <input type="text" id="itemId" name="itemId" required><br><br>
                        <button type="submit" value="Delete item" name="submitDeleteItem">Delete item</button>
                    </fieldset>
                </form>
</div>