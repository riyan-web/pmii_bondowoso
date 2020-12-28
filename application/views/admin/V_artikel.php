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
                                    <button class="col-md-2 btn btn-sm btn-primary" onclick="tambah_artikel()"><i class="fa fa-plus-square"></i> Tambah Artikel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php foreach ($konten2 as $ktn) : ?>

                        <div class="col-md-4">
                            <div class="card">
                                <img class="card-img-top" src="<?php echo base_url('upload/artikel/') . $ktn->foto_artikel; ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title mb-3"><?php echo $ktn->judul; ?></h4>
                                    <p class="card-text"><?php echo $ktn->isi_konten; ?></p>
                                    <p class="card-text"><?php if($ktn->status == 1 ) {echo "<label class='badge badge-secondary'>Menunggu Konfirmasi Admin!</label>"; } else if ($ktn->status == 2){echo "<label class='badge badge-success'>Diterbitkan!</label>";}else if($ktn->status == 3){echo "<label class='badge badge-warning'>Tidak diterbikan oleh admin</label>";} else{ echo"<label class='badge badge-danger'>Ditolak!</label>";} ?></p>
                                </div>
                            </div>
                            <a class="btn btn-warning btn-sm" title="Ubah" onclick="artikel_ubah(<?php echo $ktn->id_konten ?>)"><i class="fa fa-edit"></i></a>
                            <button class="btn btn-danger btn-sm konfirmasiHapus-anggota" title="Hapus Data" data-id="'.$row['id'].'" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></button>
                            <a class="btn btn-sm btn-secondary" href="javascript:void(0)" title="Detail Username" onclick="detail_username('."'".$row[' id']."'".')"><i class="fa fa-user"></i></a>
                            <a class="btn btn-sm btn-dark" href="javascript:void(0)" title="Reset Password" onclick="reset_anggota('."'".$row[' id']."'".')"><i class="fa fa-key"></i></a>
                            <a class="btn btn-sm-primary" href="<?php echo base_url('admin/data_anggota/pdf') ?>"> <i class="fa fa-file"></i> Export PDF</a>
                            <!-- <a class="btn btn-sm btn-info" href="javascript:void(0)" title="Detail lengkap Anggota" onclick="detail_anggota('."'".$row[' id']."'".')"><i class="fa fa-info-circle"></i></a> -->
                        </div>
                    <?php endforeach; ?>
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
                                <button class="col-md-2 btn btn-sm btn-primary" onclick="tambah_artikel()"><i class="fa fa-plus-square"></i> Tambah Artikel</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="tb_artikel" class="table table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Jenis Artikel</th>
                                        <th>Status</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?= $modal_artikel; ?>
