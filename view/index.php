<section class="d-flex flex-column align-items-center justify-content-center vh-100">
    <h1>Home</h1>

    <p>Hello <?= isset($user) ? $user['name'] : "Guest"; ?></p>
</section>