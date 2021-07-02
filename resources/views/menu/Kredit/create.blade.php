@extends('layouts.create_layout')
<!-- Content Section -->

@section('action')
action="{{route("kredit.store")}}"
@endsection

@section('title')
Tambah {{$module->section}} Baru
@endsection

@section('form')
@include('navigations.alert')
@include('sweetalert::alert')
@include('menu.Kredit.form')
@endsection

@section('footer')
<div class="card-footer d-flex justify-content-between align-items-center">
  <span>Tanda <sup class="text-danger">*</sup> wajib diisi</span>
  <div>
    <a href="{{route('kredit.index')}}" class="btn btn-dark btn-sm">
      Cancel
    </a>
    <button id="submit_kredit_baru" type="submit" class="btn btn-success btn-sm ml-2">
      Submit {{$module->section}} Baru
    </button>
  </div>
</div>
@endsection

@section('scripts')
<script>
  $(function(){
    $("#submit_kredit_baru").on('click', function(){
      if ($("#credit_amount").val() == '0')
      {
        alert('Jumlah kredit tidak boleh Rp.0');
        return false;
      }
    });
  });
</script>

@endsection