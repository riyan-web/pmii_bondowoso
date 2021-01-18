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
                            <form action="">
                                <input type="text">
                            </form>
                            <a href="<?php echo base_url('komisariat/berita/' . $komisariat['id']) ?>" class="btn-buy">Kunjungi</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
                    <div class="box featured" data-aos="fade-up">
                        <h3>Program Kerja</h3>
                        <h4>Berisi Program Kerja Komisariat</h4>
                        <div class="btn-wrap">
                            <a href="<?php echo base_url('komisariat/proker/' . $komisariat['id']) ?>" class="btn-buy">Kunjungi</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
                    <div class="box featured" data-aos="fade-up">
                        <h3>Artikel</h3>
                        <h4>Berisi Artikel Kader komisariat</h4>
                        <div class="btn-wrap">
                            <a href="<?php echo base_url('komisariat/artikel/' . $komisariat['id']) ?>" class="btn-buy">Kunjungi</a>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </section><!-- End Section Menu Center -->

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

</main><!-- End #main -->