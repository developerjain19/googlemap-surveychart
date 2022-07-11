<?php include 'includes/headerlink.php' ?>
<?php include 'includes/header.php' ?>


<section class="features text-center pt-50" id="features">
    <div class="container">


        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="feature-card active">
                    <h2 style="color: #fff;">ThankYou</h2>
                    <div class="feature-content">
                        <h3><?= sessionId('fname')  ?> <?= sessionId('lname') ?></h3>
                        <p>Your token number is:</p>
                    </div>
                    <div class="feature-icon" style="color: #fff;"><?= sessionId('user_code') ?></div>

                    <a href="<?= base_url('user') ?>" class="okay_btn">Okay</a>
                </div>
            </div>

        </div>

    </div>

</section>

<script>
    window.setTimeout(function() {

        window.location.href = "<?= base_url() ?>";

    }, 5000);
</script>


<?php include 'includes/footer.php' ?>
<?php include 'includes/footerlink.php' ?>