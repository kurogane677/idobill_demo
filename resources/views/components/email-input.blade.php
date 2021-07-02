<div class="input-group input-group-sm mb-2">
  <div class="input-group-prepend field170px">
    <span class="input-group-text field170px">Email *</span>
  </div>
  <input type="email" id="email" name="email" class="form-control form-control-sm @if(Request::is('*create*')) is-invalid @elseif(Request::is('*edit*')) is-valid @endif" value="{{$value}}" placeholder="Email untuk login aplikasi iDoBill">
</div>
<div id="email_progress" class="row mb-3" hidden>
  <div class="col-9 text-right">
    Checking email...
  </div>
  <div class="col-3 text-left">
    <div class="progress text-center">
      <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 100%"></div>
    </div>
  </div>
</div>
<div id="email_error" class="text-right mb-3" hidden>
  <span></span>
</div>