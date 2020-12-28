<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Program Kerja Komisariat</h2>
        <ol>
          <li><a href=<?= base_url('beranda') ?>>Beranda</a></li>
          <li>Program Kerja Komisariat</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->
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