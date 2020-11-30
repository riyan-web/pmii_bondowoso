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
                            <strong class="col-md-10 card-title"><?= $sub2_judul ?></strong>
                            <button class="col-md-2 btn btn-sm btn-primary" onclick="proker_tambah()"><i class="fa fa-plus-square"></i> Tambah Data</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="thead-dark" align="center">
                                    <th style="width: 30px;">No.</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th style="width:150px;">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>