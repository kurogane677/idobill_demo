<div class="input-group input-group-sm mb-2">
  <div class="input-group-prepend field170px">
    <span class="input-group-text field170px">{{$title}} </span>
  </div>
  <select class="form-control form-control-sm {{$font}}" id="{{$id}}" name="{{$name}}">
    <option value="all">- {{$first}} -</option>
    {{$slot}}
  </select>
</div>