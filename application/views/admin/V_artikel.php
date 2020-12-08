<?php if ($user['jenis'] == 1) {
?><div class="msg" style="display:none;">
        <?= @$this->session->flashdata('msg'); ?>
    </div>
    <div id="right-panel" class="right-panel">
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header">
                                <div class="row">
                                    <strong class="col-md-10 card-title"><?= $sub2_judul ?></strong>
                                    <button class="col-md-2 btn btn-sm btn-primary" onclick="artikel_tambah()"><i class="fa fa-plus-square"></i> Tambah Artikel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo base_url('assets/backend/images/placeholder.png'); ?>" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title mb-3">Card Image Title</h4>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo base_url('assets/backend/images/placeholder.png'); ?>" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title mb-3">Card Image Title</h4>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo base_url('assets/backend/images/placeholder.png'); ?>" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title mb-3">Card Image Title</h4>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                </div><!-- .row -->
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
<?php } else { ?>
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
                                <button class="col-md-2 btn btn-sm btn-primary" onclick="artikel_tambah()"><i class="fa fa-plus-square"></i> Tambah Data</button>
                            </div>
                        </div>
                        <div class="card-body">
                        <form class="form-inline">
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Data Per Halaman</label>
                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                <option selected>Pilih...</option>
                                <option value="1">10</option>
                                <option value="2">50</option>
                                <option value="3">100</option>
                            </select>
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr bgcolor="aqua" align="center">
                                        <th style="width: 30px;">No.</th>
                                        <th>Judul</th>
                                        <th>Isi Konten</th>
                                        <th>Jenis Konten</th>
                                        <th>Foto Artikel</th>
                                        <th>Tanggal Buat</th>
                                        <th>Status</th>
                                        <th style="width:150px;">Action</th>
                                    </tr>

                                    <?php

                                    $no = 1;
                                    foreach ($konten as $ktn) :
                                    ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $ktn["judul"] ?></td>
                                            <td><?php echo $ktn["isi_konten"] ?></td>
                                            <td><?php echo $ktn["jeniskonten_id"] ?></td>
                                            <td><?php echo $ktn["foto_artikel"] ?></td>
                                            <td><?php echo $ktn["tgl_buat"] ?></td>
                                            <td><?php echo $ktn["status"] ?></td>
                                        </tr>

                                    <?php endforeach; ?>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <?= $modal_artikel; ?>
    <script>
        function artikel_tambah() {
            save_method = 'tambahAnggota';
            $('#form-artikel')[0].reset();
            $('#artikel').modal('show');
            $('.form-msg').html('');
            $('.modal-title').text('Tambah Artikel Baru');
            $('#label-foto').text('Upload Foto'); // merubah label
            $('#foto-preview').hide(); //menyembunyikan foto sebelumnya
            $('#imgOne').html('<img id="preview" alt="" class="img-responsive" width="60%" />');
        }
    </script>