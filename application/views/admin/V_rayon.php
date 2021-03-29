<div class="msg" style="display:none;">
  <?= @$this->session->flashdata('msg'); ?>
</div>
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header"><div class="row">
          <strong class="col-md-10 card-title"><?= $sub2_judul ?></strong>
          <button class="col-md-2 btn btn-sm btn-primary" onclick="tambah_rayon()"><i class="fa fa-plus-square"></i> Tambah Data</button>  
          </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="tb_rayon"  class="table table-striped table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th width="1">No</th>
                    <!-- <th class="text-center"><i class="fa fa-plus"></i></th> -->
                    <th>Nama Rayon</th>
                    <th>Foto</th>
                    <th>Jumlah Kader</th>
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
</div>
<?= $modal_rayon; ?>
<script>

var dataTable; 
$(document).ready(function() {
    dataTable = $('#tb_rayon').DataTable( {
      "serverSide": true,
      "stateSave" : false,
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
      "aaSorting": [[ 0, "desc" ]],
      "columnDefs": [ 
        {
          "targets": 'no-sort',
          "orderable": false,
        },
        { 
          "targets": [ -1 ],
          "orderable": false, 
        },{ 
          "targets": [ -2 ],
          "orderable": false, 
        },
        { 
          "targets": [ -3 ],
          "orderable": false, 
        },
          ],
      "sPaginationType": "simple_numbers", 
      "iDisplayLength": 10,
      "aLengthMenu": [[10, 20, 50, 100, 150], [10, 20, 50, 100, 150]],
      "ajax":{
        url :"<?= base_url('admin/data_rayon/rayon_list'); ?>",
        type: "post",
        error: function(){ 
          $(".my-grid-error").html("");
          $("#my-grid").append('<tbody class="my-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
          $("#my-grid_processing").css("display","none");
        }
      }
      <?php
      if ($this->session->flashdata('msg') != '') {
        echo "effect_msg();";
      }
    ?>
    } );

  });
  function effect_msg_form() {
      // $('.form-msg').hide();
      $('.form-msg').show(1000);
      setTimeout(function() { $('.form-msg').fadeOut(1000); }, 3000);
    }

    function effect_msg() {
      // $('.msg').hide();
      $('.msg').show(1000);
      setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
    }

  function reload_table()
  {
      dataTable.ajax.reload(null,false); //refresh table
  }

  function tambah_rayon() {
    save_method = 'tambahRayon';
    $('#form-rayon')[0].reset();
    $('#rayon').modal('show');
    $('.form-msg').html('');
    $('.modal-title').text('Tambah Rayon Baru');
    $('#label-foto').text('Upload Foto Rayon'); // merubah label
    $('#foto-preview').hide(); //menyembunyikan foto sebelumnya
    $('#imgOne').html('<img id="preview" alt="" class="img-responsive" width="60%" />');
  }

  function simpan() {
    var url;

    if (save_method == 'tambahRayon') {
      url = "<?= site_url('admin/data_rayon/rayon_tambah') ?>";
    } else {
      url = "<?= site_url('admin/data_rayon/rayon_proses_ubah') ?>";
    }

    var formData = new FormData($('#form-rayon')[0]);
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
          }, 10)
          $('#imgOne').empty();
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert('gagal');
      }
    });
  }
  </script>