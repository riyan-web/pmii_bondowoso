<div class="msg" style="display:none;">
  <?= @$this->session->flashdata('msg'); ?>
</div>
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header"><div class="row">
          <strong class="col-md-10 card-title"><?=$sub2_judul?></strong> <!-- : sebanyak <i class="text-danger"><?= $jumlah_komisariat; ?></i>-->
          <button class="col-md-2 btn btn-sm btn-primary" onclick="tambah_komisariat()"><i class="fa fa-plus-square"></i> Tambah Data</button>  
          </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="tb_komisariat"  class="table table-striped table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th width="1">No</th>
                    <!-- <th class="text-center"><i class="fa fa-plus"></i></th> -->
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
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
            




<?= $modal_komisariat; ?>
<?php show_my_confirm('konfirmasiHapus', 'hapus-dataKomisariat', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<script>

var dataTable; 
$(document).ready(function() {
    dataTable = $('#tb_komisariat').DataTable( {
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
        { 
          "targets": [ 2 ],
          "visible": false, 
        }
          ],
      "sPaginationType": "simple_numbers", 
      "iDisplayLength": 10,
      "aLengthMenu": [[10, 20, 50, 100, 150], [10, 20, 50, 100, 150]],
      "ajax":{
        url :"<?= base_url('admin/data_komisariat/komisariat_list'); ?>",
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

function tambah_komisariat()
 {
     save_method = 'tambahKomisariat';
     $('#form-komisariat')[0].reset(); 
     $('#komisariat').modal('show');
     $('.form-msg').html('');
     $('.modal-title').text('Tambah Komisariat Baru'); 
     $('#imgOne').html('<img id="preview" alt="" width="60%" class="img-responsive" />');
     $('#label-foto').text('Upload Foto'); // merubah label
     $('#foto-preview').hide(); //menyembunyikan foto sebelumnya
     CKEDITOR.instances.isi.setData('');
 }

 function komisariat_ubah(id)
{
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
        url : "<?= site_url('admin/data_komisariat/komisariat_ubah')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="nama"]').val(data.nama);
            $('[name="singkatan"]').val(data.singkatan);
            //  $('[name="isi"]').val(data.isi);
             CKEDITOR.instances.isi.setData(data.isi);
             $('[name="foto_lama"]').val(data.foto);
            // $('#foto-preview').show(); // show photo preview modal

            if(data.foto)
            {
                $('#label-foto').text('Ubah foto'); // label foto upload
                $('#foto-preview div').html('<img src="<?= base_url()?>upload/komisariat/'+data.foto+'" class="img-responsive">'); // show photo
                $('#foto-preview div').append('<input type="checkbox" name="remove_photo" value="'+data.foto+'"/> hapus foto ketika disimpan'); // remove photo

            }
            else
            {
                $('#label-foto').text('Upload Photo'); // label photo upload
                $('#foto-preview div').text('(No photo)');
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('gagal menampilkan data');
        }
    });
}

 function simpan()
{
    var url;

    if(save_method == 'tambahKomisariat') {
        url = "<?= site_url('admin/data_komisariat/komisariat_tambah')?>";
    } else {
        url = "<?= site_url('admin/data_komisariat/komisariat_proses_ubah')?>";
    }
    CKEDITOR.instances['isi'].updateElement();
    // for (instance in CKEDITOR.instances) 
    //   {
    //       CKEDITOR.instances[instance].updateElement();
    //   }
    // ajax adding data to database

    var formData = new FormData($('#form-komisariat')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) 
            {
                $('.form-msg').html(data.msg);
                effect_msg_form();
            }
            else
            {
              $('#imgOne').empty();
              // $('#imgOne').html('<img src="/Images/Flats/' + getId + '-0.png" id="preview" width="60%" alt="" class="img-responsive" />');
                // $('#form-komisariat').modal('hide');
                $('.msg').html(data.msg);
                reload_table(); 
                effect_msg();
                setTimeout(function(){
                    $("[data-dismiss=modal]").trigger({ type: "click" });
                },200)
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('gagal');
        }
    });
}
var id;
  $(document).on("click", ".konfirmasiHapus-komisariat", function() {
    id = $(this).attr("data-id");
  })
  $(document).on("click", ".hapus-dataKomisariat", function() {
    var idnya = id;
    
    $.ajax({
      method: "POST",
      url: "<?= base_url('admin/data_komisariat/komisariat_hapus'); ?>",
      data: "id=" +idnya
    })
    .done(function(data) {
      $('#konfirmasiHapus').modal('hide');
      $('.msg').html(data);
      effect_msg();
      reload_table();
    })
  })

$(document).on('keydown', 'body', function(e){
        var charCode = ( e.which ) ? e.which : event.keyCode;

        if(charCode == 118) //F7
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
                max-width:none !important;

            }

            .modal-content-full-width  {
                height: auto !important;
                min-height: 100% !important;
                border-radius: 0 !important;
                background-color: #ececec !important 
            }

            .modal-header-full-width  {
                border-bottom: 1px solid #9ea2a2 !important;
            }

            .modal-footer-full-width  {
                border-top: 1px solid #9ea2a2 !important;
            }
            </style>

        </div>