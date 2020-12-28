<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Profile Komisariat</h2>
                <ol>
                    <li><a href="<?= base_url('beranda') ?>">Home</a></li>
                    <li>Komisariat</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
        <div class="container">
            <div class="row no-gutters">
                <img class="col-xl-5 d-flex align-items-stretch justify-content-center justify-content-lg-start" src="<?php echo base_url('upload/komisariat/') . $komisariat['foto']; ?>" alt="">
                <div class="col-xl-7 pl-0 pl-lg-5 pr-lg-1 d-flex align-items-stretch">
                    <div class="content d-flex flex-column justify-content-center">
                        <h3 data-aos="fade-up"><?php echo $komisariat['nama']; ?></h3>
                        <p data-aos="fade-up">
                            <?php echo $komisariat['isi']; ?>
                        </p>

                    </div><!-- End .content-->
                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->
    <!-- ======= Section Menu Center======= -->
    <section id="pricing" class="pricing">
        <div class="container">

            <div class="row">

                <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
                    <div class="box featured" data-aos="fade-up">
                        <h3>Berita Komisariat</h3>
                        <h4>Berisi Berita Tentang Komisariat</h4>
                        <div class="btn-wrap">
                            <a href="<?php echo base_url('komisariat/berita') ?>" class="btn-buy">Kunjungi</a>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
                    <div class="box featured" data-aos="fade-up">
                        <h3>Program Kerja</h3>
                        <h4>Berisi Program Kerja Komisariat</h4>
                        <div class="btn-wrap">
                            <a href="<?php echo base_url('komisariat/proker') ?>" class="btn-buy">Kunjungi</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
                    <div class="box featured" data-aos="fade-up">
                        <h3>Artikel</h3>
                        <h4>Berisi Artikel Kader komisariat</h4>
                        <div class="btn-wrap">
                            <a href="<?php echo base_url('komisariat/artikel') ?>" class="btn-buy">Kunjungi</a>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </section><!-- End Section Menu Center -->

    <!-- ======= Program Kerja Section ======= -->
    <section id="cta-pricing" class="cta-pricing">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Program Kerja <strong><?php echo $komisariat['nama']; ?></strong></h2>
            </div>
            <div class="row">
                <?php
                foreach ($proker->result() as $pro) { ?>

                    <div class="col-lg-4 col-md-12">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="text-center">
                                <img src="<?php echo base_url('upload/proker/') . $pro->foto; ?>" style="width: 100%; height :250px;">
                                <h3><?php echo $pro->nama_kegiatan; ?></h3>
                                <p><?php echo $pro->isi; ?></p>
                                <h4><?php echo "Penanggung Jawab : " . $pro->penanggung_jawab; ?></h4>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </section><!-- End Program Kerja Section -->

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
                                <img src="<?php echo base_url('upload/artikel/') . $art->foto_artikel; ?>" class="testimonial-img" alt="">
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
    </section><!-- End Artikel Section -->

    <!-- ======= Struktur Pengurus Section ======= -->
    <section id="services" class="services">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Masa Khidmat <strong>2019 - 2020</strong></h2>
            </div>
            <div class="row">
                <?php foreach ($struktur as $struk) { ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="icon-box" data-aos="fade-up">
                            <div><i><img src="<?php echo base_url('upload/kader/') . $struk->foto; ?>" class="icon" alt=""></i></div>
                            <h4 class="title"><a href=""><?php echo $struk->tipe; ?></a></h4>
                            <p class="description"><?php echo $struk->nama; ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </section><!-- End Struktur Pengurus Section -->

    <!-- ======= Our Skills Section ======= -->
    <section id="skills" class="skills">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Our <strong>Skills</strong></h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row skills-content">

                <div class="col-lg-6" data-aos="fade-up">

                    <div class="progress">
                        <span class="skill">HTML <i class="val">100%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">CSS <i class="val">90%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">JavaScript <i class="val">75%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

                    <div class="progress">
                        <span class="skill">PHP <i class="val">80%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">WordPress/CMS <i class="val">90%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">Photoshop <i class="val">55%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section><!-- End Our Skills Section -->

    <!-- ======= Our Clients Section ======= -->
    <section id="clients" class="clients">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Our <strong>Clients</strong></h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo">
                        <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo">
                        <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo">
                        <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo">
                        <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo">
                        <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo">
                        <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo">
                        <img src="assets/img/clients/client-7.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo">
                        <img src="assets/img/clients/client-8.png" class="img-fluid" alt="">
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Our Clients Section -->

</main><!-- End #main -->