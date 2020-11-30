<?php

$id_user = $user['id'];
$query_user = "SELECT *, `tb_kader`.`nama`, `tb_kader`.`foto`, `tb_komisariat`.`nama` AS nama_komisariat
            FROM  `tb_user` 
            JOIN `tb_kader` ON  `tb_kader`.`id` = `tb_user`.`kader_id`
            JOIN `tb_komisariat` ON `tb_komisariat`.`id` = `tb_user`.`komisariat_id`
            WHERE `tb_user`.`id` = $id_user
            ";
"SELECT tb_komisariat.nama FROM `tb_user` JOIN tb_komisariat ON tb_komisariat.id = tb_user.komisariat_id WHERE tb_user.id = 4";
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
                        <section class="card">
                            <div class="card-header user-header alt bg-dark">
                                <div class="media">
                                    <a href="#">
                                        <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="<?php echo base_url('assets/backend/images/') . $row_user['foto']; ?>">
                                    </a>
                                    <div class="media-body">
                                        <h2 class="text-light display-6"><?php echo $row_user['nama']; ?></h2>
                                        <p><?php echo $row_user['nama_komisariat']; ?></p>
                                    </div>
                                </div>
                            </div>


                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a href="#"> <i class="fa fa-envelope-o"></i> <?php echo $row_user['alamat']; ?> <span class="badge badge-primary pull-right">10</span></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#"> <i class="fa fa-tasks"></i> <?php echo $row_user['no_hp']; ?> <span class="badge badge-danger pull-right">15</span></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#"> <i class="fa fa-bell-o"></i> <?php echo $row_user['tmp_lahir']; ?> <span class="badge badge-success pull-right">11</span></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#"> <i class="fa fa-comments-o"></i> <?php echo $row_user['tgl_lahir']; ?> <span class="badge badge-warning pull-right r-activity">03</span></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#"> <i class="fa fa-comments-o"></i> <?php echo $row_user['tahun_mapaba']; ?> <span class="badge badge-warning pull-right r-activity">03</span></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#"> <i class="fa fa-comments-o"></i> <?php echo $row_user['tahun_pkd']; ?> <span class="badge badge-warning pull-right r-activity">03</span></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#"> <i class="fa fa-comments-o"></i> <?php echo $row_user['tahun_pkl']; ?> <span class="badge badge-warning pull-right r-activity">03</span></a>
                                </li>
                            </ul>

                        </section>
                    </aside>
                </div>
            </div><!-- .row -->
        </div><!-- .animated -->
    </div><!-- .content -->


</div><!-- /#right-panel -->

<!-- Right Panel -->