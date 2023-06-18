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

            <form action="?c=Cart&m=checkout" method="post">
                <h5>Delivery Information</h5>

                <div class="mb-3 mt-3">
                    <input type="text" class="form-control" required placeholder="Name" name="name" value="<?= $address['name'] ?? ""?>">
                </div>
                <div class="mb-3 mt-3">
                    <input type="text" class="form-control" required placeholder="Address" name="address" value="<?= $address['address'] ?? ""?>">
                </div>
                <div class="mb-3 mt-3">
                    <input type="tel" class="form-control" required placeholder="Contact Number" name="contact_number" value="<?= $address['contact_number'] ?? ""?>">
                </div>
                <div class="row">
                    <div class="col-6">
                        <div>
                            <input type="text" class="form-control" required placeholder="City" name="city" value="<?= $address['city'] ?? ""?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <input type="text" class="form-control" required placeholder="Province" name="province" value="<?= $address['province'] ?? ""?>">
                        </div>
                    </div>
                </div>

                <div class="form-check mb-3 mt-3">
                    <input class="form-check-input" type="checkbox" value="save" id="saveContactCheck" name="saveContactCheck">
                    <label class="form-check-label" for="saveContactCheck">
                        Save Contact Information
                    </label>
                </div>

                <div class="mb-3 mt-3">
                    <button type="submit" class="btn btn-primary text-white d-block w-100 py-3">Continue to Payment</button>
                </div>
            </form>
        </div>
        <div class="col-md-5 pe-lg-5">
            <?php
            $subTotal = 0;
            $shippingCost = 3;
            foreach ($carts as $key => $item) :
                $subTotal += $item['price'] * $item['quantity'];
            ?>
                <div class="row py-3 mb-3 <?= $key < count($carts) - 1 ? "border-bottom border-secondary" : "" ?>">
                    <div class="col-4">
                        <img src="asset/uploads/<?= $item['product_image_name'] ?>" alt="" class="img-thumbnail" style="width: 8rem; height: 8rem; object-fit: contain;">
                    </div>
                    <div class="col-8">
                        <h4><?= $item['product_name'] ?></h4>
                        <small>Quantity: <?= $item['quantity'] ?></small>
                        <h4>$<?= number_format($item['price'] * $item['quantity']) ?></h4>
                        <div class="text-end">
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
            $total = $subTotal + $shippingCost;
            ?>
            <div class="clearfix mb-2">
                <div class="float-start">
                    <h5>Subtotal</h5>
                </div>
                <div class="float-end">
                    <h5>$<?= number_format($subTotal) ?></h5>
                </div>
            </div>
            <div class="clearfix border-bottom border-secondary pb-3 mb-3">
                <div class="float-start">
                    <h5>Delivery</h5>
                </div>
                <div class="float-end">
                    <h5>$<?= number_format($shippingCost) ?></h5>
                </div>
            </div>
            <div class="clearfix pb-3">
                <div class="float-start">
                    <h5>Total</h5>
                </div>
                <div class="float-end">
                    <h5>$<?= number_format($total) ?></h5>
                </div>
            </div>
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