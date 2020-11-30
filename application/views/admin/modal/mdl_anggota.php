          <div class=" offset-md-1 col-md-11">
            <div class="form-msg"></div>
              <button type="button" class="close btn-danger text-r" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h3 style="display:block; text-align:center;" class="modal-title">Data Anggota</h3>
            <br>
            <form id="form-anggota" method="POST">
              <input type="hidden" name="id"/> 
              <div class="form-group row">
                <label class="col-md-3 control-label">Nama Lengkap</label>
                <div class="col-md-6">
                  <input type="text" id="nama" onkeypress='return harusHuruf(event)' class="form-control" maxlength="10" placeholder="masukan nama anda" name="nama"> <!-- onkeypress='return harusHurufPen(event)' -->
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 control-label">Tempat/Tanggal Lahir</label>
                <div class="col-md-9">
                  <div class="form-group row">
                  &nbsp;&nbsp;&nbsp;<input type="text" onkeypress='return harusHuruf(event)' class="form-control col-md-6"  placeholder="Tempat lahir" name="tmp_lahir"> <!-- onkeypress='return harusHurufPen(event)' -->
                  &nbsp;<input onkeypress='return harusAngka(event)' class="form-control col-md-4" data-provide="datepicker"  placeholder="tanggal lahir"  id="tgl_indo" name="tgl_lahir" class="bootstrap-datepicker col-md-4" >
                  </div>
                </div> 
              </div>
              <div class="form-group row">
                <label for="no_hp"  class="col-md-3 control-label">No Hp</label>
                <div class="col-md-8">
                  <input type="text" class="form-control" maxlength="15" placeholder="Nomor Handphone" onkeypress='return harusAngka(event)' name="no_hp">
                </div>
              </div>
              <?php if ($this->session->userdata['jenis']== 4) {?>
              <div class="form-group row">
                <label for="no_hp"  class="col-md-3 control-label">Komisariat</label>
                <div class="col-md-8">
                <select name="komisariat_id" class="form-control select2" >
                <?php foreach ($dataKomisariat as $kms) :?>
                    <option value="<?= $kms['id'] ?>">
                      <?= $kms['nama']; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                </div>
              </div>
              <?php } ?>
              <?php if ($this->session->userdata['jenis']== 3) {?>
                <input type="hidden" name="komisariat_id" value="<?= $this->session->userdata['id_komisariat']?>">
              <?php } ?>
              <div class="form-group row">
                <label for="alamat"  class="col-md-3 control-label">Alamat</label>
                <div class="col-md-8">
                <textarea name="alamat" rows="2" placeholder="Alamat saat ini" class="form-control"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group row">
                    <label for="mapaba"  class="col-md-7 control-label">Mapaba</label>
                    <div class="col-md-5">
                    <select name="tahun_mapaba" class="form-control select2" >
                      <?php
                      $now=date('Y');

                      for ($a=2012;$a<=$now;$a++)

                      { ?>
                        <option value="<?= $a; ?>">
                          <?= $a ?>
                        </option>
                      <?php }
                      ?>
                    </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group row">
                    <label for="tlp"  class="col-md-3 control-label">PKD</label>
                      <div class="col-md-6">
                        <select name="tahun_pkd" class="form-control select2" >
                            <option value="0">belum</option>
                          <?php
                          $now=date('Y');

                          for ($a=2012;$a<=$now;$a++)

                          { ?>
                            <option value="<?= $a; ?>">
                              <?= $a ?>
                            </option>
                          <?php }
                          ?>
                        </select>
                      </div>
                  </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group row">
                      <label for="tahun_pkl"  class="col-md-3 control-label">PKL</label>
                      <div class="col-md-8">
                        <select name="tahun_pkl" class="form-control select2" >
                            <option value="0">belum</option>
                          <?php
                          $now=date('Y');

                          for ($a=2012;$a<=$now;$a++)

                          { ?>
                            <option value="<?= $a; ?>">
                              <?= $a ?>
                            </option>
                          <?php }
                          ?>
                        </select>
                      </div>
                    </div>
                </div>
              </div>
              <div class="form-group row" id="foto-preview">
                <input type="hidden" name="foto_lama" >
                <label  class="col-md-3">Foto Sebelumnya</label>
                <div class="new col-md-5">
                  (Tidak Ada Foto)
                </div>
              </div>
              <div class="form-group row">
                <label for="foto" id="label-foto"  class="col-md-3 control-label">foto</label>
                <div class="col-md-8">
                  <input type="file" name="img" id="img" onchange="tampilkanPreview(this,'preview')">
                  <br><b>Preview Gambar</b><br>
                  <div id="imgOne">
                  </div>
                </div>
              </div>
              <div class="form-group row" id="keterangan">
                <div class="col-md-10">
                  <!-- <label onclick="buatusername()" style="background-color: green;">Buat username dan Password</label> -->
                  <h6><b>Keterangan :</b> untuk username dan password baru otomatis dibuatkan.</h6>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-10 offset-md-1">
                    <button type="button" id="btnSimpan" class="form-control btn btn-primary" onclick="simpan()"> <i class="glyphicon glyphicon-ok"></i>Simpan</button>
                </div>
              </div>
            </form> <br>_
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
          function tampilkanPreview(img,idpreview)
          { //membuat objek gambar
            var gb = img.files;
            //loop untuk merender gambar
            for (var i = 0; i < gb.length; i++)
            { //bikin variabel
              var gbPreview = gb[i];
              var imageType = /image.*/;
              var preview=document.getElementById(idpreview);            
              var reader = new FileReader();
              if (gbPreview.type.match(imageType)) 
              { //jika tipe data sesuai
                preview.file = gbPreview;
                reader.onload = (function(element) 
                {
                  return function(e) 
                  {
                    element.src = e.target.result;
                  };
                })(preview);
                //membaca data URL gambar
                reader.readAsDataURL(gbPreview);
              }
                else
                { //jika tipe data tidak sesuai

                  alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg. Silahkan file gambarnya!" );
                  preview.file = "salah";
                }
            }    
          }

          </script> 

