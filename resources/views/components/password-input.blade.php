<div class="blockquote-footer text-right">
  <small class="text-muted">
    Minimal password 8 karakter
  </small>
</div>

<div class="flex-center">
  <div class="input-group input-group-sm mb-2">
    <div class="input-group-prepend field170px">
      <span class="input-group-text field170px">Password *</span>
    </div>
    <input type="password" id="password" name="password" class="form-control form-control-sm is-invalid" value="{{old('password') ?? ''}}">
  </div>
  <div class="mx-2"></div>
  <svg id="seePassword" class="bi mb-2 cursor-pointer" width="24" height="24" fill="currentColor">
    <use href="{{asset('bootstrap-icons.svg#eye-fill')}}" />
  </svg>
</div>

<div class="flex-center">
  <div class="input-group input-group-sm mb-2">
    <div class="input-group-prepend field170px">
      <span class="input-group-text field170px">Konfirmasi password *</span>
    </div>
    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-sm is-invalid" value="{{old('password_confirmation') ?? ''}}">
  </div>
  <div class="mx-2"></div>
  <svg id="seePasswordConfirmation" class="bi mb-2 cursor-pointer" width="24" height="24" fill="currentColor">
    <use href="{{asset('bootstrap-icons.svg#eye-fill')}}" />
  </svg>
</div>
<div id="password_error" class="text-right mb-3" hidden>
  <span></span>
</div>