<?php show_my_confirm('konfirmasiHapus', 'hapus-dataArtikel', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php show_my_confirm('konfirmasiNonaktif', 'nonaktifkan-artikel', 'Yakin Menonaktifkan Artikel Ini?', 'Ya, Nonaktifkan artikel Ini'); ?>
<?php show_my_confirm('konfirmasiAktif', 'aktif-artikel', 'Yakin Mengaktifkan Artikel Ini?', 'Ya, Aktifkan artikel Ini'); ?>
<script>
    var dataTable;
    $(document).ready(function() {
        dataTable = $('#tb_artikel').DataTable({
            "serverSide": true,
            "stateSave": false,
            "bAutoWidth": true,
            "oLanguage": {
                "sSearch": "<i class='fa fa-search fa-fw'></i> Pencarian : ",
                "sLengthMenu": "_MENU_ &nbsp;&nbsp;Data Per Halaman ",
                "sInfo": "Menampilkan _START_ s/d _END_ dari <b>_TOTAL_ data</b>",
                "sInfoFiltered": "(difilter dari _MAX_ total data)",
                "sZeroRecords": "Pencarian tidak ditemukan",
                "sEmptyTable": "Data kosong",
                "sLoadingRecords": "Harap Tunggu...",
                "oPaginate": {
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya"
                }
            },
            "aaSorting": [
                [0, "desc"]
            ],
            "columnDefs": [{
                    "targets": 'no-sort',
                    "orderable": false,
                },
                {
                    "targets": [-1],
                    "orderable": false,
                }
            ],
            "sPaginationType": "simple_numbers",
            "iDisplayLength": 10,
            "aLengthMenu": [
                [10, 20, 50, 100, 150],
                [10, 20, 50, 100, 150]
            ],
            "ajax": {
                url: "<?= base_url('admin/artikel/artikel_list'); ?>",
                type: "post",
                error: function() {
                    $(".my-grid-error").html("");
                    $("#my-grid").append('<tbody class="my-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#my-grid_processing").css("display", "none");
                }
            }
            <?php
            if ($this->session->flashdata('msg') != '') {
                echo "effect_msg();";
            }
            ?>
        });

    });

    function effect_msg_form() {
        // $('.form-msg').hide();
        $('.form-msg').show(1000);
        setTimeout(function() {
            $('.form-msg').fadeOut(1000);
        }, 3000);
    }

    function effect_msg() {
        // $('.msg').hide();
        $('.msg').show(1000);
        setTimeout(function() {
            $('.msg').fadeOut(1000);
        }, 3000);
    }

    function reload_table() {
        dataTable.ajax.reload(null, false); //refresh table
    }

    function tambah_artikel() {
        save_method = 'tambahArtikel';
        $('#form-artikel')[0].reset();
        $('#usul').hide();
        $('#artikel').modal('show');
        $('.form-msg').html('');
        $('.modal-title').text('Tambah Artikel Baru');
        $('#label-foto').text('Upload Foto'); // merubah label
        $('#foto-preview').hide(); //menyembunyikan foto sebelumnya
        $('#imgOne').html('<img id="preview" alt="" class="img-responsive" width="60%" />');
        CKEDITOR.instances.isi.setData('');
    }

    function artikel_ubah(id) {
        save_method = 'ubahArtikel';
        $('#form-artikel')[0].reset();
        $('#artikel').modal('show');
        $('#usul').hide();
        $('.form-msg').html('');
        $('#foto-preview').show(); //mengeluarkan foto sebelumny
        $('.modal-title').text('Ubah Data Artikel');
        $('#imgOne').html('<img id="preview" alt=""  width="60%" class="img-responsive" />');
        // $('#nim').attr('readonly',true);$('#prodi').hide();$('#angkatan').hide();$('#keterangan').hide();


        //Ajax Load data from ajax
        $.ajax({
            url: "<?= site_url('admin/artikel/artikel_ubah') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {

                $('[name="id"]').val(data.id_konten);
                $('[name="judul"]').val(data.judul);
                $('[name="jenis"]').val(data.jeniskonten_id);
                CKEDITOR.instances.isi.setData(data.isi_konten);
                $('[name="foto_lama"]').val(data.foto_artikel);
                // $('#foto-preview').show(); // show photo preview modal
                if (data.foto_artikel) {
                    $('#label-foto').text('Ubah foto'); // label foto upload
                    $('#foto-preview div').html('<img src="<?= base_url() ?>upload/artikel/' + data.foto_artikel + '" class="img-responsive">'); // show photo
                    $('#foto-preview div').append('<input type="checkbox" name="remove_photo" value="' + data.foto_artikel + '"/> hapus foto ketika disimpan'); // remove photo

                } else {
                    $('#label-foto').text('Upload Photo'); // label photo upload
                    $('#foto-preview div').text('(No photo)');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('gagal menampilkan data');
            }
        });
    }

    function simpan() {
        var url;

        if (save_method == 'tambahArtikel') {
            url = "<?= site_url('admin/artikel/artikel_tambah') ?>";
        } else {
            url = "<?= site_url('admin/artikel/artikel_proses_ubah') ?>";
        }
        CKEDITOR.instances['isi'].updateElement();
        // for (instance in CKEDITOR.instances) 
        //   {
        //       CKEDITOR.instances[instance].updateElement();
        //   }
        // ajax adding data to database

        var formData = new FormData($('#form-artikel')[0]);
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data) {

                if (data.status) {
                    $('.form-msg').html(data.msg);
                    effect_msg_form();
                } else {
                    $('#imgOne').empty();
                    // $('#imgOne').html('<img src="/Images/Flats/' + getId + '-0.png" id="preview" width="60%" alt="" class="img-responsive" />');
                    // $('#form-komisariat').modal('hide');
                    $('.msg').html(data.msg);
                    reload_table();
                    effect_msg();
                    setTimeout(function() {
                        $("[data-dismiss=modal]").trigger({
                            type: "click"
                        });
                    }, 200)
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('gagal');
            }
        });
    }
    // tombol hapus
    var id;
    $(document).on("click", ".konfirmasiHapus-artikel", function() {
        id = $(this).attr("data-id");
    })
    $(document).on("click", ".hapus-dataArtikel", function() {
        var idnya = id;

        $.ajax({
                method: "POST",
                url: "<?= base_url('admin/artikel/artikel_hapus'); ?>",
                data: "id=" + idnya
            })
            .done(function(data) {
                $('#konfirmasiHapus').modal('hide');
                $('.msg').html(data);
                effect_msg();
                reload_table();
            })
    })
    // tutup hapus
    // buka aktif
    var idAkt;
    $(document).on("click", ".konfirmasiAktif-artikel", function() {
        idAkt = $(this).attr("data-id");
    })
    $(document).on("click", ".aktif-artikel", function() {
        var idnya = idAkt;

        $.ajax({
                method: "POST",
                url: "<?= base_url('admin/artikel/aktifkan_artikel'); ?>",
                data: "id=" + idnya
            })
            .done(function(data) {
                $('#konfirmasiAktif').modal('hide');
                $('.msg').html(data);
                effect_msg();
                reload_table();
            })
    })
    // tutup aktif
    // buka nonaktif
    var idNon;
    $(document).on("click", ".konfirmasiNonaktif-artikel", function() {
        idNon = $(this).attr("data-id");
    })
    $(document).on("click", ".nonaktifkan-artikel", function() {
        var idnya = idNon;

        $.ajax({
                method: "POST",
                url: "<?= base_url('admin/artikel/nonaktifkan_artikel'); ?>",
                data: "id=" + idnya
            })
            .done(function(data) {
                $('#konfirmasiNonaktif').modal('hide');
                $('.msg').html(data);
                effect_msg();
                reload_table();
            })
    })
    // tutup nonaktif
    $(document).on('keydown', 'body', function(e) {
        var charCode = (e.which) ? e.which : event.keyCode;

        if (charCode == 118) //F7
        {
            tambah_artikel();
            return false;
        }
    });
</script>
<style>
    .modal-dialog-full-width {
        width: 100% !important;
        height: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
        max-width: none !important;

    }

    .modal-content-full-width {
        height: auto !important;
        min-height: 100% !important;
        border-radius: 0 !important;
        background-color: #ececec !important
    }

    .modal-header-full-width {
        border-bottom: 1px solid #9ea2a2 !important;
    }

    .modal-footer-full-width {
        border-top: 1px solid #9ea2a2 !important;
    }
</style>