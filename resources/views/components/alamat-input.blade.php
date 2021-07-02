<div class="input-group input-group-sm mb-2">
  <div class="input-group-prepend field170px">
    <span class="input-group-text field170px">{{$title}}</span>
  </div>
  <textarea class="form-control" id="{{$ipname}}" name="{{$ipname}}" rows="3">{{$value ?? old($ipname)}} </textarea>
</div>