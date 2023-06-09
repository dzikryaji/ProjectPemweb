<section class="container py-5">
    <h1>Checkout</h1>
    <h5 class="mb-3"><b>Address</b> - Payment</h5>
    <div class="row mb-4">
        <div class="col-md-7 mt-3">
            <style>
                .form-control {
                    border-color: #000;
                    border-radius: 0px;
                }
            </style>

            <form action="?c=Cart&m=proccess_checkout" method="post">
                <h5>Delivery Information</h5>
                
                <div class="mb-3 mt-3">
                    <input type="text" class="form-control" required placeholder="Name" name="name">
                </div>
                <div class="mb-3 mt-3">
                    <input type="text" class="form-control" required placeholder="Address" name="address">
                </div>
                <div class="mb-3 mt-3">
                    <input type="text" class="form-control" required placeholder="Contact Number" name="contact_number">
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="">
                            <input type="text" class="form-control" required placeholder="City" name="city">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="">
                            <input type="text" class="form-control" required placeholder="Province" name="province">
                        </div>
                    </div>
                </div>
                <div class="mb-3 mt-3">
                    <input type="text" class="form-control" required placeholder="Optional" name="optional">
                </div>

                <div class="mb-3 mt-3">
                    <input type="checkbox" class="" id="" placeholder="">
                    <small>Save contact information</small>
                </div>

                <div class="mb-3 mt-3">
                    <button type="submit" class="btn bg-dark text-white d-block w-100 py-3">Continue to Payment</button>
                </div>
            </form>
        </div>
        <div class="col-md-5 pe-2 pe-lg-5">
            <?php 
                $total = 0;
                foreach ($carts as $key => $item) {
                $total += $item['price'] * $item['quantity'];
            ?>
            <div class="row border-bottom border-secondary py-3 mb-3">
                <div class="col-3 bg-light">
                    <img src="asset/uploads/<?= $item['product_image_name'] ?>" alt="" style="width: 100%;">
                </div>
                <div class="col-9">
                    <h4><?= $item['product_name'] ?></h4>
                    <small><?= $item['quantity'] ?></small>
                    <h4>Rp. <?= number_format($item['price'] * $item['quantity']) ?></h4>
                    <div class="text-end">
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <h4 class="mb-4 pb-3 border-bottom border-secondary">Order Information</h4>
            <span class="text-muted">
                <h6>Return Policy</h6>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea dignissimos sit sequi iure obcaecati dolore autem tenetur aspernatur soluta debitis!</p>
            </span>
        </div>
    </div>
</section>