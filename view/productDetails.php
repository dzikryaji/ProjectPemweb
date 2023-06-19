<section class="d-flex flex-column align-items-center px-5 py-3 mb-0">
  <?php Flasher::flash(); ?>
  <div class="d-flex h-100">
    <div class="d-flex py-5 h-100 w-50 justify-content-center">
      <img src="asset/uploads/<?= $product['product_image_name']; ?>" class="img-thumbnail" alt="<?= $product['product_name']; ?> image" style="height: 24rem; width: 24rem; object-fit: contain;">
    </div>

    <div class="d-flex p-5 h-100 w-50 justify-content-center">
      <div class="w-100">
        <h1><?= $product['product_name']; ?></h1>
        <p>$<?= $product['price']; ?></p>
        <p><?= $product['description']; ?></p>

        <form action="<?= BASEURL ?>c=Cart&m=addToCart" method="post" class="d-flex">
          <?php if($product['stock']):?>
          <div class="pe-3 w-75">
            <label class="form-label">Stock: <?= $product['stock']; ?></label>
            <input value="Add to Cart" class="btn btn-primary w-100" <?= isset($_SESSION['user_id']) ? 'type="submit"' : 'type="button" data-bs-toggle="modal" data-bs-target="#guestModal"'?>>
          </div>

          <div class=" pe-3 w-25">
            <label class="form-label" for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" min="1" max="<?= $product['stock']; ?>" value="1">
          </div>
          <?php else:?>
            <div class="pe-3 w-75">
            <label class="form-label">Stock: <?= $product['stock']; ?></label>
            <input value="<?= !$product['stock'] ? "Out of Product" : "Add to Cart" ?>" class="btn btn-primary w-100" disabled>
          </div>

          <div class=" pe-3 w-25">
            <label class="form-label" for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control"  max="<?= $product['stock']; ?>" value="0" disabled>
          </div>
          <?php endif; ?>
          <input type="hidden" name="idProduct" value="<?= $product['id_product']; ?>">
        </form>
      </div>
    </div>

  </div>
</section>

<?php if(!isset($_SESSION['user_id'])): ?>
<!-- Modal -->
<div class="modal fade" id="guestModal" tabindex="-1" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-3 " style="border-radius: 1rem;">
      <div class="modal-body d-flex flex-column align-items-center justify-content-center">
          <h5>PLEASE LOGIN FIRST</h5>
          <h6 class="mb-4">You need to login to continue</h6>
          <button type="button" class="btn btn-primary w-100" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>