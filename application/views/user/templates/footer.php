<hr>
<footer class="section-p1">
    <div class="col">
        <?php foreach ($bawah as $b) { ?>
        <?php } ?>
        <!-- <img class="logo" src="<?= base_url("assets/admin/logo/logoig.jpg") ?>" class="logo" alt="" width="50px"> -->
        <h4>Contact</h4>
        <p><strong>Address: </strong> <?= $b->address; ?></p>
        <p><strong>Phone : </strong> <?= $b->phone; ?> </p>
        <p><strong>Date : </strong> <?php echo date('D, d-m-y'); ?></p>
        <div class="follow">
            <h4>Follow Us</h4>
            <div class="icon">
                <?php foreach ($sosmed as $sos) { ?>
                    <a href="<?= $sos->link; ?>"><i class="<?= $sos->icon; ?>"></i></a>
                <?php } ?>
                <!-- <i class="fab fa-facebook"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-pinterest-p"></i>
                <i class="fab fa-youtube"></i> -->
            </div>
        </div>
    </div>

    <div class="col">
        <h4>About</h4>
        <a href="<?= base_url('user/about'); ?>">About us</a>
        <a href="<?= base_url('user/about'); ?>">Contact Us</a>
    </div>

    <div class="col">
        <h4>My Account</h4>
        <a href="<?= base_url('user/about'); ?>">Help</a>
    </div>

    <div class="col install">
        <h4>Install App</h4>
        <p>From App Store Or Google Play</p>
        <!-- <div class="row">
            <img src="<?= base_url("assets/admin/logo/app.png"); ?>" alt="" width="170px">
            <img src="<?= base_url("assets/admin/logo/google.jpg"); ?>" alt="" width="170px">
        </div>
        <p>Secured Payment Gateways</p>
        <img src="<?= base_url("assets/admin/logo/visa.png"); ?>" alt="" width="300px"> -->
    </div>

    <div class="copyright">
        <p>&copy; <?php echo date('d-m-y'); ?>, <?= $b->alamat_website; ?></p>
    </div>

</footer>

</body>

</html>