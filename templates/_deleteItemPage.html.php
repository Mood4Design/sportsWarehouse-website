<div class="container">
    <h3>Delete item</h3>
    <p>Use the form below to delete an item from the system.</p>
    <p>This page is only accessible to logged-in users with admin privileges.</p>

            <?php include "_errorSummary.html.php"; ?>
                <form action="deleteItem.php" method="post">
                    <fieldset>
                        <legend><strong>Delete Item</strong></legend>
                        <label for="itemId">Item ID:</label>
                        <input type="text" id="itemId" name="itemId" value="<?= htmlspecialchars($itemIdToDelete) ?>" readonly required><br><br>
                        
                        <label for="itemName">Item Name:</label>
                        <input type="text" id="itemName" name="itemName" value="<?= htmlspecialchars($item->getItemName()) ?>" readonly><br><br>
                        
                        <label for="price">Price:</label>
                        <input type="text" id="price" name="price" value="<?= htmlspecialchars($item->getPrice()) ?>" readonly><br><br>
                        
                        <label for="salePrice">Sale Price:</label>
                        <input type="text" id="salePrice" name="salePrice" value="<?= htmlspecialchars($item->getSalePrice()) ?>" readonly><br><br>
                        
                        <label for="photo">Photo:</label><br>
                        <img src="image/<?= htmlspecialchars($item->getPhoto()) ?>" alt="Item Photo" width="100"><br><br>
                        
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" readonly><?= htmlspecialchars($item->getDescription()) ?></textarea><br><br>
                        <button type="submit" value="Delete item" name="submitDeleteItem">Delete item</button>
                    </fieldset>
                </form>
</div>