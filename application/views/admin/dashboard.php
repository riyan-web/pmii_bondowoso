<div class="msg" style="display:none;">
    <?= @$this->session->flashdata('msg'); ?>
</div>



<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <?php foreach ($struktur as $struk) {  ?>
                <div class="col-md-4">
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
                                <a href="<?php echo  $struk->tipe; ?>" data-toggle="modal" data-target="#myModal<?php echo $struk->id; ?>"> <span class="fa fa-edit badge badge-warning"> Ubah</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div id="myModal<?php echo $struk->id; ?>" class="modal fade" role="dialog">
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
                                    <input type="hidden" name="id_struk" value="<?= $struk->id; ?>">
                                    <label for="company" class=" form-control-label">Tipe</label>
                                    <input type="text" name="tipe" id="tipe" value="<?php echo $this->input->post('tipe') ?? $struk->tipe; ?>" class="form-control">
                                </div>
                                <label>Nama Konsumen</label>
                                <select name="id_konsumen" class="form-control select2" style="width: 100%;">
                                    <option value="">- pilih -</option>
                                    <?php
                                    foreach ($konsumen as $konsum) { ?>
                                        <option value="<?= $konsum->id_konsumen ?>"><?= $konsum->nama_konsumen ?></option>

                                    <?php } ?>
                                </select>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>