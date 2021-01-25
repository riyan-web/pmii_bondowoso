     <?php
        $id_kom = $this->session->userdata['id_komisariat'];
        $query_kom = "SELECT *
     FROM  `tb_komisariat`
     WHERE`tb_komisariat`.`id` = $id_kom
     ";
        $komisariat = $this->db->query($query_kom)->row_array();
        ?>
     <!-- Right Panel -->
     <div id="right-panel" class="right-panel">

         <!-- Header-->
         <header id="header" class="header">

             <div class="header-menu">

                 <div class="col-sm-7">
                     <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                     <div class="header-left">
                         <button class="search-trigger"><i class="fa fa-search"></i></button>
                         <div class="form-inline">
                             <form class="search-form">
                                 <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                 <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                             </form>
                         </div>
                         <?php if ($this->session->userdata['jenis'] != 1 and $this->session->userdata['jenis'] != 2) { ?>
                             <div class="dropdown for-notification">
                                 <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     <i class="fa fa-bell"></i>
                                     <?php
                                        $sql1 = "SELECT count(kader_id) as jumlah FROM `tb_konten` join tb_kader on tb_kader.id = tb_konten.kader_id WHERE tb_kader.komisariat_id = " . $this->session->userdata['id_komisariat'] . " AND tb_konten.status != '2' AND tb_konten.status != '3' AND tb_konten.status != '0' ";
                                        $jumlahSul = $this->db->query($sql1)->row();

                                        $sql2 = "SELECT count(id) as jumlahP FROM `pesan_pengunjung` where status= '0'";
                                        $jumlahPes = $this->db->query($sql2)->row();

                                        if ($this->session->userdata['jenis'] == 4) {
                                            $jumlah = $jumlahSul->jumlah + $jumlahPes->jumlahP;
                                        }
                                        if ($this->session->userdata['jenis'] == 3) {
                                            $jumlah = $jumlahSul->jumlah;
                                        }
                                        ?>
                                     <span class="count bg-danger"><?php if ($jumlahSul->jumlah < 0) {
                                                                        echo '0';
                                                                    } else {
                                                                        echo $jumlah;
                                                                    } ?></span>
                                 </button>
                                 <div class="dropdown-menu" aria-labelledby="notification">
                                     <p class="red">kamu memiliki <b><?= $jumlah ?></b> pesan</p>
                                     <a class="dropdown-item media bg-flat-color-1" href="<?= base_url('admin/artikel_usulan') ?>">
                                         <p>Ada <b><?php if ($jumlahSul->jumlah > 0) {
                                                        echo $jumlahSul->jumlah;
                                                    } else {
                                                        echo "0";
                                                    } ?></b> Kader mengusulkan Artikel baru.</p>
                                     </a>
                                     <?php if ($this->session->userdata['jenis'] == 4) { ?>
                                         <a class="dropdown-item media bg-flat-color-5" href="<?= base_url('admin/pesan_pengunjung') ?>">
                                             <p>Ada <b><?php if ($jumlahPes->jumlahP > 0) {
                                                            echo $jumlahPes->jumlahP;
                                                        } else {
                                                            echo "0";
                                                        } ?></b> pengunjung mengirim pesan.</p>
                                         </a>
                                     <?php } ?>
                                 </div>
                             </div>
                         <?php } ?>

                         <div class="dropdown for-message">
                             <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="ti-email"></i>
                                 <span class="count bg-primary">9</span>
                             </button>
                             <div class="dropdown-menu" aria-labelledby="message">
                                 <p class="red">You have 4 Mails</p>
                                 <a class="dropdown-item media bg-flat-color-1" href="#">
                                     <span class="photo media-left"><img alt="avatar" src="<?= base_url() ?>assets/backend/images/avatar/1.jpg"></span>
                                     <span class="message media-body">
                                         <span class="name float-left">Jonathan Smith</span>
                                         <span class="time float-right">Just now</span>
                                         <p>Hello, this is an example msg</p>
                                     </span>
                                 </a>
                                 <a class="dropdown-item media bg-flat-color-4" href="#">
                                     <span class="photo media-left"><img alt="avatar" src="<?= base_url() ?>assets/backend/images/avatar/2.jpg"></span>
                                     <span class="message media-body">
                                         <span class="name float-left">Jack Sanders</span>
                                         <span class="time float-right">5 minutes ago</span>
                                         <p>Lorem ipsum dolor sit amet, consectetur</p>
                                     </span>
                                 </a>
                                 <a class="dropdown-item media bg-flat-color-5" href="#">
                                     <span class="photo media-left"><img alt="avatar" src="<?= base_url() ?>assets/backend/images/avatar/3.jpg"></span>
                                     <span class="message media-body">
                                         <span class="name float-left">Cheryl Wheeler</span>
                                         <span class="time float-right">10 minutes ago</span>
                                         <p>Hello, this is an example msg</p>
                                     </span>
                                 </a>
                                 <a class="dropdown-item media bg-flat-color-3" href="#">
                                     <span class="photo media-left"><img alt="avatar" src="<?= base_url() ?>assets/backend/images/avatar/4.jpg"></span>
                                     <span class="message media-body">
                                         <span class="name float-left">Rachel Santos</span>
                                         <span class="time float-right">15 minutes ago</span>
                                         <p>Lorem ipsum dolor sit amet, consectetur</p>
                                     </span>
                                 </a>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="col-sm-5">
                     <div class="user-area dropdown float-right">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <img class="user-avatar rounded-circle" src="<?php echo base_url('upload/komisariat/') . $komisariat['foto']; ?>" alt=" User Avatar">
                         </a>

                         <div class="user-menu dropdown-menu">
                             <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>

                             <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a>

                             <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>

                             <a class="nav-link" href="#"><i class="fa fa-power-off"></i> Logout</a>
                         </div>
                     </div>

                 </div>
             </div>

         </header><!-- /header -->
         <!-- Header-->

         <div class="breadcrumbs">
             <div class="col-sm-5">
                 <div class="page-header float-left">
                     <div class="page-title">
                         <h1><?= $deskripsi ?> <?= $this->session->userdata['nama_komcab'] ?></h1>
                     </div>
                 </div>
             </div>
             <div class="col-sm-7">
                 <div class="page-header float-right">
                     <div class="page-title">
                         <ol class="breadcrumb text-right">
                             <li><a href="<?= base_url() ?>admin/dashboard">Dashboard</a></li>
                             <li><a href="<?= base_url('admin/' . $pagae) ?>"><?= $sub_judul; ?></a></li>
                             <li class="active"><?= $sub2_judul; ?></li>
                         </ol>
                     </div>
                 </div>
             </div>
         </div>

         <!-- <div class="content mt-3">

            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div> -->