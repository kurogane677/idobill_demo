@extends('layouts.form_layout')
<!-- Content Section -->
@section('form')
<form method="POST" enctype="multipart/form-data" action="{{$action}}">
  @csrf
  @method("PUT")
  @endsection

  @section('menu-header')
  <div class="card-header bg-info d-flex justify-content-between">
    <div class="d-flex align-items-center">
      <h5 class="text-white">Edit Product</h5>
    </div>
    <div class="d-flex align-items-center">
      <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text">ID Product</span>
        </div>
        <input type="text" class="form-control foem-control-sm bg-dark text-white RobotoFont" value="{{$value}}" id="{{$id}}" name="{{$name}}" readonly>
      </div>
    </div>
  </div>
  @endsection

  @section('menu-body')
  <h6 class="text-center text-muted mb-3">--- Mohon diisi dengan teliti dan benar ---</h6>
  {{$slot}}
  @endsection

  @section('menu-footer')
  <span>Tanda <sup class="text-danger">*</sup> wajib diisi</span>
  <div>
    <a href="{{$href}}" class="btn btn-dark btn-sm">
      Cancel
    </a>
    <button type="submit" id="{{$idbutton}}" class="btn btn-info btn-sm ml-2">
      Simpan Perubahan
    </button>
  </div>
  @endsection

  @section('close-form')
</form>
@endsection