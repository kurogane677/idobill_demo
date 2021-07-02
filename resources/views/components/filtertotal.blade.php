<div class="form-group">
  <label for="{{$idSelect}}">{{$title}}</label>
  <div class=" d-flex">
    <select id="{{$idSelect}}" name="{{$nameSelect}}" class="form-control form-control-sm">
      <option value="all"> - {{$first}} - </option>
      {{$slot}}
    </select>
    <input type="text" class="form-control form-control-sm ml-2 text-right">
  </div>
</div>