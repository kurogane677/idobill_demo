<div class="blockquote-footer text-right">
  <small class="text-muted">
    Isi sesuai dengan nomor kartu identitas yang akan diupload
  </small>
</div>
<div class="input-group input-group-sm mb-2">
  <div class="input-group-prepend field170px">
    <span class="input-group-text field170px">No Identitas *</span>
  </div>
  <input id="{{$id}}" name="{{$id}}" class="number-only form-control form-control-sm @if(Request::is('*create*')) is-invalid @elseif(Request::is('*edit*')) is-valid @endif" maxlength="20" value="{{$value}}" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
</div>
<div id="identity_progress" class="row mb-3" hidden>
  <div class="col-9 text-right">
    Checking identity...
  </div>
  <div class="col-3 text-left">
    <div class="progress text-center">
      <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 100%"></div>
    </div>
  </div>
</div>
<div id="identity_error" class="text-right mb-3" hidden>
  <span></span>
</div>