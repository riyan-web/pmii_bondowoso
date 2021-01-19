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
              <button class="col-md-2 btn btn-sm btn-primary" onclick="berita_tambah()"><i class="fa fa-plus-square"></i> Tambah Data</button>
            </div>
          </div>
          <div class="card-body">
            <table id="tb_berita" class="table table-striped table-bordered">
              <thead>
                <tr class="thead-dark" align="center">
                  <th style="width: 30px;">No.</th>
                  <th>Judul</th>
                  <th>Jenis Berita</th>
                  <th>status</th>
                  <th style="width:150px;">Aksi</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $modal_berita; ?>
<?php show_my_confirm('konfirmasiHapus', 'hapus-dataBerita', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php show_my_confirm('konfirmasiNonaktif', 'nonaktifkan-berita', 'Yakin Menonaktifkan Berita Ini?', 'Ya, Nonaktifkan Berita Ini'); ?>
<?php show_my_confirm('konfirmasiAktif', 'aktif-berita', 'Yakin Mengaktifkan Berita Ini?', 'Ya, Aktifkan berita Ini'); ?>
<script>
  var dataTable;
  $(document).ready(function() {
    dataTable = $('#tb_berita').DataTable({
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
        },
      ],
      "sPaginationType": "simple_numbers",
      "iDisplayLength": 10,
      "aLengthMenu": [
        [10, 20, 50, 100, 150],
        [10, 20, 50, 100, 150]
      ],
      "ajax": {
        url: "<?= base_url('admin/berita/berita_list'); ?>",
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

  function berita_tambah() {
        save_method = 'tambahBerita';
        $('#form-berita')[0].reset();
        $('#usul').hide();
        $('#berita').modal('show');
        $('.form-msg').html('');
        $('.modal-title').text('Tambah Berita Baru');
        $('#label-foto').text('Upload Foto'); // merubah label
        $('#foto-preview').hide(); //menyembunyikan foto sebelumnya
        $('#imgOne').html('<img id="preview" alt="" class="img-responsive" width="60%" />');
        CKEDITOR.instances.isi.setData('');
  }
  function berita_ubah(id) {
        save_method = 'ubahBerita';
        $('#form-berita')[0].reset();
        $('#berita').modal('show');
        $('#usul').hide();
        $('.form-msg').html('');
        $('#foto-preview').show(); //mengeluarkan foto sebelumny
        $('.modal-title').text('Ubah Data Berita');
        $('#imgOne').html('<img id="preview" alt=""  width="60%" class="img-responsive" />');
        // $('#nim').attr('readonly',true);$('#prodi').hide();$('#angkatan').hide();$('#keterangan').hide();


        //Ajax Load data from ajax
        $.ajax({
            url: "<?= site_url('admin/berita/berita_ubah') ?>/" + id,
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

        if (save_method == 'tambahBerita') {
            url = "<?= site_url('admin/berita/berita_tambah') ?>";
        } else {
            url = "<?= site_url('admin/berita/berita_proses_ubah') ?>";
        }
        CKEDITOR.instances['isi'].updateElement();
        // for (instance in CKEDITOR.instances) 
        //   {
        //       CKEDITOR.instances[instance].updateElement();
        //   }
        // ajax adding data to database

        var formData = new FormData($('#form-berita')[0]);
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
    $(document).on("click", ".konfirmasiHapus-berita", function() {
        id = $(this).attr("data-id");
    })
    $(document).on("click", ".hapus-dataBerita", function() {
        var idnya = id;

        $.ajax({
                method: "POST",
                url: "<?= base_url('admin/berita/berita_hapus'); ?>",
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
    $(document).on("click", ".konfirmasiAktif-berita", function() {
        idAkt = $(this).attr("data-id");
    })
    $(document).on("click", ".aktif-berita", function() {
        var idnya = idAkt;

        $.ajax({
                method: "POST",
                url: "<?= base_url('admin/berita/aktifkan_berita'); ?>",
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
    $(document).on("click", ".konfirmasiNonaktif-berita", function() {
        idNon = $(this).attr("data-id");
    })
    $(document).on("click", ".nonaktifkan-berita", function() {
        var idnya = idNon;

        $.ajax({
                method: "POST",
                url: "<?= base_url('admin/berita/nonaktifkan_berita'); ?>",
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