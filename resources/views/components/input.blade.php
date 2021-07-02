<div class="input-group input-group-sm mt-2 mb-2">
  <div class="input-group-prepend">
    <span class="input-group-text">{{$slot}}</span>
  </div>
  <input type="text" id="name" name="name" class="form-control form-control-sm input_readonly" readonly value="{{ $val }}">
</div>