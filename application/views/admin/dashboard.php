<?php
$id_kom = $this->session->userdata['id_komisariat'];
$query_kader = "SELECT `tb_kader`.`id`, `tb_kader`.`nama`, `tb_kader`.`komisariat_id`
                              FROM  `tb_kader`
                              WHERE`tb_kader`.`komisariat_id` = $id_kom
                            ";

$kader = $this->db->query($query_kader)->result();

?>

<div class="msg" style="display:none;">
    <?= @$this->session->flashdata('msg'); ?>
</div>
<?= $this->session->flashdata('message'); ?>
<!-- ======= Artikel Section ======= -->
<section id="testimonials" class="testimonials">
    <div class="container">
        <a href="<?php echo 'Tambah Data Kepengurusan'; ?>" data-toggle="modal" data-target="#myModal2"> <span class="col-md-2 btn btn-sm btn-primary"><i class="fa fa-plus-square"></i> Tambah Data</a>
        <br><br>
        <div class="row">
            <?php foreach ($struktur as $struk) { ?>
                <div class="col-md-4">
                    <?php if ($struk->kader_id == NULL) { ?>
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title mb-3"><?php echo $struk->tipe; ?></strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img src="<?php echo base_url('upload/kader/default.jpg'); ?>" class="rounded-circle mx-auto d-block" style="width: 200px; height:200px;" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1"><?php 'tidak ada data'; ?></h5>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    <a href="<?php echo  $struk->tipe; ?>" data-toggle="modal" data-target="#myModal<?php echo $struk->id_struk; ?>"> <span class="fa fa-trash badge badge-warning"> Ubah</span></a>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title mb-3"><?php echo $struk->tipe; ?></strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img src="<?php echo base_url('upload/kader/') . $struk->foto; ?>" class="rounded-circle mx-auto d-block" style="width: 200px; height:200px;" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1"><?php echo $struk->nama; ?></h5>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    <a href="<?php echo  $struk->tipe; ?>" data-toggle="modal" data-target="#myModal<?php echo $struk->id_struk; ?>"> <span class="fa fa-edit badge badge-warning"> Ubah</span></a>
                                    <a href="<?php echo  $struk->tipe; ?>" data-toggle="modal" data-target="#myModalHapus<?php echo $struk->id_struk; ?>"> <span class="fa fa-trash badge badge-danger"> Hapus</span></a>

                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- Modal -->
                <div id="myModal<?php echo $struk->id_struk; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <!-- konten modal-->
                        <div class="modal-content">
                            <!-- heading modal -->
                            <div class="modal-header">
                                <h5 class="modal-title">Ubah Posisi Pengurus</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="form-horizontal" method="POST" action="<?php echo base_url('admin/dashboard/ubah_struktur'); ?>" role="form" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <input type="hidden" name="id_struk" value="<?= $struk->id_struk; ?>">
                                    <label for="company" class=" form-control-label">Tipe</label>
                                    <input type="text" name="tipe" id="tipe" value="<?php echo $this->input->post('tipe') ?? $struk->tipe; ?>" class="form-control">
                                    <?= form_error('tipe', '<small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <label>Nama Kader</label>
                                <select name="id_kader" class="form-control select2" style="width: 100%;">
                                    <option value="<?php echo $this->input->post('id_kader') ?? $struk->id_kader; ?>">- pilih -</option>
                                    <?php
                                    foreach ($kader as $kad) { ?>
                                        <option value="<?= $kad->id ?>"><?= $kad->nama ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('id_kader', '<small class="text-danger pl-2">', '</small>'); ?>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal Hapus-->
                <div id="myModalHapus<?php echo $struk->id_struk; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <!-- konten modal-->
                        <div class="modal-content">
                            <!-- heading modal -->
                            <div class="modal-header">
                                <h5 class="modal-title">Hapus Posisi Pengurus</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="form-horizontal" method="POST" action="<?php echo base_url('admin/dashboard/hapus_struktur'); ?>" role="form">
                                <div class="modal-body">
                                    <p>Anda yakin mau menghapus posisi <b><?php echo $struk->tipe . '?'; ?></b></p>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="id_struk" value="<?= $struk->id_struk; ?>">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                    <button class="btn btn-danger">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- Modal 2 -->
            <div id="myModal2" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- konten modal-->
                    <div class="modal-content">
                        <!-- heading modal -->
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Data Pengurus</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="form-horizontal" method="POST" action="<?php echo base_url('admin/dashboard/tambah_struktur'); ?>" role="form" enctype="multipart/form-data">
                            <div class="modal-body">
                                <label for="company" class=" form-control-label">Tipe</label>
                                <input type="text" name="tipe" id="tipe" class="form-control">
                                <?= form_error('tipe', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <label>Nama Kader</label>
                            <select name="id_kader" class="form-control select2" style="width: 100%;">
                                <option value="<?php echo $this->input->post('id_kader') ?? $struk->id_kader; ?>">- pilih -</option>
                                <?php
                                foreach ($kader as $kad) { ?>
                                    <option value="<?= $kad->id ?>"><?= $kad->nama ?></option>
                                <?php } ?>
                            </select>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Artikel Section -->