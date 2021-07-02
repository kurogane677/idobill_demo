@extends('layouts.create_layout')
<!-- Content Section -->

@section('action')
action="{{route("ug_management.index")}}"
@endsection

@section('title')
Tambah Group Baru
@endsection

@section('form')
@include('navigations.alert')
@include($module->form)
@endsection

@section('footer')
<div class="card-footer d-flex justify-content-between align-items-center">
  <span>Tanda <sup class="text-danger">*</sup> wajib diisi</span>
  <div>
    <a href="{{ route("ug_management.index") }}" class="btn btn-dark btn-sm">
      Cancel
    </a>
    <button id="submitCreateUser" type="submit" class="btn btn-success btn-sm ml-2">
      Tambah Group
    </button>
  </div>
</div>
@endsection

@section('scripts')
<script>
  $(function(){
    $("#submitCreateUser").on('click', function(){
      if ($("#group_id").val()=='')
      {
        alert('Group tidak boleh kosong, silahkan pilih salah satu group!');
        return false;
      }
    });
  });
</script>
@endsection