
<div class="container">
 
    <h3>Protected page</h3>

      <h2>logged-in admin users only</h2>

        <p>This page is protected using <code>Auth::protect()</code> so that ONLY logged-in users can  access it. If you're reading this, you must be logged in!
        </p>

          <h3>Secret menu</h3>

            <p>This is where you could add links to pages that ONLY authorised (logged-in) users should   have access to. This would commonly be an administrator menu to allow managing content.
            </p>

            <ul class="container">
                <li><a href="addEmployee.php">Add Employee</a></li>
                <li><a href="addCategory.php">Add Category</a></li>
                <li><a href="updateCategory.php">Update Category</a></li>
                <li><a href="deleteCategory.php">Delete Category</a></li>
                <li><a href="addItem.php">Add Item</a></li>
                <li><a href="updateItem.php">Update Item</a></li>
                <li><a href="deleteItem.php">Delete Item</a></li>
                <li><a href="login.php">Login</a> (should be redirected back here because you're already logged in)</li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
</div>