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
        <?php
        if(isset($_SESSION['user_id'])): ?>
        <li class="nav-item">
            <a class ="nav-link" href="#">My Account</a>
        </li>
        <li class="nav-item">
            <a class ="nav-link" href="<?= BASEURL ?>/index.php?c=Home&m=logout">Logout</a>
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