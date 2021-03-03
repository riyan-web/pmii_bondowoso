<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i><a href="mailto:contact@example.com">contact@example.com</a>
        <i class="icofont-phone"></i> +1 5589 55488 55
      </div>
      <div class="social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
      </div>
    </div>
  </section>
  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container d-flex">
      <a href="<?= base_url('beranda') ?>"><img src="<?php echo base_url() ?>assets/frontend/img/logo_pmii.png" alt="" class="img" height="50" width="200"></a>
      &nbsp; &nbsp; &nbsp;
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class=""><a href="<?= base_url('beranda') ?>">Home</a></li>
          <li class=""><a href="<?= base_url('beranda/about') ?>">Tentang Kami</a></li>
          <li><a href="<?= base_url('beranda/artikel') ?>">Artikel</a></li>
          <li><a href="<?= base_url('beranda/proker') ?>">Program Kerja</a></li>
          <li><a href="<?= base_url('beranda/berita') ?>">Berita</a></li>
          <li><a href="<?= base_url('beranda/materi_pmii') ?>">Materi PMII</a></li>
          <li class="drop-down"><a href="">Komisariat</a>
            <ul>
              <li><a href="<?= base_url('komisariat/unej_bondowoso/'); ?>">Unej Kampus Bondowoso</a></li>
              <li class="drop-down"><a href="<?= base_url('komisariat/unibo/'); ?>">Unibo</a>
                <ul>
                  <li><a href="<?= base_url('komisariat/unibo_nurut_taqwa/'); ?>">Rayon Nurut Taqwa</a></li>
                </ul>
              </li>
              <li class="drop-down"><a href="<?= base_url('komisariat/attaqwa/'); ?>">Raden Bagus Asra</a>
                <ul>
                  <li><a href="<?= base_url('komisariat/attaqwa_avicenna/'); ?>">Rayon Avicenna</a></li>
                  <li><a href="<?= base_url('komisariat/attaqwa_averoes/'); ?>">Rayon Averoes</a></li>
                </ul>
              </li>
              <li><a href="<?= base_url('komisariat/wahid_hasyim/'); ?>">Wahid Hasyim</a></li>
              <li><a href="<?= base_url('komisariat/togo_ambarsari/'); ?>">Togo Ambarsari</a></li>
              <li><a href="<?= base_url('komisariat/darul_falah/'); ?>">Darul Falah</a></li>
            </ul>
          </li>
          <li><a href="<?= base_url('beranda/produk_pmii') ?>">PMII Business</a></li>
          <li><a href="<?= base_url('beranda/struktur') ?>">Struktur</a></li>
          <li><a href="<?= base_url('login') ?>" class="linkedin"><i class="icofont-login"></i>Login</a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->