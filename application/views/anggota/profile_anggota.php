<?php

$id_user = $user['id'];
$query_user = "SELECT *,`tb_kader`.`id` AS kader_id , `tb_kader`.`nama_kader`, `tb_kader`.`foto_kader`, `tb_komisariat`.`nama` AS nama_komisariat
            FROM  `tb_user` 
            JOIN `tb_kader` ON  `tb_kader`.`id` = `tb_user`.`kader_id`
            JOIN `tb_komisariat` ON `tb_komisariat`.`id` = `tb_user`.`komisariat_id`
            WHERE `tb_user`.`id` = $id_user
            ";
$row_user = $this->db->query($query_user)->row_array();

?>
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

                    <div class="dropdown for-notification">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger">5</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">You have 3 Notification</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                        </div>
                    </div>

                    <div class="dropdown for-message">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-email"></i>
                            <span class="count bg-primary">9</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="message">
                            <p class="red">You have 4 Mails</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jonathan Smith</span>
                                    <span class="time float-right">Just now</span>
                                    <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jack Sanders</span>
                                    <span class="time float-right">5 minutes ago</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Cheryl Wheeler</span>
                                    <span class="time float-right">10 minutes ago</span>
                                    <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-3" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
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
                        <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                    </a>

                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>

                        <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a>

                        <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>

                        <a class="nav-link" href="#"><i class="fa fa-power-off"></i> Logout</a>
                    </div>
                </div>

                <div class="language-select dropdown" id="language-select">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="language" aria-haspopup="true" aria-expanded="true">
                        <i class="flag-icon flag-icon-us"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="language">
                        <div class="dropdown-item">
                            <span class="flag-icon flag-icon-fr"></span>
                        </div>
                        <div class="dropdown-item">
                            <i class="flag-icon flag-icon-es"></i>
                        </div>
                        <div class="dropdown-item">
                            <i class="flag-icon flag-icon-us"></i>
                        </div>
                        <div class="dropdown-item">
                            <i class="flag-icon flag-icon-it"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </header><!-- /header -->
    <!-- Header-->
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <aside class="profile-nav alt">
                        <?= $this->session->flashdata('message'); ?>
                        <section class="card">
                            <div class="card-header user-header alt bg-dark">
                                <div class="media">
                                    <a href="#">
                                        <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="<?php echo base_url('assets/backend/images/anggota/') . $row_user['foto']; ?>">
                                    </a>
                                    <div class="media-body">
                                        <h2 class="text-light display-6"><?php echo $row_user['nama']; ?></h2> <a href="#" data-toggle="modal" data-target="#mediumModal"> <span class="fa fa-edit badge badge-warning pull-right"> Ubah</span></a>
                                        <p><?php echo $row_user['nama_komisariat']; ?></p>
                                    </div>
                                </div>
                            </div>


                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a href="#" data-toggle="modal" data-target="#mediumModal1"> <i class="fa fa-home"> Alamat : </i> <?php echo $row_user['alamat']; ?> <span class="fa fa-edit badge badge-warning pull-right"> Ubah</span></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#" data-toggle="modal" data-target="#mediumModal2"> <i class="fa fa-phone"> No Telepon : </i> <?php echo $row_user['no_hp']; ?> <span class="fa fa-edit badge badge-warning pull-right"> Ubah</span></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#" data-toggle="modal" data-target="#mediumModal3"> <i class="fa fa-tags"> Tempat Lahir : </i> <?php echo $row_user['tmp_lahir']; ?><span class="fa fa-edit badge badge-warning pull-right"> Ubah</span></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#" data-toggle="modal" data-target="#mediumModal4"> <i class="fa fa-calendar"> Tanggal Lahir : </i> <?php echo $row_user['tgl_lahir']; ?> <span class="fa fa-edit badge badge-warning pull-right"> Ubah</span></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#" data-toggle="modal" data-target="#mediumModal5"> <i class="fa fa-calendar-o"> Tahun Mapaba : </i> <?php echo $row_user['tahun_mapaba']; ?> <span class="fa fa-edit badge badge-warning pull-right"> Ubah</span></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#" data-toggle="modal" data-target="#mediumModal6"> <i class="fa fa-calendar-o"> Tahun PKD : </i> <?php echo $row_user['tahun_pkd']; ?> <span class="fa fa-edit badge badge-warning pull-right"> Ubah</span></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#" data-toggle="modal" data-target="#mediumModal7"> <i class="fa fa-calendar-o"> Tahun PKL : </i> <?php echo $row_user['tahun_pkl']; ?> <span class="fa fa-edit badge badge-warning pull-right"> Ubah</span></a>
                                </li>
                            </ul>

                        </section>
                    </aside>
                </div>
            </div><!-- .row -->
        </div><!-- .animated -->
    </div><!-- .content -->


