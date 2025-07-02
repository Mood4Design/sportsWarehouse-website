<div class="container">
   <h3> Edit  category</h3> 
    <table>
        <tr>
          
            <th style="padding-right: 20px">Category ID</th>
            <th style="padding-right: 20px">Category Name</th>
            <th style="padding-right: 20px">Actions</th>
        
            </tr>
                <?php
                    foreach ($categories as $category):
                    $categoryId = $category["categoryId"];
                    $categoryName = $category["categoryName"];
                ?>
            
                <td><?= $categoryId ?></td>
                <td><?= $categoryName ?></td>
                <td>
                    <select onchange="window.location.href=this.value;">
                        <option value="">Edit</option>
                        <option value="addCategory.php">Add</option>
                        <option value="updateCategory.php?categoryId=<?= $categoryId ?>">Update</option>
                        <option value="deleteCategory.php?categoryId=<?= $categoryId ?>">Delete</option>
                    </select>
                </td>          
            </tr>
    <?php endforeach; ?>
    </table>
</div>