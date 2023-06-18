<section class="container py-5">
    <h1>Your Cart</h1>
    <h5 class="mb-3">Not ready to Checkout? Continue Shopping</h5>
    <div class="row mb-4">
        <div class="col-md-8 pe-2 pe-lg-5">
            <?php 
                $total = 0;
                foreach ($carts as $key => $item) :
                $total += $item['price'] * $item['quantity'];
            ?>
            <div class="row py-3 mb-3 <?= $key < count($carts)-1 ? "border-bottom border-secondary" : ""?>">
                <div class="col-3">
                    <img src="asset/uploads/<?= $item['product_image_name'] ?>" alt="" class="img-thumbnail" style="width: 8rem; height: 8rem; object-fit: contain;">
                </div>
                <div class="col-9">
                    <h4><?= $item['product_name'] ?></h4>
                    <small>Quantity: <?= $item['quantity'] ?></small>
                    <h4>$<?= number_format($item['price'] * $item['quantity']) ?></h4>
                    <div class="text-end">
                        <a href="?c=Cart&m=deleteCart&id_product=<?= $item['id_product'] ?>" class="btn text-dark text-decoration-underline">Remove</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="col-md-4">
            <h4 class="mb-4">Order Summary</h4>
            <div class="clearfix mb-2">
                <div class="float-start">
                    <h5>Subtotal</h5>
                </div>
                <div class="float-end">
                    <h5>$<?= number_format($total) ?></h5>
                </div>
            </div>
            <div class="clearfix border-bottom border-secondary pb-3 mb-3">
                <div class="float-start">
                    <h5>Delivery</h5>
                </div>
                <div class="float-end">
                    <small class="text-muted">Calculated at the next step</small>
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
            <?php if (count($carts)):?>
                <a href="?c=Cart&m=checkout" class="btn btn-primary text-white d-block w-100 py-3">Continue to Checkout</a>
            <?php endif?>
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