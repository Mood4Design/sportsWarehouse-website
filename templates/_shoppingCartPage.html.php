<?php require_once "includes/common.php"; ?>
<div class="container">
 

    <h3>Shopping cart</h3>
        <!-- <h2>Shopping cart</h2> -->

          <?php if ($cart->count() === 0): ?>

              <p>Your shopping cart is empty, you should <a href="cart.php">browse for something to buy</a>!</p>

              <?php else: ?>

                <table  class="edit">
                  <tr>
                    <th>Item</th>
                    <th>Photo</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th></th>
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
                                  <td><a href="product.php?id=<?= $item->getItemId() ?>"><?= $item->getItemName() ?></a></td>

                            
                                  <?php
                                      $itemObj = new Item();
                                      $itemObj->getItem($item->getItemId());

                                      $photoPath = "image/" . $itemObj->getPhoto();
                                    ?>
                                <td><img src="<?= $photoPath ?>" alt="<?= $item->getItemName() ?>" width="50"></td>
                                <td><?= sprintf('$%1.2f', $item->getPrice() ?? "--") ?></td>
                                <td><?= $item->getQuantity() ?></td>
                                <td>
                                  <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                    <input type="hidden" name="itemId" value="<?= $item->getItemId() ?>">
                                    <input type="submit" name="remove" value="Remove">
                                  </form>
                                </td>
                            </tr>
                      
                      <?php endforeach ?>

                </table>

                <div class="edit">
                  <h2>Total price:$<?= $cart->calculateTotal() ?></h2>
                  <h4><a href="checkout.php">Checkout</a></h4>
                  <h4><a href="cart.php">Continue shopping</a></h4>

                  <form action="cart.php" method="post">
                    <input type="hidden" name="itemId" value="<?= $item->getItemId() ?>">
                    <input type="submit" name="remove" value="Empty cart">
                  </form>
                </div>

          <?php endif ?>
</div>