<div class="blockquote-footer text-right">
  <small class="text-muted">
    Isi hanya nomor/angka, contoh: 81234567890
  </small>
</div>
<div class="d-flex mb-2">
  <div class="input-group input-group-sm field170px">
    <div class="input-group-prepend field170px">
      <span class="input-group-text field170px">No. HP *</span>
    </div>
  </div>
  <input type="text" id="nohp_code" name="nohp_code" value="{{$codeValue}}" readonly>
  <input type="tel" id="no_hp" name="no_hp" class="form-control form-control-sm @if(Request::is('*create*')) is-invalid @elseif(Request::is('*edit*')) is-valid @endif" value="{{$nohpValue}}" maxlength="15" placeholder="Mohon diisi dengan nomor yang aktif" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
</div>
<div id="nohp_progress" class="row mb-3" hidden>
  <div class="col-9 text-right">
    Checking existing number...
  </div>
  <div class="col-3 text-left">
    <div class="progress text-center">
      <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 100%"></div>
    </div>
  </div>
</div>
<div id="nohp_error" class="text-right mb-3" hidden>
  <span></span>
</div>