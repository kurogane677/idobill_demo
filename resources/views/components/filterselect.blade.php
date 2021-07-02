<div class="form-group">
  <label for="{{$idSelect}}">{{$title}}</label>
  <select id="{{$idSelect}}" name="{{$nameSelect}}" class="form-control form-control-sm">
    <option value="all"> - {{$first}} - </option>
    {{$slot}}
  </select>
</div>