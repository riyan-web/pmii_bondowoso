<div class="col-lg-12">
  <div class="modal-header-full-width   modal-header text-center">
    <div class="row">
      <div class="col-md-12">
        <div class="form-msg"></div>
      </div>
    </div>
    <h3 style="text-align:center;" class="modal-title w-100">Data Pesan</h3>
    <div id="sembunyi">
    <button type="button" class="close btn-danger text-r" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
  </div>
  <div class="modal-body">
    <form id="form-pesan" method="POST">
      <input type="hidden" value="" name="id" />
          <div class="form-group row">
            <label class="col-lg-3 control-label">Nama Pengirim</label>
            <div class="col-lg-4">
              <input type="text" id="nama" readonly class="form-control" name="nama">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 control-label">Email</label>
            <div class="col-lg-4">
              <input type="text" readonly class="form-control" name="email">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 control-label">Subject </label>
            <div class="col-lg-5">
            <input type="text" readonly class="form-control" name="subject">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 control-label"><b>Pesan</b></label>
            <div class="col-lg-6">
              <textarea readonly id="isi" autofocus readonly rows="7" cols="83" name="isi"></textarea>
            </div>
          </div>
    </div>
  <div class="modal-footer-full-width  modal-footer">
    <button type="button" id="btnSimpan" class="btn btn-primary btn-lg btn-rounded" onclick="simpan()"><i class="glyphicon glyphicon-ok"></i>Close</button>
  </div>
  </form>
</div>