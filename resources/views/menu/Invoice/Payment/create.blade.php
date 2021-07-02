@extends('layouts.create_layout')
<!-- Content Section -->

@section('action')
action="{{route("daftar_pembayaran.store")}}"
@endsection

@section('title')
Pembayaran Invoice
@endsection

@section('form')
@include('navigations.alert')
@include('menu.Invoice.Payment.form')
@endsection

@section('footer')
<div class="card-footer d-flex justify-content-between align-items-center">
  <span>Tanda <sup class="text-danger">*</sup> wajib diisi</span>
  <div>
    <a href="{{url()->previous()}}" class="btn btn-dark btn-sm">
      Cancel
    </a>
    <button id="submit_pembayaran" type="submit" class="btn btn-success btn-sm ml-2">
      Submit Pembayaran
    </button>
  </div>
</div>
@endsection

@section('scripts')
<script>
  $(function(){
    $("#submit_pembayaran").on('click', function(){
      if ($("#collector").val() == '')
      {
        alert('Collector tidak boleh kosong. Mohon pilih salah satu');
        return false;
      }
    });
  });
</script>

@endsection