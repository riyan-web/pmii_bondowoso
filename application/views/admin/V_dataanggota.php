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
              <!-- : sebanyak <i class="text-danger"><?= $jumlah_kader; ?></i> Kader -->
              <strong class="col-md-10 card-title"><?= $sub2_judul ?> </strong>
              <button class="col-md-2 btn btn-sm btn-primary" onclick="tambah_anggota()"><i class="fa fa-plus-square"></i> Tambah Data</button>
            </div>
          </div>
          <div class="card-body">
            <table id="tb_anggota" class="table table-striped table-bordered">
              <thead class="thead-dark">
                <tr>
                  <th>No</th>
                  <!-- <th class="text-center"><i class="fa fa-plus"></i></th> -->
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>No HP</th>
                  <th>TTL</th>
                  <?php if ($this->session->userdata['jenis'] == 4) { ?>
                    <th>Komisariat</th>
                  <?php } ?>
                  <th>Aksi</th>
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





<?= $modal_anggota; ?>
<?php show_my_confirm('konfirmasiHapus', 'hapus-dataAnggota', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<script>
  var dataTable;
  $(document).ready(function() {
    dataTable = $('#tb_anggota').DataTable({
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
        {
          "targets": [4],
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
        url: "<?= base_url('admin/data_anggota/' . $namaController); ?>",
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


  function tambah_anggota() {
    save_method = 'tambahAnggota';
    $('#form-anggota')[0].reset();
    $('#anggota').modal('show');
    $('.form-msg').html('');
    $('.modal-title').text('Tambah Anggota Baru');
    $('#label-foto').text('Upload Foto'); // merubah label
    $('#foto-preview').hide(); //menyembunyikan foto sebelumnya
    $('#imgOne').html('<img id="preview" alt="" class="img-responsive" width="60%" />');
  }

  function simpan() {
    var url;

    if (save_method == 'tambahAnggota') {
      url = "<?= site_url('admin/data_anggota/anggota_tambah') ?>";
    } else {
      url = "<?= site_url('admin/data_anggota/anggota_proses_ubah') ?>";
    }

    var formData = new FormData($('#form-anggota')[0]);
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
          $('#imgOne').empty();
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert('gagal');
      }
    });
  }

  function anggota_ubah(id) {
    save_method = 'ubahAnggota';
    $('#form-anggota')[0].reset();
    $('#anggota').modal('show');
    $('.form-msg').html('');
    $('#foto-preview').show(); //mengeluarkan foto sebelumny
    $('.modal-title').text('Ubah Data Anggota');
    $('#imgOne').html('<img id="preview" alt=""  width="60%" class="img-responsive" />');
    $('#keterangan').hide();


    //Ajax Load data from ajax
    $.ajax({
      url: "<?= site_url('admin/data_anggota/anggota_ubah') ?>/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {

        $('[name="id"]').val(data.id);
        $('[name="nama"]').val(data.nama);
        $('[name="tmp_lahir"]').val(data.tmp_lahir);
        $('[name="tgl_lahir"]').val(data.tgl_lahir);
        $('[name="no_hp"]').val(data.no_hp);
        $('[name="komisariat_id"]').val(data.komisariat_id);
        $('[name="alamat"]').val(data.alamat);
        $('[name="tahun_mapaba"]').val(data.tahun_mapaba);
        $('[name="tahun_pkd"]').val(data.tahun_pkd);
        $('[name="tahun_pkl"]').val(data.tahun_pkl);
        $('[name="foto_lama"]').val(data.foto);
        $('#keterangan').hide(); // show photo preview modal

        if (data.foto) {
          $('#label-foto').text('Ubah foto'); // label foto upload
          $('#foto-preview div').html('<img src="<?= base_url() ?>upload/kader/' + data.foto + '" class="img-responsive">'); // show photo
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
  var id;
  $(document).on("click", ".konfirmasiHapus-anggota", function() {
    id = $(this).attr("data-id");
  })
  $(document).on("click", ".hapus-dataAnggota", function() {
    var idnya = id;

    $.ajax({
        method: "POST",
        url: "<?= base_url('admin/data_anggota/anggota_hapus'); ?>",
        data: "id=" + idnya
      })
      .done(function(data) {
        $('#konfirmasiHapus').modal('hide');
        $('.msg').html(data);
        effect_msg();
        reload_table();
      })
  })

  $(document).on('keydown', 'body', function(e) {
    var charCode = (e.which) ? e.which : event.keyCode;

    if (charCode == 118) //F7
    {
      tambah_anggota();
      return false;
    }
  });

  function detail_username(id) {
    $('#form-anggotaUsername')[0].reset();
    $('#anggotauser').modal('show');
    $.ajax({
      url: "<?= site_url('admin/data_anggota/detail_username') ?>/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {

        $('[name="username"]').val(data.kode_kartu);
        $('[name="password"]').val(data.password);
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert('gagal menampilkan data');
      }
    });
  }
</script>

<!-- modal username -->
<div class="modal fade" id="anggotauser" role="dialog">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class=" offset-md-1 col-md-11">
        <h3 style="display:block; text-align:center;" class="modal-title">Username </h3>
        <br>
        <form id="form-anggotaUsername" method="POST">
          <div class="form-group row">
            <label class="col-md-3 control-label">Username </label>
            <div class="col-md-6">
              <input type="text" class="form-control" readonly name="username"> <!-- onkeypress='return harusHurufPen(event)' -->
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 control-label">passwordnya </label>
            <div class="col-md-6">
              <input type="text" class="form-control" readonly name="password"> <!-- onkeypress='return harusHurufPen(event)' -->
            </div>
          </div>
          <div class="form-group row text-right">
            <button type="button" class="btn btn-danger btn-md btn-rounded " data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>