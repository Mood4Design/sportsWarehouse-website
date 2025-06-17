<div class="container">
    <h3>Products to purchase</h3>
    <section class="product-grid">
    <?php foreach ($productRows as $row):
        $productName = $row["itemName"];
        $productId = $row["itemId"];
        $photoPath = isset($row["photo"]) ? "image/" . $row["photo"] : "";
        $price = isset($row["salePrice"]) && $row["salePrice"] > 0 ? $row["salePrice"] : $row["price"];
    ?>
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
                <p><label for="qty<?=$productId?>">quantity:</label>
                <input class="qty" style="width: 50px; text-align: center;" type="number" id="qty<?=$productId?>" name="qty" value="1">
                </p>
                <p><input class="buy" type="submit" name="buy" value="Buy"></p>
                <input type="hidden" value="<?=$productId?>" name="productId">
            </form>
        </article>
    <?php endforeach; ?>
    </form>
    </section>
</div>