<?php
$query_recentpost = "SELECT *
                FROM  `tb_konten` 
                JOIN `jeniskonten` ON  `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id`
                JOIN `tb_user` ON  `tb_konten`.`user_id` = `tb_user`.`id`
                JOIN `subjeniskonten` ON `jeniskonten`.`id` = `subjeniskonten`.`jeniskonten_id`
                WHERE`tb_konten`.`status` = 2 AND `subjeniskonten`.`nama` = 'berita'
                ORDER BY RAND() LIMIT 6
                ";
$recent_post = $this->db->query($query_recentpost)->result();

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
                  <a href="<?php echo  $ber->judul; ?>" data-toggle="modal" data-target="#myModal<?php echo $ber->id_konten; ?>">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->
            <!-- Modal -->
            <div id="myModal<?php echo $ber->id_konten; ?>" class="modal fade" role="dialog">
              <div class="modal-dialog modal-lg">
                <!-- konten modal-->
                <div class="modal-content">
                  <!-- heading modal -->
                  <div class="modal-header">
                    <h3 class="modal-title"><?php echo $ber->judul ?></h3>
                  </div>
                  <img src="<?php echo base_url('upload/berita/') . $ber->foto_artikel; ?>" class="img-fluid" alt="">
                  <!-- body modal -->
                  <div class="modal-body">
                    <?php echo $ber->isi_konten . "..."; ?>
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

            <h3 class="sidebar-title">Categories</h3>
            <div class="sidebar-item categories">
              <ul>
                <li><a href="#">Opini <span>
                      <?php
                      $jum_opini = "SELECT COUNT(*) AS jumlah
                            FROM `tb_konten`
                            JOIN `jeniskonten` ON `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id` 
                            JOIN `subjeniskonten` ON `jeniskonten`.`id` = `subjeniskonten`.`jeniskonten_id`
                            WHERE `subjeniskonten`.`nama` = 'berita' AND `jeniskonten`.`nama_jenis` = 'opini'
                            ";
                      $opini = $this->db->query($jum_opini)->row_array();
                      echo "(" . $opini['jumlah'] . ")";
                      ?>
                    </span></a></li>
                <li><a href="#">Investigasi <span>
                      <?php
                      $jum_investigasi = "SELECT COUNT(*) AS jumlah
                            FROM `tb_konten`
                            JOIN `jeniskonten` ON `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id` 
                            JOIN `subjeniskonten` ON `jeniskonten`.`id` = `subjeniskonten`.`jeniskonten_id`
                            WHERE `subjeniskonten`.`nama` = 'berita' AND `jeniskonten`.`nama_jenis` = 'investigasi'
                            ";
                      $investigasi = $this->db->query($jum_investigasi)->row_array();
                      echo "(" . $investigasi['jumlah'] . ")";
                      ?>
                    </span></a></li>
                <li><a href="#">Interpretative <span>
                      <?php
                      $jum_interpretative = "SELECT COUNT(*) AS jumlah
                            FROM `tb_konten`
                            JOIN `jeniskonten` ON `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id` 
                            JOIN `subjeniskonten` ON `jeniskonten`.`id` = `subjeniskonten`.`jeniskonten_id`
                            WHERE `subjeniskonten`.`nama` = 'berita' AND `jeniskonten`.`nama_jenis` = 'interpretative'
                            ";
                      $interpretative = $this->db->query($jum_interpretative)->row_array();
                      echo "(" . $interpretative['jumlah'] . ")";
                      ?>
                    </span></a></li>
                <li><a href="#">Depth <span>
                      <?php
                      $jum_depth = "SELECT COUNT(*) AS jumlah
                            FROM `tb_konten`
                            JOIN `jeniskonten` ON `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id` 
                            JOIN `subjeniskonten` ON `jeniskonten`.`id` = `subjeniskonten`.`jeniskonten_id`
                            WHERE `subjeniskonten`.`nama` = 'berita' AND `jeniskonten`.`nama_jenis` = 'depth'
                            ";
                      $depth = $this->db->query($jum_depth)->row_array();
                      echo "(" . $depth['jumlah'] . ")";
                      ?>
                    </span></a></li>
              </ul>
            </div><!-- End sidebar categories-->

            <h3 class="sidebar-title">Recent Posts</h3>
            <div class="sidebar-item recent-posts">
              <?php foreach ($recent_post as $post) { ?>
                <div class="post-item clearfix">
                  <img src="" alt="" class="img-fluid">
                  <img src="<?php echo base_url('upload/berita/') . $post->foto_artikel; ?>" alt="">
                  <h4>
                    <a href="  <?php echo $post->judul; ?>" data-toggle="modal" data-target="#myModal2<?php echo $post->id_konten; ?>">
                      <?php echo $post->judul; ?></a>
                  </h4>
                  <time datetime="2020-01-01"><?php echo $post->tgl_buat; ?></time>
                </div>
              <?php } ?>
            </div>
          </div><!-- End sidebar recent posts-->
          <!-- Modal -->


          <div id="myModal2<?php echo $post->id_konten; ?>" class="modal fade" role="dialog">
            <?php
            $konten_id = $post->id_konten;
            $query_modal = "SELECT * FROM tb_konten WHERE `tb_konten`.`id_konten` = $konten_id ";
            $modal = $this->db->query($query_modal)->row_array();
            ?>
            <div class="modal-dialog modal-lg">
              <!-- konten modal-->
              <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                  <h3 class="modal-title"><?php echo $modal['judul'] ?></h3>
                </div>
                <img src="<?php echo base_url('upload/berita') . $modal['foto_artikel']; ?>" class="img-fluid" alt="">
                <!-- body modal -->
                <div class="modal-body">
                  <?php echo $modal['isi_konten'] . "..."; ?>
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


          </div><!-- End sidebar -->

        </div><!-- End blog sidebar -->

      </div>

    </div>
  </section><!-- End Blog Section -->

</main><!-- End #main -->