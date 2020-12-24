<?php
$id_kom = $this->session->userdata['id_komisariat'];
$query_kom = "SELECT *
FROM  `tb_komisariat`
WHERE`tb_komisariat`.`id` = $id_kom
";
$komisariat = $this->db->query($query_kom)->row_array();
?>

<div class="msg" style="display:none;">
    <?= @$this->session->flashdata('msg'); ?>
</div>
<div class="col sm-5">
    <div class="card mb-12" style="max-width: 100%;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?php echo base_url('upload/komisariat/') . $komisariat['foto']; ?>" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $komisariat['nama']; ?></h5>
                    <h4 class="card-title">Deskripsi Komisariat : </h4>
                    <p class="card-text"><?php echo $komisariat['isi']; ?></p>
                    <button class="col-md-4 btn btn-sm btn-warning" title="Ubah" onclick="komisariat_ubah(<?php echo $komisariat['id']; ?>)"><i class="fa fa-edit"></i> Ubah Profile Komisariat</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title mb-3">Profile Card</strong>
                    </div>
                    <div class="card-body">
                        <div class="mx-auto d-block">
                            <img class="rounded-circle mx-auto d-block" src="images/admin.jpg" alt="Card image cap">
                            <h5 class="text-sm-center mt-2 mb-1">Steven Lee</h5>
                            <div class="location text-sm-center"><i class="fa fa-map-marker"></i> California, United States</div>
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
        </div>
    </div>
</div>


<?= $modal_komisariat; ?>
<script>
    function komisariat_ubah(id) {
        save_method = 'ubahKomisariat';
        $('#form-komisariat')[0].reset();
        $('#komisariat').modal('show');
        $('.form-msg').html('');
        $('#foto-preview').show(); //mengeluarkan foto sebelumny
        $('.modal-title').text('Ubah Data Komisariat');
        $('#imgOne').html('<img id="preview" alt=""  width="60%" class="img-responsive" />');
        // $('#nim').attr('readonly',true);$('#prodi').hide();$('#angkatan').hide();$('#keterangan').hide();


        //Ajax Load data from ajax
        $.ajax({
            url: "<?= site_url('admin/profile_komisariat/komisariat_ubah') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {

                $('[name="id"]').val(data.id);
                $('[name="nama"]').val(data.nama);
                $('[name="singkatan"]').val(data.singkatan);
                //  $('[name="isi"]').val(data.isi);
                CKEDITOR.instances.isi.setData(data.isi);
                $('[name="foto_lama"]').val(data.foto);
                // $('#foto-preview').show(); // show photo preview modal

                if (data.foto) {
                    $('#label-foto').text('Ubah foto'); // label foto upload
                    $('#foto-preview div').html('<img src="<?= base_url() ?>upload/komisariat/' + data.foto + '" class="img-responsive">'); // show photo
                    $('#foto-preview div').append('<input type="checkbox" name="remove_photo" value="' + data.foto + '"/> hapus foto ketika disimpan'); // remove photo

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

        if (save_method == 'tambahKomisariat') {
            url = "<?= site_url('admin/profile_komisariat/komisariat_tambah') ?>";
        } else {
            url = "<?= site_url('admin/profile_komisariat/komisariat_proses_ubah') ?>";
        }
        CKEDITOR.instances['isi'].updateElement();
        // for (instance in CKEDITOR.instances) 
        //   {
        //       CKEDITOR.instances[instance].updateElement();
        //   }
        // ajax adding data to database

        var formData = new FormData($('#form-komisariat')[0]);
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
    $(document).on('keydown', 'body', function(e) {
        var charCode = (e.which) ? e.which : event.keyCode;

        if (charCode == 118) //F7
        {
            tambah_komisariat();
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

</div>