</div><!-- /#right-panel -->
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Ubah Nama dan Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="POST" action="<?php echo base_url('admin/profile_anggota/ubah_nama_foto'); ?>" role="form" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="kader_id" value="<?= $row_user['kader_id']; ?>">
                    <label for="company" class=" form-control-label">Nama</label>
                    <input type="text" name="nama" id="nama" value="<?php echo $this->input->post('nama') ?? $row_user['nama'] ?>" class="form-control">
                </div>
                <div class="modal-body">
                    <div class="col-4 col-form-label">Masukkan Foto</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/backend/images/anggota/') . $row_user['foto']; ?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <input type="file" name="image" id="image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="mediumModal1" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Ubah Alamat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="POST" action="<?php echo base_url('admin/profile_anggota/ubah_alamat'); ?>" role="form">
                <div class="modal-body">
                    <input type="hidden" name="kader_id" value="<?= $row_user['kader_id']; ?>">
                    <label for="company" class=" form-control-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" value="<?php echo $this->input->post('alamat') ?? $row_user['alamat'] ?>" class="form-control">
                    <?= form_error('alamat', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="mediumModal2" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Ubah Nomor Telepon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="POST" action="<?php echo base_url('admin/profile_anggota/ubah_noTelp'); ?>" role="form">
                <div class="modal-body">
                    <input type="hidden" name="kader_id" value="<?= $row_user['kader_id']; ?>">
                    <label for="company" class=" form-control-label">Nomor Telepon</label>
                    <input type="text" name="no_telp" id="no_telp" value="<?php echo $this->input->post('no_telp') ?? $row_user['no_hp'] ?>" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="mediumModal3" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Ubah Tempat Lahir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="POST" action="<?php echo base_url('admin/profile_anggota/ubah_tmp_lahir'); ?>" role="form">
                <div class="modal-body">
                    <input type="hidden" name="kader_id" value="<?= $row_user['kader_id']; ?>">
                    <label for="company" class=" form-control-label">Tempat Lahir</label>
                    <input type="text" name="tmp_lahir" id="tmp_lahir" value="<?php echo $this->input->post('tmp_lahir') ?? $row_user['tmp_lahir'] ?>" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="mediumModal4" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Ubah Tanggal Lahir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="POST" action="<?php echo base_url('admin/profile_anggota/ubah_tgl_lahir'); ?>" role="form">
                <div class="modal-body">
                    <input type="hidden" name="kader_id" value="<?= $row_user['kader_id']; ?>">
                    <label for="company" class=" form-control-label">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir" value="<?php echo $this->input->post('tgl_lahir') ?? $row_user['tgl_lahir'] ?>" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="mediumModal5" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Ubah Tahun Mapaba</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="POST" action="<?php echo base_url('admin/profile_anggota/ubah_thnMapaba'); ?>" role="form">
                <div class="modal-body">
                    <input type="hidden" name="kader_id" value="<?= $row_user['kader_id']; ?>">
                    <label for="company" class=" form-control-label">Tahun Mapaba</label>
                    <input type="text" name="thn_mapaba" id="thn_mapaba" value="<?php echo $this->input->post('thn_mapaba') ?? $row_user['tahun_mapaba'] ?>" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="mediumModal6" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Ubah Tahun PKD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="POST" action="<?php echo base_url('admin/profile_anggota/ubah_thnPKD'); ?>" role="form">
                <div class="modal-body">
                    <input type="hidden" name="kader_id" value="<?= $row_user['kader_id']; ?>">
                    <label for="company" class=" form-control-label">Tahun PKD</label>
                    <input type="text" name="thn_pkd" id="thn_pkd" value=" <?php echo $this->input->post('thn_pkd') ?? $row_user['tahun_pkd'] ?>" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="mediumModal7" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Ubah Tahun PKL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="POST" action="<?php echo base_url('admin/profile_anggota/ubah_thnPKL'); ?>" role="form">
                <div class="modal-body">
                    <input type="hidden" name="kader_id" value="<?= $row_user['kader_id']; ?>">
                    <label for="company" class=" form-control-label">Tahun PKL</label>
                    <input type="text" name="thn_pkl" id="thn_pkl" value="<?php echo $this->input->post('thn_pkl') ?? $row_user['tahun_pkl'] ?>" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>