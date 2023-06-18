<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> <?= $title ?> </title>
    <link rel="stylesheet" href="asset/css/bootstrap.css">
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="asset/js/script.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm border-bottom-1">
  <div class="container-fluid px-5">
    <a class="navbar-brand" href="<?= BASEURL; ?>">Naturale</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Catalog</a>
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
          <?php if($_SESSION['user_name']=='Admin' && $_SESSION['user_email']=='admin@vegan.org'): ?>
          <li class="nav-item">
            <a class ="nav-link" href="<?= BASEURL ?>c=Product&m=AddProduct">Add Product</a>
          </li>
          <?php else: ?>
          <li class="nav-item">
            <div class="position-relative">
              <a class ="nav-link" href="<?= BASEURL ?>c=Cart&m=index"> 
                <img  class="w-100"src="asset/icon/cart.svg" alt="">
              </a>
              <?php if($_SESSION['cart_count']) :?>
              <span class="position-absolute translate-middle badge rounded-pill bg-danger" style="top: 20%; left: 85%;">
                <?= $_SESSION['cart_count'] > 99 ? "99+" : $_SESSION['cart_count']?>
              </span>
              <?php endif;?>
            </div>
          </li>
          <li class="nav-item">
            <a class ="nav-link" href="<?= BASEURL ?>">My Account</a>
          </li>
          <?php endif; ?>
          <li class="nav-item">
              <a class ="nav-link" data-bs-toggle="modal" data-bs-target="#logoutModal" role="button">Logout</a>
          </li>
        <?php else: ?>
        <li class="nav-item">
            <a class ="nav-link" href="<?= BASEURL ?>c=Home&m=login">Login</a>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<?php if(isset($_SESSION['user_id'])): ?>
<!-- Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-3 " style="border-radius: 1rem;">
      <div class="modal-body d-flex flex-column align-items-center justify-content-center">
          <h5>YOU ARE ATTEMPTING TO LOGOUT</h5>
          <h6 class="mb-5">Are you sure?</h6>
          <h6 class="mb-3">Logged in as <?= $_SESSION['user_name'] ?></h6>
          <a type="button" class="btn btn-primary w-100" href="<?= BASEURL ?>c=Home&m=logout">LOGOUT</a>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>