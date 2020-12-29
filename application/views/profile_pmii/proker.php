<main id="main">

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
    <?php
    foreach ($proker->result() as $pro) { ?>
        <div class="container">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
                <div class="text-center">
                    <h3><?php echo $pro->nama_kegiatan; ?></h3>
                    <img src="<?php echo base_url('upload/proker/') . $pro->foto; ?>" style="width: 40%; height:250px;"><br><br>
                    <p><?php echo $pro->isi; ?></p>
                    <a class="cta-btn" href=""><?php echo $pro->penanggung_jawab; ?></a>
                </div>
            </div>


        </div>
        <br><br>
    <?php } ?>
</section><!-- End Cta Pricing Section -->
<div class="blog-pagination">
    <ul class="justify-content-center">
        <?php echo $pagination; ?>
    </ul>
</div>