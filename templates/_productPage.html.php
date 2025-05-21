
<section class="product-table">
  <h3>Item: <?= esc($item["ItemName"]) ?></h3>
<table class="product-details">
  <tr>
    <th>Image </th>
    <?php  $photoPath = "image/" . $item["Photo"];?>
    <td><img src="<?= $photoPath ?>" alt="<?= esc($item['Photo']) ?>"></td>
  </tr>
  <tr>
    <th>Price </th>
    <td><?= esc(sprintf('$%1.2f', $item["Price"])) ?></td>
  </tr>
  <tr>
    <th>Sale Price</th>
    <td><?= esc(sprintf('$%1.2f', $item["SalePrice"])) ?></td>
  </tr>
  <tr>
    <th>Category</th>
    <td><?= esc($item["CategoryName"]) ?></td>
  </tr>
  <tr>
    <th>Item Details</th>
    <td><?= esc($item["Description"]) ?></td>
  </tr>
</table>
</section>