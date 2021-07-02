<div class="card-header {{$bg}} d-flex justify-content-between">
  <div class="d-flex align-items-center">
    <h5 class="text-white">{{$title}}</h5>
  </div>
  <div class="d-flex align-items-center">
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend">
        <span class="input-group-text">{{$titleID}}</span>
      </div>
      <input type="text" class="form-control foem-control-sm bg-dark text-white RobotoFont" value="{{$value}}" id="{{$id}}" name="{{$name}}" readonly>
    </div>
  </div>
</div>