<body>
  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container d-flex">

      <div class="">
        <!-- <h1 class="text-light"><a href="#">PMII Bondowoso</a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->

        <a href="<?= base_url('beranda') ?>"><img src="<?php echo base_url() ?>assets/frontend/img/log_pmii.png" alt="" class="img" height="52" width="200"></a>
      </div>
      &nbsp; &nbsp; &nbsp;
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class=""><a href="<?= base_url('beranda') ?>">Home</a></li>
          <li class=""><a href="<?= base_url('beranda/about') ?>">Tentang Kami</a></li>
          <li><a href="<?= base_url('beranda/artikel') ?>">Artikel</a></li>
          <li><a href="<?= base_url('beranda/proker') ?>">Program Kerja</a></li>
          <li><a href="<?= base_url('beranda/berita') ?>">Berita</a></li>
          <li class="drop-down"><a href="">Komisariat</a>
            <ul>
              <li><a href="<?= base_url('komisariat/unej_bondowoso/'); ?>">Unej Kampus Bondowoso</a></li>
              <li class="drop-down"><a href="<?= base_url('komisariat/unibo/'); ?>">Unibo</a>
                <ul>
                  <li><a href="<?= base_url('komisariat/unibo/nurut_taqwa/'); ?>">Rayon Nurut Taqwa</a></li>
                </ul>
              </li>
              <li class="drop-down"><a href="<?= base_url('komisariat/attaqwa/'); ?>">Raden Bagus Asra</a>
                <ul>
                  <li><a href="<?= base_url('komisariat/attaqwa/avicenna/'); ?>">Rayon Avicenna</a></li>
                  <li><a href="<?= base_url('komisariat/attaqwa/averoes/'); ?>">Rayon Averoes</a></li>
                </ul>
              </li>
              <li><a href="<?= base_url('komisariat/wahid_hasyim/'); ?>">Wahid Hasyim</a></li>
              <li><a href="<?= base_url('komisariat/togo_ambarsari/'); ?>">Togo Ambarsari</a></li>
              <li><a href="<?= base_url('komisariat/darul_falah/'); ?>">Darul Falah</a></li>
            </ul>
          </li>
          <li><a href="<?= base_url('beranda/struktur') ?>">Struktur Pengurus</a></li>
          <li>
          <li><a href="<?= base_url('login') ?>">Login</a></li>
    </div>
    </li>

    </ul>
    </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->