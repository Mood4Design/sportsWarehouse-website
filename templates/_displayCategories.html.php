<div class="container">
   <h3> Edit  category</h3> 
    <table>
        <tr>
            <div>
            <th class="edit">Category Id</th>
            <th class="edit">Category Name</th>
            <th>
             
                <select onchange="window.location.href=this.value;">
                    <option value="">Edit</option>
                    <option value="addCategory.php?id=1">Add</option>
                    <option value="updateCategory.php?id=1">Update</option>
                    <option value="deleteCategory.php?id=1">Delete</option>
                </select>
            </th>
            </div>
            </tr>
                <?php
                    foreach ($categories as $category):
                    error_log("Category: " . print_r($category, true));
                    $categoryId = $category["categoryId"];
                    $categoryName = $category["categoryName"];
                ?>
            
                <td><?= $categoryId ?></td>
                <td><?= $categoryName ?></td>
                
            </tr>
    <?php endforeach; ?>
    </table>
</div>