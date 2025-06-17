<div class="container">
 

    <h3>Shopping cart</h3>
        <!-- <h2>Shopping cart</h2> -->

          <?php if ($cart->count() === 0): ?>

              <p>Your shopping cart is empty, you should <a href="index.php">browse for something to buy</a>!</p>

              <?php else: ?>

                <table>
                  <tr>
                    <th>Item</th>
                    <th>Photo</th>
                    <th>Price</th>
                    <th>Qty</th>
                  </tr>
                  
                      <?php foreach ($cart->getItems() as $item): ?>
                            <!-- 
                            <tr>
                              <td>Product 1</td>
                              <td>$123</td>
                              <td>4</td>
                            </tr>
                            -->
                            <tr>
                              <td><?= $item->getItemName() ?></td>
                              <?php 
                                $itemObj = new Item();
                                $itemObj->getItem($item->getItemId());
                                $photoPath = "image/" . $itemObj->getPhoto();
                              ?>
                              <td><img src="<?= $photoPath ?>" alt="<?= $item->getItemName() ?>" width="50"></td>
                              <td><?= sprintf('$%1.2f', $item->getPrice() ?? "--") ?></td>
                              <td><?= $item->getQuantity() ?></td>
                            </tr>
                      
                      <?php endforeach ?>

                </table>

              <p>Total price: <?= $cart->calculateTotal() ?></p>
              <p><a href="checkout.php">Checkout</a></p>
              
          <?php endif ?>
</div>