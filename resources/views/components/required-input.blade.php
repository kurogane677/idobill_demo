<div class="input-group input-group-sm mb-2">
  <div class="input-group-prepend field170px">
    <span class="input-group-text field170px">{{$title}}</span>
  </div>
  <input type="{{$type}}" id="{{$ipname}}" name="{{$ipname}}" class="{{$class}} form-control form-control-sm @if(Request::is('*create*')) is-invalid @elseif(Request::is('*edit*')) is-valid @endif" value="{{ $value ?? old($ipname) }}" placeholder="{{$placeholder}}" maxlength="{{$maxlength}}" minlength="{{$minlength}}" {{$opsi}}>
</div>