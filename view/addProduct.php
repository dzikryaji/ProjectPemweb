<section class="d-flex align-items-center justify-content-center min-vh-100 p-3">
    <div class="card px-3 shadow" style="border-radius: 1rem; width: 500px;">
        <div class="card-body">
            <h2 class="card-title my-4">Add Product</h2>
            <form method="post" action="<?= BASEURL ?>/index.php?c=product&m=addingproduct" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="text" class="form-control" id="productName" name="productName" placeholder="Product Name" required>
                </div>
                <div class="mb-3">
                    <input type="number" class="form-control" id="price" name="price" placeholder="Price" required>
                </div>
                <div class="mb-3">
                    <input type="number" class="form-control" id="stock" name="stock" placeholder="Stock" required>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" rows="5" id="description" name="description" placeholder="Description" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="productImage" class="form-label">Product Image</label>
                    <input class="form-control" type="file" id="productImage" name="productImage">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary w-100" value="Add Product">
                </div>
            </form>
        </div>
    </div>
</section>