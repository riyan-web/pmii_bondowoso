<?php
// $query_artikel = "SELECT *
//                 FROM  `tb_konten` 
//                 JOIN `jeniskonten` ON  `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id`
//                 JOIN `tb_user` ON  `tb_konten`.`pembuat` = `tb_user`.`id`
//                 JOIN `subjeniskonten` ON `jeniskonten`.`id` = `subjeniskonten`.`jeniskonten_id`
//                 WHERE`tb_konten`.`status` = 2 AND `subjeniskonten`.`nama` = 'artikel'
//                 ORDER BY RAND() LIMIT 6
//                 ";
// $artikel = $this->db->query($query_artikel)->result();
?>

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Artikel</h2>
                <ol>
                    <li><a href="<?= base_url('beranda') ?>">Beranda</a></li>
                    <li>Artikel</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container">
            <div class="row">
                <?php
                foreach ($artikel->result() as $art) { ?>
                    <div class="col-lg-6" data-aos="fade-up">
                        <div class="testimonial-item">
                            <img src="<?php echo base_url('assets/frontend/img/img_artikel/') . $art->foto_artikel; ?>" class="testimonial-img" alt="">
                            <h3><?php echo $art->judul ?></h3>
                            <h4>Dibuat : <?php echo $art->tgl_buat ?> &amp; Oleh : <?php echo $art->username ?></h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                <?php echo substr($art->isi_konten, 0, 150) . "..."; ?>
                                <a href="<?php echo  $art->judul; ?>" class="btn-buy" data-toggle="modal" data-target="#myModal<?php echo $art->id_konten; ?>">Lanjut Baca</a>
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div id="myModal<?php echo $art->id_konten; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <!-- konten modal-->
                            <div class="modal-content">
                                <!-- heading modal -->
                                <div class="modal-header">
                                    <h3 class="modal-title"><?php echo $art->judul ?></h3>
                                </div>
                                <img src="<?php echo base_url('assets/frontend/img/img_artikel/') . $art->foto_artikel; ?>" class="testimonial-img" alt="">
                                <!-- body modal -->
                                <div class="modal-body">
                                    <?php echo $art->isi_konten . "..."; ?>
                                    <div class="social-links">
                                        <a href="#" class="twitter"><i class="icofont-like"></i> Like </a>
                                        <a href="#" class="skype"><i class="icofont-comment"> Comment </i></a>
                                        <a href="#" class="skype"><i class="icofont-share"> Share</i></a>
                                    </div>
                                </div>
                                <!-- footer modal -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="blog-pagination">
            <ul class="justify-content-center">
                <?php echo $pagination; ?>
            </ul>
        </div>
    </section><!-- End Testimonials Section -->
</main><!-- End #main -->