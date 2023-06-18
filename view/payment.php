<section class="container py-5">
    <h1>Checkout</h1>
    <h5 class="mb-3">Address - <b>Payment</b></h5>
    <div class="row mb-4">
        <div class="col-md-7 mt-3">
            <form action="?c=Cart&m=payment" method="post">
                <h5>Payment Detail</h5>
                <div class="mb-3 mt-3">
                    <input type="text" class="form-control" required placeholder="Cardholder Name" name="name" value="<?= $card['name'] ?? "" ?>">
                </div>
                <div class="mb-3 mt-3">
                    <input type="number" class="form-control" required placeholder="Card Number" name="number" value="<?= $card['number'] ?? "" ?>">
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="">
                            <select name="month" class="form-control" id="">
                            <option value="placeholder" disabled selected style="color: #ced4da;" id="placeholder">Month</option>
                            <?php
                                for ($i = 1; $i <= 12; $i++) {
                                    $value = $i < 10 ? 0 . $i : $i;
                                ?>
                                    <option id="option_<?= $value ?>" value="<?= $value ?>" <?= isset($card['month']) && $i == $card['month'] ? "selected" : ""?>><?= $value ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="">
                            <select name="year" class="form-control" id="">
                                <option value="placeholder" disabled selected style="color: #ced4da;">Year</option>
                                <?php
                                for ($i = 2020; $i < 2031; $i++) {
                                ?>
                                    <option value="<?= $i ?>" <?=  isset($card['month']) && $i == $card['year'] ? "selected" : ""?>><?= $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="">
                            <input type="number" class="form-control" required placeholder="CVC" name="cvc" value="<?= $card['cvc'] ?? "" ?>">
                        </div>
                    </div>
                </div>
                <div class="form-check mb-3 mt-3">
                    <input class="form-check-input" type="checkbox" value="save" id="saveCardCheck" name="saveCardCheck">
                    <label class="form-check-label" for="saveCardCheck">
                        Save Data For Fututure Payment
                    </label>
                </div>

                <div class="mb-3 mt-3">
                    <button type="submit" class="btn btn-primary text-white d-block w-100">Pay With Card</button>
                </div>
            </form>
        </div>
        <div class="col-md-5 pe-2 pe-lg-5">
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