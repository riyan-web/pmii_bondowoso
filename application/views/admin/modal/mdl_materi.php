        <div class=" offset-md-1 col-md-11">
            <div class="form-msg"></div>
            <button type="button" class="close btn-danger text-r" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 style="display:block; text-align:center;" class="modal-title">Data Anggota</h3>
            <br>
            <form id="form-materi" method="POST">
              <input type="hidden" name="id" />
              <div class="form-group row">
                <label class="col-md-3 control-label">Judul Materi</label>
                <div class="col-md-6">
                  <input type="text" id="judul"  class="form-control" maxlength="64" placeholder="masukan judul Materi" name="judul"> 
                </div>
              </div>
              <div class="form-group row">
                <label for="deskripsi" class="col-md-3 control-label">Deskripsi Materi</label>
                <div class="col-md-8">
                  <textarea name="deskripsi" rows="2" placeholder="" class="form-control"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="jenis_materi" class="col-md-3 control-label">Jenis Materi</label>
                <div class="col-md-4">
                    <select name="jenis_materi" class="form-control select2">
                        <option value="">pilih :</option>
                        <option value="MAPABA">MAPABA</option>
                        <option value="PKD">PKD</option>
                        <option value="PKL">PKL</option>
                    </select>
                </div>
              </div>
              <div class="form-group row" id="file-sebelumnya">
                <input type="hidden" name="file_lama">
                <label class="col-md-3">File Sebelumnya</label>
                <div class="new col-md-8" id="ooo">
                  
                </div>
              </div>
              <div class="form-group row">
                <label for="filenya" id="label-foto" class="col-md-3 control-label">File</label>
                <div class="col-md-8">
                  <input type="file" name="filenya" id="filenya">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-10 offset-md-1">
                  <button type="button" id="btnSimpan" class="form-control btn btn-primary" onclick="simpan()"> <i class="glyphicon glyphicon-ok"></i>Simpan</button>
                </div>
              </div>
            </form> <br><br>
        </div>