<?php

$id_user = $user['id'];

$query_user = "SELECT *,`tb_kader`.`id` AS kader_id , `tb_kader`.`nama`, `tb_kader`.`foto`, `tb_komisariat`.`nama` AS nama_komisariat
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
                        </button>
                    </div>

                    <div class="dropdown for-message">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-email"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-sm-5">
                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="user-avatar rounded-circle" src="<?= base_url('upload/kader/') . $row_user['foto']; ?>" alt="User Avatar">
                    </a>

                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>

                        <a class="nav-link" href="<?= base_url('admin/Ganti_password'); ?>"><i class="fa fa-key"></i> Ganti Password</a>

                        <a class="nav-link" href="<?= base_url('login/logout'); ?>"><i class="fa fa-sign-out"></i> Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-6">
                    <?= $this->session->flashdata('message'); ?>
                    <form action="<?= base_url('admin/Ganti_password'); ?>" method="post">
                        <div class="form-group">
                            <label for="password_lama">Masukkan Password Anda</label>
                            <input type="password" class="form-control" id="password_lama" name="password_lama">
                            <?= form_error('password_lama', ' <small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password_baru1">Masukkan Password Baru </label>
                            <input type="password" class="form-control" id="password_baru1" name="password_baru1">
                            <?= form_error('password_baru1', ' <small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password_baru2">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="password_baru2" name="password_baru2">
                            <?= form_error('password_baru2', ' <small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-warning"><i class="fa fa-key"></i> Ganti Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->
</body>

</html>