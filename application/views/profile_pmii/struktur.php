<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Struktur Pengurus</h2>
      <ol>
        <li><a href=<?= base_url('beranda') ?>>Beranda</a></li>
        <li>Struktur Pengurus</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Services Section ======= -->
<section id="services" class="services">
  <div class="container">
    <div class="section-title" data-aos="fade-up">
      <h2>Masa Khidmat <strong>2020 - 2021</strong></h2>
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
</section><!-- End Services Section -->