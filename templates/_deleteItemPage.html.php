<div class="container">
    <h3>Delete item</h3>
    <p>Use the form below to delete an item from the system.</p>
    <p>This page is only accessible to logged-in users with admin privileges.</p>

            <?php include "_errorSummary.html.php"; ?>
                <form action="deleteItem.php" method="post">
                    <fieldset>
                        <legend><strong>Delete Item</strong></legend>
                        <label for="itemId">Item ID:</label>
                        <input type="text" id="itemId" name="itemId" required><br><br>
                        <button type="submit" value="Delete item" name="submitDeleteItem">Delete item</button>
                    </fieldset>
                </form>
</div>