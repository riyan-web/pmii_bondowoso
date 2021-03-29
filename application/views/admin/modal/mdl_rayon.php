<div class=" offset-md-1 col-md-11">
          	<div class="form-msg"></div>
          	<button type="button" class="close btn-danger text-r" data-dismiss="modal" aria-label="Close"><span
          			aria-hidden="true">&times;</span></button>
          	<h3 style="display:block; text-align:center;" class="modal-title">Data Anggota</h3>
          	<br>
          	<form id="form-rayon" method="POST">
          		<input type="hidden" name="id" />
          		<div class="form-group row">
          			<label class="col-md-3 control-label">Nama Rayon</label>
          			<div class="col-md-8">
          				<input type="text" id="nama" onkeypress='return harusHuruf(event)' class="form-control" maxlength="64"
          					placeholder="masukan nama Rayon" name="nama">
          			</div>
          		</div>
          		<div class="form-group row">
          			<label class="col-md-3 control-label">Username</label>
          			<div class="col-md-8">
                        <input type="text" id="username" class="form-control" maxlength="64" placeholder="username" name="username">
          			</div>
          		</div>
          		<div class="form-group row">
          			<label for="no_hp" class="col-md-3 control-label">Password</label>
          			<div class="col-md-8">
          				<input type="text" class="form-control" maxlength="15" placeholder="password" name="password">
          			</div>
          		</div>
          		<div class="form-group row" id="foto-preview">
          			<input type="hidden" name="foto_lama">
          			<label class="col-md-3">Foto Sebelumnya</label>
          			<div class="new col-md-5">
          				(Tidak Ada Foto)
          			</div>
          		</div>
          		<div class="form-group row">
          			<label for="foto" id="label-foto" class="col-md-3 control-label">foto</label>
          			<div class="col-md-8">
          				<input type="file" name="img" id="img" onchange="tampilkanPreview(this,'preview')">
          				<br><b>Preview Gambar</b><br>
          				<div id="imgOne">
          				</div>
          			</div>
          		</div>
          		<div class="form-group">
          			<div class="col-md-10 offset-md-1">
          				<button type="button" id="btnSimpan" class="form-control btn btn-primary" onclick="simpan()"> <i
          						class="glyphicon glyphicon-ok"></i>Simpan</button>
          			</div>
          		</div>
          	</form> <br>_
          </div>
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