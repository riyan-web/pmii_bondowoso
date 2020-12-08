<?php
$query_jenis = "SELECT * FROM `subjeniskonten`
                JOIN `jeniskonten` ON `jeniskonten`.`id` = `subjeniskonten`.`jeniskonten_id`
                WHERE `subjeniskonten`.`nama` = 'artikel' ";
$jenis = $this->db->query($query_jenis)->result();

?>
<div class="col-lg-12">
  <div class="modal-header-full-width   modal-header text-center">
    <div class="row">
      <div class="col-md-12">
        <div class="form-msg"></div>
      </div>
    </div>
    <h3 style="text-align:center;" class="modal-title w-100">Data komisariat</h3>
    <button type="button" class="close btn-danger text-r" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <br>
  </div>
  <div class="modal-body">
    <form id="form-artikel" method="POST">
      <input type="hidden" value="" name="id" />
      <div class="row">
        <div class="col-lg-4">
          <div class="form-group row">
            <label class="col-lg-3 control-label">Judul Artikel</label>
            <div class="col-lg-9">
              <input type="text" id="judul" onkeypress='return harusHuruf(event)' class="form-control" maxlength="10" placeholder="Masukan Judul Artikel" name="judul">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 control-label">Jenis Artikel </label>
            <div class="col-lg-9">
              <select name="jenis" id="jenis" class="form-control">
                <option value="">- piilih -</option>
                <?php
                foreach ($jenis as $jns) { ?>
                  <option value="<?= $jns->jeniskonten_id ?>"><?= $jns->nama_jenis ?></option>
                  <?php  ?>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group row" id="foto-preview">
            <input type="hidden" name="foto_lama">
            <label class="col-lg-3">Foto Sebelumnya</label>
            <div class="new col-lg-5">
              (Tidak Ada Foto)
            </div>
          </div>
          <div class="form-group row">
            <label for="foto" id="label-foto" class="col-lg-3 control-label">foto</label>
            <div class="col-lg-8">
              <input type="file" name="img" id="img" onchange="tampilkanPreview(this,'preview')">
              <br><b>Preview Gambar</b><br>
              <div id="imgOne">
                <!-- <img id="preview"  alt="" class="img-responsive" width="60%" /> -->
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="form-group row">
            <label class="col-lg-1 control-label"><b>Isi Artikel</b></label>
            <div class="col-lg-11">
              <textarea class="ckeditor" placeholder="Isi Artikel" id="isi" cols="83" name="isi"></textarea>
            </div>
          </div>
        </div>
      </div>




  </div>
  <div class="modal-footer-full-width  modal-footer">
    <button type="button" class="btn btn-danger btn-lg btn-rounded" data-dismiss="modal">Batal</button>
    <button type="button" id="btnSimpan" class="btn btn-primary btn-lg btn-rounded" onclick="simpan()"><i class="glyphicon glyphicon-ok"></i>Simpan</button>
  </div>
  </form>
</div>

<!-- <script type="text/javascript">
          $(function () {
              $(".select2").select2();

              $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
              });
          });
          </script> -->





<script>
  function tampilkanPreview(img, idpreview) { //membuat objek gambar
    var gb = img.files;
    //loop untuk merender gambar
    for (var i = 0; i < gb.length; i++) { //bikin variabel
      var gbPreview = gb[i];
      var imageType = /image.*/;
      var preview = document.getElementById(idpreview);
      var reader = new FileReader();
      if (gbPreview.type.match(imageType)) { //jika tipe data sesuai
        preview.file = gbPreview;
        reader.onload = (function(element) {
          return function(e) {
            element.src = e.target.result;
          };
        })(preview);
        //membaca data URL gambar
        reader.readAsDataURL(gbPreview);
      } else { //jika tipe data tidak sesuai

        alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg. Silahkan file gambarnya!");
        preview.file = "salah";
      }
    }
  }
</script>