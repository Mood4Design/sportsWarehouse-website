
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
</section>