<div class="container">
    <h3>Products to purchase</h3>
    <section id="items">
    <?php foreach ($productRows as $row):
        $productName = $row["itemName"];
        $price = sprintf('%01.2f', $row["price"]);
        $productId = $row["itemId"];
            ?>
        <article>
            <form action="cart.php" method="post">
                <strong><?= $productName ?></strong>
                <p>Price $<?= $price ?></p>
                <p><label for="qty<?=$itemId?>">quantity:</label>
                <input class="qty" type="number" id="qty<?=$itemId?>" name="qty" value="1">
                </p>
                <p><input class="buy" type="submit" name="buy" value="Buy"></p>
                <input type="hidden" value="<?=$productId?>" name="productId">
            </form>
        </article>
    <?php endforeach; ?>
    </form>
    </section>
</div>