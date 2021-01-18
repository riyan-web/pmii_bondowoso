<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Artikel</h2>
                <ol>
                    <li><a href="<?= base_url('beranda') ?>">Beranda</a></li>
                    <li>Materi PMII</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container">
            <div class="row">
                <?php
                foreach ($materi_pmii as $mat_pmii) { ?>
                    <div class="col-lg-6" data-aos="fade-up">
                        <div class="testimonial-item">
                            <img src="<?php echo base_url('upload/materi_pmii/') . $mat_pmii->link_download; ?>" class="testimonial-img" alt="">
                            <h3><?php echo $mat_pmii->judul_materi ?></h3>
                            <h4>Jenis Materi : <?php echo $mat_pmii->jenis_materi ?></h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                <?php echo substr($mat_pmii->deskripsi_materi, 0, 150) . "..."; ?>
                                <a href="<?php echo base_url() . 'beranda/download_materi/' . $mat_pmii->link_download ?>">Download File</a>
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section><!-- End Testimonials Section -->
</main><!-- End #main -->