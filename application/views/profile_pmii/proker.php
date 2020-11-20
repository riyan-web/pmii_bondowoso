<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Program Kerja</h2>
            <ol>
                <li><a href=<?= base_url('beranda') ?>>Beranda</a></li>
                <li>Program Kerja</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->
<section id="cta-pricing" class="cta-pricing">
    <div class="container">
        <?php
        foreach ($proker->result() as $pro) { ?>
            <div class="col-lg col-md-6 d-flex align-items-stretch">
                <div class="member" data-aos="fade-up" data-aos-delay="100">
                    <div class="member-img">
                        <img src="<?= base_url() ?>assets/frontend/img/team/team-2.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="member-info">
                        <h4>Sarah Jhonson</h4>
                        <span>Product Manager</span>
                    </div>
                </div>
                <div class="text-center">
                    <h3>Call To Action</h3>
                    <p><?php echo $pro->isi; ?></p>
                    <a class="cta-btn" href="#">Call To Action</a>
                </div>
            </div>
        <?php } ?>



    </div>

</section><!-- End Cta Pricing Section -->