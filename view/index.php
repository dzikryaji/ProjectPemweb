<section class="d-flex flex-column justify-content-center align-items-center min-vh-100 px-5 py-3 mb-0">
    <?php Flasher::flash(); ?>
    <div class = "w-100">
        <div class="mb-5 ms-5 ps-5" style="width: 40vw;">
            <h1 style="text-shadow: 5px 3px 5px rgba(0,0,0, 0.2);">Vegan Shop</h1>
            <h3 style="text-shadow: 5px 3px 5px rgba(0,0,0, 0.2);">Lots of goodies for a great price</h3>
        </div>
    </div>
    <div class=" d-flex w-100 min-vh-100">
        <div style="width: 15rem;">
            <h4 class="mb-2">Filter</h4>
            <p class="mb-2 fw-bold">Categories</p>

            <div class="form-check">
                <input class="form-check-input categoryCheck" type="checkbox" value="Vegetables" id="vegetablesCheck" <?= (isset($category) && $category == 'Vegetables') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="vegetablesCheck">
                    Vegetables
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input categoryCheck" type="checkbox" value="Fruits" id="fruitsCheck" <?= (isset($category) && $category == 'Fruits') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="fruitsCheck">
                    Fruits
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input categoryCheck" type="checkbox" value="Seeds" id="seedsCheck" <?= (isset($category) && $category == 'Seeds') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="seedsCheck">
                    Seeds
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input categoryCheck" type="checkbox" value="Berries" id="berriesCheck" <?= (isset($category) && $category == 'Berries') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="berriesCheck">
                    Berries
                </label>
            </div>
        </div>
        <div class="w-100 min-vh-50" id="productContainer">
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
        </div>
    </div>
</section>