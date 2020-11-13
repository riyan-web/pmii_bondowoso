<?php
$query_berita = "SELECT *
                FROM  `tb_konten` 
                JOIN `jeniskonten` ON  `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id`
                JOIN `tb_user` ON  `tb_konten`.`pembuat` = `tb_user`.`id`
                WHERE`tb_konten`.`status` = 2 AND `tb_konten`.`jeniskonten_id` = 1
                ORDER BY RAND() LIMIT 3
                ";
$berita = $this->db->query($query_berita)->result();

$query_subjeniskonten = "SELECT *
                        FROM `subjeniskonten`
                        JOIN `jeniskonten` ON `subjeniskonten`.`jeniskonten_id` = `jeniskonten`.`id`
                        ";
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
          <?php foreach ($berita as $ber) { ?>
            <article class="entry" data-aos="fade-up">

              <div class="entry-img">
                <img src="<?php echo base_url('assets/frontend/img/img_berita/') . $ber->foto_artikel; ?>" alt="" class="img-fluid">
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
                  <a href="#">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->
          <?php } ?>

          <div class="blog-pagination">
            <ul class="justify-content-center">
              <li class="disabled"><i class="icofont-rounded-left"></i></li>
              <li><a href="#">1</a></li>
              <li class="active"><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
            </ul>
          </div>

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
                <li><a href="#">General <span>(25)</span></a></li>
                <li><a href="#">Lifestyle <span>(12)</span></a></li>
                <li><a href="#">Travel <span>(5)</span></a></li>
                <li><a href="#">Design <span>(22)</span></a></li>
                <li><a href="#">Creative <span>(8)</span></a></li>
                <li><a href="#">Educaion <span>(14)</span></a></li>
              </ul>

            </div><!-- End sidebar categories-->

            <h3 class="sidebar-title">Recent Posts</h3>
            <div class="sidebar-item recent-posts">
              <div class="post-item clearfix">
                <img src="<?php echo base_url() ?>assets/frontend/img/blog-recent-posts-1.jpg" alt="">
                <h4><a href="blog-single.html">Nihil blanditiis at in nihil autem</a></h4>
                <time datetime="2020-01-01">Jan 1, 2020</time>
              </div>

              <div class="post-item clearfix">
                <img src="<?php echo base_url() ?>assets/frontend/img/blog-recent-posts-2.jpg" alt="">
                <h4><a href="blog-single.html">Quidem autem et impedit</a></h4>
                <time datetime="2020-01-01">Jan 1, 2020</time>
              </div>

              <div class="post-item clearfix">
                <img src="<?php echo base_url() ?>assets/frontend/img/blog-recent-posts-3.jpg" alt="">
                <h4><a href="blog-single.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                <time datetime="2020-01-01">Jan 1, 2020</time>
              </div>

              <div class="post-item clearfix">
                <img src="<?php echo base_url() ?>assets/frontend/img/blog-recent-posts-4.jpg" alt="">
                <h4><a href="blog-single.html">Laborum corporis quo dara net para</a></h4>
                <time datetime="2020-01-01">Jan 1, 2020</time>
              </div>

              <div class="post-item clearfix">
                <img src="<?php echo base_url() ?>assets/frontend/img/blog-recent-posts-5.jpg" alt="">
                <h4><a href="blog-single.html">Et dolores corrupti quae illo quod dolor</a></h4>
                <time datetime="2020-01-01">Jan 1, 2020</time>
              </div>

            </div><!-- End sidebar recent posts-->

            <h3 class="sidebar-title">Tags</h3>
            <div class="sidebar-item tags">
              <ul>
                <li><a href="#">App</a></li>
                <li><a href="#">IT</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Mac</a></li>
                <li><a href="#">Design</a></li>
                <li><a href="#">Office</a></li>
                <li><a href="#">Creative</a></li>
                <li><a href="#">Studio</a></li>
                <li><a href="#">Smart</a></li>
                <li><a href="#">Tips</a></li>
                <li><a href="#">Marketing</a></li>
              </ul>

            </div><!-- End sidebar tags-->

          </div><!-- End sidebar -->

        </div><!-- End blog sidebar -->

      </div>

    </div>
  </section><!-- End Blog Section -->

</main><!-- End #main -->