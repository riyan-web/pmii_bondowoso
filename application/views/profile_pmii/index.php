 <!-- ======= Hero Section ======= -->
 <section id="hero">
     <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

         <div class="carousel-inner" role="listbox">

             <!-- Slide 1 -->
             <div class="carousel-item active" style="background-image: url(<?php echo base_url() ?>upload/slide/satu.jpg);">
                 <div class="carousel-container">
                     <div class="carousel-content animate__animated animate__fadeInUp">
                         <h2>Sejarah <span>PMII</span></h2>
                         <p>Pergerakan Mahasiswa Islam Indonesia merupakan salah satu organisasi kemahasiswaan yang bersandar atas komitmen keislaman dan keindonesiaan. PMII didirikan di Surabaya pada tanggal 21 syawal 1379 H beretepatan dengan 17 April 1960. Kini PMII telah memiliki lebih dari 200 Cabang yang tersebar di seluruh penjuru Nusantara. Termasuk PMII Bondowoso.</p>
                         <div class="text-center"><a href="<?php echo base_url('beranda/about') ?>" class="btn-get-started">Read More</a></div>
                     </div>
                 </div>
             </div>

             <!-- Slide 2 -->
             <div class="carousel-item" style="background-image: url(<?php echo base_url() ?>upload/slide/dua.jpg);">
                 <div class="carousel-container">
                     <div class="carousel-content animate__animated animate__fadeInUp">
                         <h2>Tujuan <span>PMII</span></h2>
                         <p>Terbentuknya pribadi muslim Indonesia yang bertaqwa kepada Allah SWT, berbudi luhur, berilmu, cakap dan bertanggung jawab dalam mengamalkan ilmunya serta komitmen memperjuangkan cita-cita kemerdekaan Indonesia.</p>
                         <div class="text-center"><a href="<?php echo base_url('beranda/about') ?>" class="btn-get-started">Read More</a></div>
                     </div>
                 </div>
             </div>

             <!-- Slide 3 -->
             <div class="carousel-item" style="background-image: url(<?php echo base_url() ?>upload/slide/tiga.jpg);">
                 <div class="carousel-container">
                     <div class="carousel-content animate__animated animate__fadeInUp">
                         <h2>Visi & Misi <span>PMII</span></h2>
                         <p>Visi PMII yaitu, dikembangkan dari dua landasan utama, yakni visi ke-Islaman dan visi kebangsaan. Sedangkan, </p>
                         <p>Misi PMII Merupakan manifestasi dari komitmen ke-Islaman dan ke-Indonesiaan, dan sebagai perwujudan kesadaran beragama, berbangsa, dan bernegara.</p>
                         <div class="text-center"><a href="<?php echo base_url('beranda/about') ?>" class="btn-get-started">Read More</a></div>
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
                 <h2>Masa Khidmat <strong>2019 - 2020</strong></h2>
             </div>
             <div class="row">
                 <?php foreach ($struktur as $struk) { ?>
                     <div class="col-lg-4 col-md-6">
                         <div class="icon-box" data-aos="fade-up">
                             <div><i><img src="<?php echo base_url('assets/frontend/img/team/') . $struk->foto; ?>" class="icon" alt=""></i></div>
                             <h4 class="title"><a href=""><?php echo $struk->tipe; ?></a></h4>
                             <p class="description"><?php echo $struk->nama; ?></p>
                         </div>
                     </div>
                 <?php } ?>
             </div>

         </div>
     </section><!-- End Services Section -->

     <!-- ======= Portfolio Section ======= -->
     <section id="portfolio" class="portfolio">
         <div class="container">

             <div class="section-title" data-aos="fade-up">
                 <h2>Some of our <strong>recent works</strong></h2>
             </div>

             <div class="row" data-aos="fade-up">
                 <div class="col-lg-12 d-flex justify-content-center">
                     <ul id="portfolio-flters">
                         <li data-filter="*" class="filter-active">All</li>
                         <li data-filter=".filter-app">App</li>
                         <li data-filter=".filter-card">Card</li>
                         <li data-filter=".filter-web">Web</li>
                     </ul>
                 </div>
             </div>

             <div class="row portfolio-container" data-aos="fade-up">

                 <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                     <img src="<?php echo base_url() ?>assets/frontend/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
                     <div class="portfolio-info">
                         <h4>App 1</h4>
                         <p>App</p>
                         <a href="<?php echo base_url() ?>assets/frontend/img/portfolio/portfolio-1.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                         <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                     </div>
                 </div>

                 <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                     <img src="<?php echo base_url() ?>assets/frontend/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                     <div class="portfolio-info">
                         <h4>Web 3</h4>
                         <p>Web</p>
                         <a href="<?php echo base_url() ?>assets/frontend/img/portfolio/portfolio-2.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                         <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                     </div>
                 </div>

                 <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                     <img src="<?php echo base_url() ?>assets/frontend/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
                     <div class="portfolio-info">
                         <h4>App 2</h4>
                         <p>App</p>
                         <a href="<?php echo base_url() ?>assets/frontend/img/portfolio/portfolio-3.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
                         <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                     </div>
                 </div>

                 <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                     <img src="<?php echo base_url() ?>assets/frontend/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
                     <div class="portfolio-info">
                         <h4>Card 2</h4>
                         <p>Card</p>
                         <a href="<?php echo base_url() ?>assets/frontend/img/portfolio/portfolio-4.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
                         <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                     </div>
                 </div>

                 <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                     <img src="<?php echo base_url() ?>assets/frontend/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
                     <div class="portfolio-info">
                         <h4>Web 2</h4>
                         <p>Web</p>
                         <a href="<?php echo base_url() ?>assets/frontend/img/portfolio/portfolio-5.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
                         <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                     </div>
                 </div>

                 <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                     <img src="<?php echo base_url() ?>assets/frontend/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
                     <div class="portfolio-info">
                         <h4>App 3</h4>
                         <p>App</p>
                         <a href="<?php echo base_url() ?>assets/frontend/img/portfolio/portfolio-6.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
                         <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                     </div>
                 </div>

                 <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                     <img src="<?php echo base_url() ?>assets/frontend/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
                     <div class="portfolio-info">
                         <h4>Card 1</h4>
                         <p>Card</p>
                         <a href="<?php echo base_url() ?>assets/frontend/img/portfolio/portfolio-7.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
                         <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                     </div>
                 </div>

                 <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                     <img src="<?php echo base_url() ?>assets/frontend/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
                     <div class="portfolio-info">
                         <h4>Card 3</h4>
                         <p>Card</p>
                         <a href="<?php echo base_url() ?>assets/frontend/img/portfolio/portfolio-8.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
                         <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                     </div>
                 </div>

                 <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                     <img src="<?php echo base_url() ?>assets/frontend/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
                     <div class="portfolio-info">
                         <h4>Web 3</h4>
                         <p>Web</p>
                         <a href="<?php echo base_url() ?>assets/frontend/img/portfolio/portfolio-9.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                         <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                     </div>
                 </div>

             </div>

         </div>
     </section><!-- End Portfolio Section -->
     <br><br>

 </main><!-- End #main -->