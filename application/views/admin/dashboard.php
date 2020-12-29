<div class="msg" style="display:none;">
    <?= @$this->session->flashdata('msg'); ?>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <div class="row">
                            <strong class="col-md-10 card-title"><?= $sub_judul ?></strong>

                        </div>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                <a href="#"><i class="fa fa-facebook pr-1"></i></a>
                                <a href="#"><i class="fa fa-twitter pr-1"></i></a>
                                <a href="#"><i class="fa fa-linkedin pr-1"></i></a>
                                <a href="#"><i class="fa fa-pinterest pr-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>