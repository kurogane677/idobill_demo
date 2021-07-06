@extends('layouts.create_layout')
<!-- Content Section -->

@section('action')
action="{{route("debit.store")}}"
@endsection

@section('title')
Tambah {{$module->section}} Baru
@endsection

@section('form')
@include('navigations.alert')
@include('sweetalert::alert')
@include('menu.Debit.form')
@endsection

@section('footer')
<div class="card-footer d-flex justify-content-between align-items-center">
  <span>Tanda <sup class="text-danger">*</sup> wajib diisi</span>
  <div>
    <a href="{{route('debit.index')}}" class="btn btn-dark btn-sm">
      Cancel
    </a>
    <button id="submit_debit_baru" type="submit" class="btn btn-success btn-sm ml-2">
      Submit {{$module->section}} Baru
    </button>
  </div>
</div>
@endsection

@section('scripts')
<script>
  $(function(){
    $("#submit_debit_baru").on('click', function(){
      if ($("#credit_amount").val() == '0')
      {
        alert('Jumlah debit tidak boleh Rp.0');
        return false;
      }
    });
  });
</script>

@endsection