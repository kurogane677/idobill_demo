<div class="blockquote-footer text-right">
  <small class="text-muted">
    Isi hanya nomor/angka, contoh: 81234567890
  </small>
</div>
<div class="d-flex mb-2">
  <div class="input-group input-group-sm field170px">
    <div class="input-group-prepend field170px">
      <span class="input-group-text field170px">{{$title}}</span>
    </div>
  </div>
  <input type="text" id="nohp_code" name="{{$codename}}" value="{{$code ?? old('nohp_code')}}" readonly>
  <input type="tel" id="no_hp" name="{{$ipname}}" class="form-control form-control-sm @error('no_hp') is-invalid @enderror" value="{{$value ?? old('no_hp')}}" required maxlength="15" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
</div>
@error('no_hp')
<span class="invalid-feedback text-right" role="alert">
  <strong>{{ $message }}</strong>
</span>
@enderror
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