 <!-- ======= Footer ======= -->
 <footer id="footer">
 <br>
 <div class="section-title">
 <center> <h2>Team <strong>Development</strong></h2>
 <p>Prodi Teknik Informatika - Politeknik Negeri Jember</p></center>
         
        </div>
    <div class="footer-top">
      <div class="container">
        <div class="row">

        <div class="col-lg-2 col-md-6 footer-links">
            <h4>Yudi Iriyanto</h4>
            <p>yudiiriyanto7@gmail.com</p>
          </div>
          
          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Yudistiono</h4>
            <p>yudistiono992@gmail.com</p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Ana Farida</h4>
            <p>anafarida1820@gmail.com</p>
          </div>
          
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Azizah Wina Sriwinarsih</h4>
            <p>azizahwinasriwinarsih24@gmail.com</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Ilham Robby Sanjaya</h4>
            <p>ilhamrobbysanjaya@gmail.com</p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Taufik Hariyanto</h4>
            <p>taufikhariyanto@gmail.com</p>
          </div>

         

        </div>
      </div>
    </div>
 

     <div class="mr-md-auto text-center text-md-left">
       <div class="copyright">
         &copy; Copyright <strong><span>PMII Bondowoso</span></strong>. All Rights Reserved
       </div>

       
       <div class="credits">
         <!-- All the links in the footer should remain intact. -->
         <!-- You can delete the links only if you purchased the pro version. -->
         <!-- Licensing information: https://bootstrapmade.com/license/ -->
         <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flattern-multipurpose-bootstrap-template/ -->
         Designed by <a href="https://bootstrapmade.com/">Kelompok 5 TIF Bondowoso</a>
       </div>
     </div>
     <div class="social-links text-center text-md-right pt-3 pt-md-0">
       <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
       <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
       <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
       <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
       <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
     </div>
   </div>
 </footer><!-- End Footer -->

 <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

 <!-- Vendor JS Files -->
 <script src="<?php echo base_url() ?>assets/frontend/vendor/jquery/jquery.min.js"></script>
 <script src="<?php echo base_url() ?>assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?php echo base_url() ?>assets/frontend/vendor/jquery.easing/jquery.easing.min.js"></script>
 <script src="<?php echo base_url() ?>assets/frontend/vendor/php-email-form/validate.js"></script>
 <script src="<?php echo base_url() ?>assets/frontend/vendor/jquery-sticky/jquery.sticky.js"></script>
 <script src="<?php echo base_url() ?>assets/frontend/vendor/isotope-layout/isotope.pkgd.min.js"></script>
 <script src="<?php echo base_url() ?>assets/frontend/vendor/venobox/venobox.min.js"></script>
 <script src="<?php echo base_url() ?>assets/frontend/vendor/waypoints/jquery.waypoints.min.js"></script>
 <script src="<?php echo base_url() ?>assets/frontend/vendor/owl.carousel/owl.carousel.min.js"></script>
 <script src="<?php echo base_url() ?>assets/frontend/vendor/aos/aos.js"></script>
 <!-- <script src="<?php echo base_url() ?>assets/backend/vendor/jquery/dist/jquery.js"></script> -->
 <script src="<?php echo base_url() ?>assets/frontend/vendor/bootstrap/js/bootstrap.js"></script>

 <!-- Template Main JS File -->
 <script src="<?php echo base_url() ?>assets/frontend/js/main.js"></script>
 <script> 
    $(document).ready(function(){      
			$('#form_komen').on('submit', function(event){
				event.preventDefault();
        <?php if(!isset($_SESSION["jenis"])) { ?>
          let nama_pengirim = $('#email').val();
        <?php } else if($this->session->userdata['jenis'] == 4 || $this->session->userdata['jenis'] == 3) { ?>
          let nama_pengirim = <?=$this->session->userdata['username']?>;
        <?php } else if($this->session->userdata['jenis'] == 1 ) {?>
          let nama_pengirim = ' ';
        <?php } else {}?>
				let komentar = $('#komentar').val();
				
				if(nama_pengirim==''){
				    alert("Email Harus disii");
				} else if(komentar==''){
				    alert("Komentar Harus disii");
				} else {
    				var form_data = $(this).serialize();
    				$.ajax({
    					url:"<?=base_url()?>detail_konten/tambah_komentar",
    					method:"POST",
    					data:form_data,
    					success:function(data){
    						$('#form_komen')[0].reset();
    						$('#komentar_id').val('0');
    						load_comment();
    					}, error: function(data) {
    		            	console.log(data.responseText)
    		            }
    				})
				}
			});
 
			// load_comment();
 
			function load_comment(){
        <?php
          $id = $this->uri->segment('3');
          ?>
				$.ajax({
					url:"<?= site_url('detail_konten/ambil_komentar') ?>/<?= $id ?>",
					method:"POST",
					success:function(data){
						$('#display_comment').html(data);
					}, error: function(data) {
		            	console.log(data.responseText)
		            }
				})
			}
 
			$(document).on('click', '.reply', function(){
				var komentar_id = $(this).attr("id");
				$('#komentar_id').val(komentar_id);
				$('#nama_pengirim').focus();
			});
		});
	</script>
 </body>

 </html>