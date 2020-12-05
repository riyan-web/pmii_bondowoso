<div class="col-lg-12">
            
            <div class="modal-header-full-width   modal-header text-center">
            <div class="row">
              <div class="col-md-12">
                <div class="form-msg"></div>
              </div>
            </div>
              <h3 style="text-align:center;" class="modal-title w-100">Data Proker</h3>
              <button type="button" class="close btn-danger " data-dismiss="modal" aria-label="Close"> <span style="font-size: 1.3em;" aria-hidden="true">&times;</span><button>

            <br>
            </div>
            <div class="modal-body">
                <form id="form-proker" method="POST">
                <input type="hidden" value="" name="id"/> 
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group row">
                            <label class="col-lg-3 control-label">Nama Kegiatan</label>
                            <div class="col-lg-9">
                            <input type="text" id="nama_kegiatan" onkeypress='return harusHuruf(event)' class="form-control" placeholder="masukan nama kegiatan" name="nama_kegiatan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label">Penanggung Jawab</label>
                            <div class="col-lg-9">
                            <input type="text" id="penanggung_jawab" onkeypress='return harusHuruf(event)' class="form-control" placeholder="masukan Nama penanggung jawab" name="penanggung_jawab">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label">Jadwal Pelaksanaan</label>
                            <div class="col-lg-9">
                            <input onkeypress='return harusAngka(event)' class="form-control col-md-8" data-provide="datepicker"  placeholder="Jadwal Pelaksanaan"  id="tgl_indo" name="jadwal_pelaksanaan" class="bootstrap-datepicker col-md-4" >
                            </div>
                        </div>
                        <div class="form-group row" id="foto-preview">
                            <input type="hidden" name="foto_lama" >
                            <label  class="col-lg-3">Foto Sebelumnya</label>
                            <div class="new col-lg-5">
                            (Tidak Ada Foto)
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto" id="label-foto"  class="col-lg-3 control-label">foto</label>
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
                            <label class="col-lg-1 control-label"><b>Deskripsi</b></label>
                            <div class="col-lg-11">
                            <textarea  class="ckeditor" style="resize:none;width:300px;height:100px;" placeholder= "deskripsi Komisariat" id="isi" name="isi" ></textarea>
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