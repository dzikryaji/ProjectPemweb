<?php if (count($products) == 0) : ?>
    <div class="d-flex align-items-center justify-content-center h-100 w-100">
        <h3 class="text-secondary">There is no <?= (isset($category)) ? $category : ''; ?> product yet....</h3>
    </div>
<?php else : ?>
    <div class="container-fluid">
        <?php foreach ($products as $index => $product) : ?>
            <?php if ($index % 3 == 0) : ?>
                <div class="row">
                <?php endif; ?>
                <div class="col-lg-4 col-md-12 mb-4">
                    <a class="link-dark" href="<?= BASEURL ?>c=product&m=productDetails&p=<?= $product['id_product'] ?>" style="text-decoration: none;">
                        <img src="asset/uploads/<?= $product['product_image_name'] ?>" class="img-thumbnail" alt="<?= $product['product_name']; ?> image" style="height: 14rem; width: 14rem; object-fit: contain;">
                        <p class="fw-bold mb-1 mt-2"><?= $product['product_name'] ?></p>
                        <p>$<?= $product['price'] ?></p>
                    </a>
                </div>
                <?php if ($index % 3 == 2 || $index + 1 == count($products)) : ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>