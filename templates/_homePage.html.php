
<div class="container">
 
    <h3>Admin home</h3>
        <h2>Welcome to admin page</h2>

          <p>This is a test page for the <code>Auth</code> class, which is used to handle authentication and authorisation in this website.</p>
        <p>This website tests the Auth class that handles authentication (login/logout) and authorisation (checking if a user is logged in). This page is not protected so that anyone can access it, but you will need to be logged in to access the <code>protected.php</code> page.</p>

          <p>Once logged in, the user's details are stored in a PHP session, which is checked when they are trying to access a page protected with <code>Auth::protect()</code>.</p>

            <ul style="margin-left: 20px;">
                <li><a href="createUser.php">Create user</a> (do NOT have this accessible on a production website!)</li>
                <li><a href="login.php">Login</a></li>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="protected.php">Protected page</a> (does NOT allow access to unauthorised users)</li>
            </ul>
</div>