<?php

require_once "includes/formHelpers.php";
?>
<div class="container">
    <h3>Update item</h3>
    <p>Use the form below to update an existing item in the system.</p>
    <p>This page is only accessible to logged-in users with admin privileges.</p>
        <legend>Update Item</legend>

            <?php include "_errorSummary.html.php"; ?>
                <form action="updateItem.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend><strong>Update Item</strong></legend>
                        <label for="itemId">Item ID:</label>
                        <input type="number" id="itemId" name="itemId" value="<?= htmlspecialchars($item->getItemId()) ?>" readonly><br><br>
                        <label for="itemName">Item Name:</label>
                        <input type="text" id="itemName" name="itemName" value="<?= htmlspecialchars($item->getItemName()) ?>"><br><br>

                                <label for="photo">Photo:</label>
                                <!-- MAX_FILE_SIZE must precede the file input field -->
                                <input type="hidden" name="MAX_FILE_SIZE" value="<?= 5 * 1024 * 1024 ?>" />
                                <input type="file" id="photo" name="photo">
                                <img src="image/<?= htmlspecialchars($item->getPhoto()) ?>" alt="Current Photo" width="100"><br><br>
                
                        <br><br>
                        <label for="price">Price:</label>
                        <input type="number" id="price" name="price" step="0.01" value="<?= htmlspecialchars($item->getPrice()) ?>"><br><br>
                        <label for="salePrice">Sale Price:</label>
                        <input type="number" id="salePrice" name="salePrice" step="0.01" value="<?= htmlspecialchars($item->getSalePrice()) ?>"><br><br>
                        <label for="description">Description:</label>
                        <textarea id="description" name="description"><?= htmlspecialchars($item->getDescription()) ?></textarea><br><br>
                        <label for="categoryId">Category ID:</label>
                        <input type="number" id="categoryId" name="categoryId" value="<?= htmlspecialchars($item->getCategoryId()) ?>"><br><br>
                        <button type="submit" value="Update item" name="submitUpdateItem">Update item</button>
                    </fieldset>
                </form>
</div>
`