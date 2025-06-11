
<div class="container">
 
    <h3>Protected page</h3>

      <h2>logged-in users only</h2>

        <p>This page is protected using <code>Auth::protect()</code> so that ONLY logged-in users can  access it. If you're reading this, you must be logged in!
        </p>

          <h3>Secret menu</h3>

            <p>This is where you could add links to pages that ONLY authorised (logged-in) users should   have access to. This would commonly be an administrator menu to allow managing content.
            </p>

            <ul class="container">
                <li><a href="#">Manage something</li>
                <li><a href="#">Access secret knowledge</a></li>
                <li><a href="login.php">Login</a> (should be redirected back here because you're already logged in)</li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
</div>