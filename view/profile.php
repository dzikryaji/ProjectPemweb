<section class="d-flex flex-column align-items-center justify-content-center vh-100 my-4">
    <?php Flasher::flash(); ?>
    <div class="w-75 px-5">
        <h1 class="mb-4">Edit Profile</h1>
        <form action="<?= BASEURL; ?>c=Home&m=EditProfile" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required value="<?= $name?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required value="<?= $email?>">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="<?= $address ?? ""?>">
            </div>
            <div class="mb-3">
                <label for="contact_number" class="form-label">Contact Number</label>
                <input type="tel" class="form-control" id="contact_number" name="contact_number" value="<?= $contact_number ?? ""?>">
            </div>
            <div class="d-flex w-100 mb-3">
                <div class="w-50 me-2">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" value="<?= $city ?? ""?>">
                </div>
                <div class="w-50 ms-2">
                    <label for="province" class="form-label">Province</label>
                    <input type="text" class="form-control" id="province" name="province" value="<?= $province ?? ""?>">
                </div>
            </div>
            <div class="d-flex w-50 mb-3">
                <div class="w-25 me-3">
                    <input type="button" class="btn btn-outline-primary w-100" id="clearBtn" value="Clear">
                </div>
                <div class="w-25">
                    <input type="submit" class="btn btn-primary w-100" value="Update">
                </div>
            </div>
        </form>
    </div>
</section>