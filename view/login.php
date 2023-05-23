<h1>Login</h1>

<form method="post" action="<?= BASEURL ?>/index.php?c=home&m=loggingIn">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>
    <br>
    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>
    <br>
    <button>Log in</button>
    <br>
    <p><a href="<?= BASEURL ?>/index.php?c=Home&m=signup">Sign Up</a></p>
</form>