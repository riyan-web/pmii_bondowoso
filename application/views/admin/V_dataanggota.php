<div class="msg" style="display:none;">
  <?= @$this->session->flashdata('msg'); ?>
</div>

<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header"><div class="row">
          <strong class="col-md-10 card-title"><?=$sub2_judul?> : sebanyak <i class="text-danger"><?= $jumlah_kader; ?></i> Kader</strong>
          <button class="col-md-2 btn btn-sm btn-primary" onclick="tambah_anggota()"><i class="fa fa-plus-square"></i> Tambah Data</button>  
          </div>
          </div>
          <div class="card-body">
            <table id="tb_anggota" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <!-- <th class="text-center"><i class="fa fa-plus"></i></th> -->
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>No HP</th>
                  <th>TTL</th>
                  <?php if($this->session->userdata['jenis'] == 4) {?> 
                  <th>Komisariat</th>
                  <?php }?>
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

<script>

var dataTable;
$(document).ready(function() {
    dataTable = $('#tb_anggota').DataTable( {
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
        },
          ],
      "sPaginationType": "simple_numbers", 
      "iDisplayLength": 10,
      "aLengthMenu": [[10, 20, 50, 100, 150], [10, 20, 50, 100, 150]],
      "ajax":{
        url :"<?= base_url('admin/data_anggota/'.$namaController); ?>",
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


function tambah_anggota()
 {
     save_method = 'tambahAnggota';
     $('#form-anggota')[0].reset(); 
     $('#anggota').modal('show');
     $('.form-msg').html('');
     $('.modal-title').text('Tambah Anggota Baru'); 
     $('#label-foto').text('Upload Foto'); // merubah label
     $('#foto-preview').hide(); //menyembunyikan foto sebelumnya
    //  $('#prodi').show();$('#angkatan').show();$('#keterangan').show();
 }

</script>