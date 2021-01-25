<!-- ======= Artikel Section ======= -->
<section id="testimonials" class="testimonials">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Artikel <strong><?php echo $komisariat['nama']; ?></strong></h2>
        </div>
        <div class="row">
            <?php
            foreach ($artikel->result() as $art) { ?>
                <div class="col-lg-6" data-aos="fade-up">
                    <div class="testimonial-item">
                        <img src="<?php echo base_url('upload/artikel/') . $art->foto_artikel; ?>" class="testimonial-img" alt="">
                        <h3><?php echo $art->judul ?></h3>
                        <h4>Dibuat : <?php echo $art->tgl_buat ?> &amp; Oleh : <?php echo $art->username ?></h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            <?php echo substr($art->isi_konten, 0, 150) . "..."; ?>
                            <a href="<?php echo base_url('komisariat/detail_artikel/' . $art->slug) ?>" class="btn-buy">Lanjut Baca</a>
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                </div>
                <!-- Modal -->
            <?php } ?>
        </div>
    </div>
    <div class="blog-pagination">
        <ul class="justify-content-center">
            <?php echo $pagination; ?>
        </ul>
    </div>
</section><!-- End Artikel Section -->