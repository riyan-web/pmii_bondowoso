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
              <strong class="col-md-10 card-title"><?= $sub2_judul ?> </strong>
            </div>
          </div>
          <div class="card-body">
            <table id="tb_pesan" class="table table-striped table-bordered">
              <thead class="thead-dark">
                <tr>
                  <th>No</th>
                  <!-- <th class="text-center"><i class="fa fa-plus"></i></th> -->
                  <th>Nama</th>
                  <th>Subject</th>
                  <th>Tanggal</th>
                  <th>Status</th>
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
<?= $modal_pesan ?>
<?php show_my_confirm('konfirmasiHapus', 'hapus-dataPesan', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<script>

    var dataTable;
    $(document).ready(function() {

        dataTable = $('#tb_pesan').DataTable({
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
                url: "<?= base_url('admin/pesan_pengunjung/pesan_list'); ?>",
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

    function detail_pesan(id) {
        save_method = 'detailPesan';
        $('#pesan').modal('show');
        $('#sembunyi').hide();
        $('.form-msg').html('');
        $('#foto-preview').show(); //mengeluarkan foto sebelumny
        $('.modal-title').text('Pesan Pengunjung');
        $('#imgOne').html('<img id="preview" alt=""  width="60%" class="img-responsive" />');
        // $('#nim').attr('readonly',true);$('#prodi').hide();$('#angkatan').hide();$('#keterangan').hide();


        //Ajax Load data from ajax
        $.ajax({
            url: "<?= site_url('admin/pesan_pengunjung/data_pesan') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {

                $('[name="nama"]').val(data.nama);
                $('[name="email"]').val(data.email);
                $('[name="subject"]').val(data.subject);
                $('[name="isi"]').val(data.pesan);
                $('[name="id"]').val(data.id);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('gagal menampilkan data');
            }
        });
    }

    function simpan() {
        var url;

        if (save_method == 'detailPesan') {
            url = "<?= site_url('admin/pesan_pengunjung/ubah_status') ?>";
        }

        var formData = new FormData($('#form-pesan')[0]);
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
                    // effect_msg();
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

    var id;
    $(document).on("click", ".konfirmasiHapus-pesan", function() {
        id = $(this).attr("data-id");
    })
    $(document).on("click", ".hapus-dataPesan", function() {
        var idnya = id;

        $.ajax({
                method: "POST",
                url: "<?= base_url('admin/pesan_pengunjung/pesan_hapus'); ?>",
                data: "id=" + idnya
            })
            .done(function(data) {
                $('#konfirmasiHapus').modal('hide');
                $('.msg').html(data);
                effect_msg();
                reload_table();
            })
    })

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
