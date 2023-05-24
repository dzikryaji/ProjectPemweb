<section class="d-flex align-items-center justify-content-center vh-100">
    <div class="card w-25 px-3 shadow" style="border-radius: 1rem;">
    <div class="card-body">
        <h2 class="card-title my-4">Login</h3>
        <form method="post" action="<?= BASEURL ?>/index.php?c=home&m=loggingIn">
            <div class="mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary w-100" value="Log In">
            </div>
        </form>
        <hr class="my-3 mx-2">
        <p class="d-flex align-items-center justify-content-center my-3">
            <span class="mx-1">Or </span> <a href="<?= BASEURL ?>/index.php?c=Home&m=signup">Sign Up</a>
        </p>
    </section>
