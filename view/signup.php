<section class="d-flex align-items-center justify-content-center py-4">
    <div class="card px-3 shadow" style="border-radius: 1rem; width: 500px;">
    <div class="card-body">
        <h2 class="card-title my-4">Sign Up</h3>
        <form method="post" action="<?= BASEURL ?>/index.php?c=home&m=loggingIn">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="name" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Password Confirmation</label>
                <input type="password_confirmation" class="form-control" id="password_confirmation" name="password">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary w-100" value="Sign Up">
            </div>
        </form>
        <hr class="my-3 mx-2">
        <p class="d-flex align-items-center justify-content-center my-3">
            <span class="mx-1">Or</span> <a href="<?= BASEURL ?>/index.php?c=Home&m=login">Login</a>
        </p>
    </div>
    </div>
</section>