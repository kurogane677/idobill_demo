<div class="row">
  <div class="col-12">
    <div class="colorboard" id="{{$colorboardId}}" hidden>
      {{$slot}}
    </div>
  </div>
</div>
<div class="row">
  <div class="col-8">
    <input type="text" class="form-control form-control-sm mb-2" value="{{$colorinputTitle}}" disabled>
  </div>
  <div class="col-4 d-flex">
    <input type="text" id="{{$colorinputId}}" name="{{$colorinputName}}" value="{{$colorinputValue}}" class="form-control form-control-sm text-center mb-2 mr-3 color-input RobotoFont" readonly>
    <div id="{{$colorchosenId}}" class="colorchosen" style="background-color: {{$colorinputValue}};"></div>
  </div>
</div>