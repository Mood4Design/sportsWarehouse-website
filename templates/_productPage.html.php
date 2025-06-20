
<section class="product-table">
  <h3>Item: <?= esc($item["itemName"]) ?></h3>
<table class="product-details">
  <tr>
    <th>Image </th>
    <?php  $photoPath = "image/" . $item["photo"];?>
    <td><img src="<?= $photoPath ?>" alt="<?= esc($item['photo']) ?>"></td>
  </tr>
  <tr>
    <th>Price </th>
    <td><?= esc(sprintf('$%1.2f', $item["price"])) ?></td>
  </tr>
  <tr>
    <th>Sale Price</th>
    <td><?= esc(sprintf('$%1.2f', $item["salePrice"])) ?></td>
  </tr>
  <tr>
    <th>Category</th>
    <td><?= esc($item["categoryName"]) ?></td>
  </tr>
  <tr>
    <th>Item Details</th>
    <td><?= esc($item["description"]) ?></td>
  </tr>
</table>
  <div class="product">
    <form class="product__link" action="cart.php" method="post">
        <p><label for="qty<?=$itemId?>">quantity:</label>
        <input class="qty" style="width: 100px; text-align: center;" type="number" id="qty<?=$itemId?>" name="qty" value="1"></p>
        <p><input class="buy" type="submit" name="buy" value="Buy"></p>
        <input type="hidden" value="<?= $item["itemId"] ?>" name="itemId">
        <p><a href="cart.php" class="back">Back to Product List</a></p>
        <p><a href="shoppingCart.php" class="cart">Back to Cart</a></p>
    </form>
  </div>
</section>
