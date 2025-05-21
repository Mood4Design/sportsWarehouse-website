<?php if (empty($items)): ?>
    <div class="featured-products">
        <div class="container">
            <h3>Error</h3>
            <h2>No products found</h2>
        </div>
    </div>
<?php else: ?>
    <!-- Featured Products -->
    <div class="featured-products">
        <div class="container">
            <h3>Featured products</h3>
            <div class="product-grid">
                <?php foreach ($items as $item): 
                    $photoPath = "image/" . $item["Photo"];
                 ?>
                    <div class="product">
                        <a href="product.php?id=<?= $item['ItemId'] ?>" class="product__link">
                            <img src="<?= $photoPath ?>" alt="<?= esc($item['Photo']) ?>">
                            <p class="current-price">
                                <!-- If SalePrice is greater than 0, display both the sale price and the original price. -->
                                <?php if ($item['SalePrice'] > 0): ?>
                                    <?= sprintf('$%1.2f', $item['SalePrice']) ?>
                                    <span class="was-text">WAS</span>
                                    <span class="old-price"><del><?= sprintf('$%1.2f', $item['Price']) ?></del></span>
                                <?php else: ?>
                                    <span class="old-price"><?= sprintf('$%1.2f', $item['Price']) ?></span>
                                <?php endif; ?>
                            </p>
                            <p class="info"><?= esc($item['ItemName']) ?></p>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>