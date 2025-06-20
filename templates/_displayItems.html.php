<div class="container">
    <h3>Products to purchase</h3>
        <section class="product-grid">
            <?php
                foreach ($productRows as $row):
                    $productName = $row["itemName"];
                    $itemId = $row["itemId"];
                    $photoPath = isset($row["photo"]) ? "image/" . $row["photo"] : "";
                    $price = isset($row["salePrice"]) && $row["salePrice"] > 0 ? $row["salePrice"] : $row["price"];?>
                
                            <article class="product">
                                <form class="product__link" action="cart.php" method="post">
                                        <img src="<?= $photoPath ?>" alt="">
                                        <p class="info"><?= $productName ?></p>
                                        <p class="current-price">
                                            <?php if (isset($row['salePrice']) && $row['salePrice'] > 0): ?>
                                                <?= sprintf('$%1.2f', $row['salePrice']) ?>
                                                <span class="was-text">WAS</span>
                                                <span class="old-price"><del><?= sprintf('$%1.2f', esc($row['price'])) ?></del></span>
                                            <?php else: ?>
                                                <span class="old-price"><?= sprintf('$%1.2f', esc($row['price'])) ?></span>
                                            <?php endif; ?>
                                        </p>
                                        <p><label for="qty<?=$itemId?>">quantity:</label>
                                        <input class="qty" style="width: 80px; text-align: center;" type="number" id="qty<?=$itemId?>" name="qty" value="1">
                                        </p>
                                        <p><input class="buy" type="submit" name="buy" value="Buy"></p>
                                        <input type="hidden" value="<?=$itemId?>" name="itemId">
                                </form>
                            </article>
                <?php endforeach; ?>
    
        </section>
</div>