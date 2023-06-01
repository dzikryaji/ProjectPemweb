<section class="d-flex flex-column align-items-center justify-content-center vh-100">
    <?php Flasher::flash(); ?>
    <div class="card px-3 shadow" style="border-radius: 1rem; width: 500px;">
        <div class="card-body">
            <h2 class="card-title my-4">Sign Up</h2>
                <form method="post" action="<?= BASEURL ?>/index.php?c=home&m=signup">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password Confirmation" required>
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