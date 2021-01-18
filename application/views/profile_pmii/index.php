 <?php
    $berita_1 = $berita['id_konten'];
    $query_berita_2 = "SELECT `tb_konten`.`id_konten`, `tb_konten`.`judul`, `tb_konten`.`isi_konten`, `tb_konten`.`foto_artikel` FROM `tb_konten` 
    JOIN `jeniskonten` ON  `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id`
    JOIN `tb_user` ON  `tb_konten`.`user_id` = `tb_user`.`id`
    JOIN `subjeniskonten` ON `jeniskonten`.`id` = `subjeniskonten`.`jeniskonten_id`
    WHERE `tb_konten`.`status` = '2' AND `subjeniskonten`.`nama` = 'berita' AND `tb_konten`.`id_konten` != $berita_1
    ORDER BY RAND()";
    $berita_2 = $this->db->query($query_berita_2)->row_array();

    $id_berita_2 = $berita_2['id_konten'];
    $query_berita_3 = "SELECT `tb_konten`.`id_konten`, `tb_konten`.`judul`, `tb_konten`.`isi_konten`, `tb_konten`.`foto_artikel` FROM `tb_konten` 
    JOIN `jeniskonten` ON  `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id`
    JOIN `tb_user` ON  `tb_konten`.`user_id` = `tb_user`.`id`
    JOIN `subjeniskonten` ON `jeniskonten`.`id` = `subjeniskonten`.`jeniskonten_id`
    WHERE `tb_konten`.`status` = '2' AND `subjeniskonten`.`nama` = 'berita' AND `tb_konten`.`id_konten` != $berita_1 AND `tb_konten`.`id_konten` != $id_berita_2
    ORDER BY RAND()";
    $berita_3 = $this->db->query($query_berita_3)->row_array();

    ?>

 <!-- ======= Hero Section ======= -->
 <section id="hero">
     <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

         <div class="carousel-inner" role="listbox">

             <!-- Slide 1 -->
             <div class="carousel-item active" style="background-image: url(upload/berita/<?php echo $berita['foto_artikel'] ?>);">
                 <div class="carousel-container">
                     <div class="carousel-content animate__animated animate__fadeInUp">
                         <h2><?php echo $berita['judul']; ?></h2>
                         <p> <?php echo substr($berita['isi_konten'], 0, 200) . "..."; ?></p>
                         <div class="text-center"><a href="<?php echo base_url('Detail_konten/berita/' . $berita['id_konten']) ?>" class="btn-get-started">Read More</a></div>
                     </div>
                 </div>
             </div>

             <!-- Slide 2 -->
             <div class="carousel-item" style="background-image: url(upload/berita/<?php echo $berita_2['foto_artikel'] ?>);">
                 <div class="carousel-container">
                     <div class="carousel-content animate__animated animate__fadeInUp">
                         <h2><?php echo $berita_2['judul']; ?></h2>
                         <?php echo substr($berita_2['isi_konten'], 0, 200) . "..."; ?>
                         <div class="text-center"><a href="<?php echo base_url('Detail_konten/berita/' . $berita_2['id_konten']) ?>" class="btn-get-started">Read More</a></div>
                     </div>
                 </div>
             </div>

             <!-- Slide 3 -->
             <div class="carousel-item" style="background-image: url(upload/berita/<?php echo $berita_3['foto_artikel'] ?>);">
                 <div class="carousel-container">
                     <div class="carousel-content animate__animated animate__fadeInUp">
                         <h2><?php echo $berita_3['judul']; ?></h2>
                         <?php echo substr($berita_3['isi_konten'], 0, 200) . "..."; ?>
                         <div class="text-center"><a href="<?php echo base_url('Detail_konten/berita/' . $berita_3['id_konten']) ?>" class="btn-get-started">Read More</a></div>
                     </div>
                 </div>
             </div>

         </div>

         <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
             <span class="carousel-control-prev-icon bx bx-left-arrow" aria-hidden="true"></span>
             <span class="sr-only">Previous</span>
         </a>

         <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
             <span class="carousel-control-next-icon bx bx-right-arrow" aria-hidden="true"></span>
             <span class="sr-only">Next</span>
         </a>

         <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

     </div>
 </section><!-- End Hero -->
 <main id="main">
     <br>
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


     <br><br>

 </main><!-- End #main -->