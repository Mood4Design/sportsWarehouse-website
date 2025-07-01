<?php

require_once "includes/common.php";

Auth::protect();

$title = "Select Item to Update";

try {
    $item = new Item();
    $items = $item->getItems();
} catch (Exception $ex) {
    $errorMessage = "Error retrieving items: " . $ex->getMessage();
}

ob_start();

?>

<div class="container">
    <h3>Select Item to Update</h3>

    <?php if (isset($errorMessage)): ?>
        <div class="error"><?= $errorMessage ?></div>
    <?php endif; ?>

    <?php if (empty($items)): ?>
        <p>No items found.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['itemId']) ?></td>
                        <td><?= htmlspecialchars($item['itemName']) ?></td>
                        <td><a href="updateItem.php?id=<?= htmlspecialchars($item['itemId']) ?>">Update</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php

$content = ob_get_clean();

include_once TEMPLATES_DIR . "_layout.html.php";

?>