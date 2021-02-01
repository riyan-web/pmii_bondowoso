<?php
$query_berita = "SELECT *
                FROM  `tb_konten` 
                JOIN `jeniskonten` ON  `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id`
                JOIN `tb_user` ON  `tb_konten`.`user_id` = `tb_user`.`id`
                JOIN `subjeniskonten` ON `jeniskonten`.`id` = `subjeniskonten`.`jeniskonten_id`
                WHERE`tb_konten`.`status` = '2' AND `subjeniskonten`.`nama` = 'berita' AND `tb_user`.`komisariat_id` = $id_kom
                ORDER BY `tb_konten`.`id_konten` DESC LIMIT 6
                ";
$berita_baru = $this->db->query($query_berita)->result();

?>
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Berita</h2>
        <ol>
          <li><a href=<?= base_url('beranda') ?>>Beranda</a></li>
          <li>Berita</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->
  <!-- ======= Blog Section ======= -->
  <section id="blog" class="blog">
    <div class="container">

      <div class="row">

        <div class="col-lg-8 entries">
          <?php foreach ($berita->result() as $ber) { ?>


            <article class="entry" data-aos="fade-up">

              <div class="entry-img">
                <img src="<?php echo base_url('upload/berita/') . $ber->foto_artikel; ?>" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <?php echo $ber->judul; ?>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="#"><?php echo $ber->username; ?></a></li>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="#"><time datetime="2020-01-01"><?php echo $ber->tgl_buat; ?></time></a></li>
                  <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="#">0 Comments</a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                  <?php echo substr($ber->isi_konten, 0, 200) . "..."; ?>
                </p>
                <div class="read-more">
                  <a href="<?php echo base_url('komisariat/detail_berita/' . $ber->slug) ?>" class="btn-buy">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->
          <?php } ?>


          <?php echo $pagination; ?>

        </div><!-- End blog entries list -->

        <div class="col-lg-4">

          <div class="sidebar" data-aos="fade-left">

            <h3 class="sidebar-title">Search</h3>
            <div class="sidebar-item search-form">
              <form action="">
                <input type="text">
                <button type="submit"><i class="icofont-search"></i></button>
              </form>

            </div><!-- End sidebar search formn-->

            <h3 class="sidebar-title">Berita Terbaru</h3>
            <div class="sidebar-item recent-posts">
              <?php foreach ($berita_baru as $berbar) { ?>
                <div class="post-item clearfix">
                  <img src="" alt="" class="img-fluid">
                  <img src="<?php echo base_url('upload/berita/') . $berbar->foto_artikel; ?>" alt="">
                  <h4>
                    <a href="<?php echo base_url('/komisariat/detail_berita/' . $berbar->slug) ?>" class="btn-buy"> <?php echo $berbar->judul; ?></a>
                  </h4>
                  <time datetime="2020-01-01"><?php echo $berbar->tgl_buat; ?></time>
                </div>
              <?php } ?>
            </div>
          </div><!-- End sidebar recent posts-->
          <!-- Modal -->
        </div><!-- End sidebar -->

      </div><!-- End blog sidebar -->

    </div>

    </div>
  </section><!-- End Blog Section -->

</main><!-- End #main -->