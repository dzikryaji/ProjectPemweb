<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> <?= $title ?> </title>
    <link rel="stylesheet" href="<?= BASEURL ?>/bootstrap/css/bootstrap.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm border-bottom-1">
  <div class="container-fluid px-5">
    <a class="navbar-brand" href="<?= BASEURL; ?>">Website</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">Catalog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Orders Info</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Wishlist</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <?php if(isset($_SESSION['user_id'])): ?>
        <li class="nav-item">
            <a class ="nav-link" href="#">My Account</a>
        </li>
        <li class="nav-item">
            <a class ="nav-link" href="<?= BASEURL ?>/index.php?c=Home&m=logout" data-bs-toggle="modal" data-bs-target="#exampleModal">Logout</a>
        </li>
        <?php else: ?>
        <li class="nav-item">
            <a class ="nav-link" href="<?= BASEURL ?>/index.php?c=Home&m=login">Login</a>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<?php if(isset($_SESSION['user_id'])): ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-3 " style="border-radius: 1rem;">
      <div class="modal-body d-flex flex-column align-items-center justify-content-center">
          <h5>YOU ARE ATTEMPTING TO LOGOUT</h5>
          <h6 class="mb-5">Are you sure?</h6>
          <h6 class="mb-3">Logged in as <?= $user['name'] ?></h6>
          <a type="button" class="btn btn-primary w-100" href="<?= BASEURL ?>/index.php?c=Home&m=logout">LOGOUT</a>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>