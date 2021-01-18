 <!-- ======= Hero Section ======= -->
 <section id="hero">
     <?php foreach ($berita as $ber) { ?>
         <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

             <div class="carousel-inner" role="listbox">
                 <div class="carousel-item active" style="background-image: url(upload/berita/<?php echo $ber->foto_artikel ?>);">
                     <div class="carousel-container">
                         <div class="carousel-content animate__animated animate__fadeInUp">
                             <h2><?php echo $ber->judul; ?></h2>
                             <p>Terbentuknya pribadi muslim Indonesia yang bertaqwa kepada Allah SWT, berbudi luhur, berilmu, cakap dan bertanggung jawab dalam mengamalkan ilmunya serta komitmen memperjuangkan cita-cita kemerdekaan Indonesia</p>
                             <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
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
     <?php } ?>
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