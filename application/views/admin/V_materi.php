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
              <button class="col-md-2 btn btn-sm btn-primary" onclick="tambah_materi()"><i class="fa fa-plus-square"></i> Tambah Data</button>
            </div>
          </div>
          <div class="card-body">
            <table id="tb_materi" class="table table-bordered table-striped">
              <thead>
                <tr class="thead-dark" align="center">
                  <th style="width: 30px;">No.</th>
                  <th>Judul</th> 
                  <th>Jenis Materi</th>
                  <th>Link</th>
                  <th style="width:150px;">Action</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $modal_materi; ?>
<?php show_my_confirm('konfirmasiHapus', 'hapus-dataMateri', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<script>
  var dataTable;
  $(document).ready(function() {
    dataTable = $('#tb_materi').DataTable({
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
        }, {
          "targets": [-2],
          "orderable": false,
        },
        {
          "targets": [-3],
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
        url: "<?= base_url('admin/materi/materi_list'); ?>",
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

  function tambah_materi() {
    save_method = 'tambahMateri';
    $('#form-materi')[0].reset();
    $('#materi').modal('show');
    $('.form-msg').html('');
    $('#file-sebelumnya').hide();
    $('.modal-title').text('Tambah Materi Baru');
    $('#label-foto').text('Upload File'); // merubah label
  }

  function simpan() {
    var url;

    if (save_method == 'tambahMateri') {
      url = "<?= site_url('admin/materi/materi_tambah') ?>";
    } else {
      url = "<?= site_url('admin/materi/materi_proses_ubah') ?>";
    }

    var formData = new FormData($('#form-materi')[0]);
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
          $('.msg').html(data.msg);
          reload_table();
          effect_msg();
          setTimeout(function() {
            $("[data-dismiss=modal]").trigger({
              type: "click"
            });
          }, 200)
          $('#ooo').empty();
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert('gagal');
      }
    });
  }

  function materi_ubah(id) {
    save_method = 'ubahmateri';
    $('#form-materi')[0].reset();
    $('#materi').modal('show');
    $('.form-msg').html('');
    $('#foto-preview').show(); //mengeluarkan foto sebelumny
    $('.modal-title').text('Ubah Data Materi');
    $('#imgOne').html('<img id="preview" alt=""  width="60%" class="img-responsive" />');
    // $('#nim').attr('readonly',true);$('#prodi').hide();$('#angkatan').hide();$('#keterangan').hide();


    //Ajax Load data from ajax
    $.ajax({
      url: "<?= site_url('admin/materi/materi_ubah') ?>/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {

        $('[name="id"]').val(data.id_materi);
        $('[name="judul"]').val(data.judul_materi);
        $('[name="deskripsi"]').val(data.deskripsi_materi);
        $('[name="jenis_materi"]').val(data.jenis_materi);
        $('[name="file_lama"]').val(data.link_download);
        $("#ooo").html('<a href="<?= base_url() ?>upload/materi_pmii/'+data.link_download+'" target="_blank">'+data.link_download+'</a> <input type="checkbox" name="remove_photo" value="' + data.link_download + '"/> hapus File ketika disimpan');
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert('gagal menampilkan data');
      }
    });
  }

  var id;
  $(document).on("click", ".konfirmasiHapus-materi", function() {
    id = $(this).attr("data-id");
  })
  $(document).on("click", ".hapus-dataMateri", function() {
    var idnya = id;

    $.ajax({
        method: "POST",
        url: "<?= base_url('admin/materi/materi_hapus'); ?>",
        data: "id=" + idnya
      })
      .done(function(data) {
        $('#konfirmasiHapus').modal('hide');
        $('.msg').html(data);
        effect_msg();
        reload_table();
      })
  })
  </script>