@extends('layouts.create_layout')
<!-- Content Section -->

@section('action')
action="{{route("daftar_pembayaran.store_all")}}"
@endsection

@section('title')
Pembayaran Invoice Sekaligus
@endsection

@section('form')
@include('navigations.alert')

@if ($first_id)
@include('menu.Invoice.PembayaranSekaligus.form')
@else
<script>
  $(function(){
    $("#mohondiisi_text").text('Horee, semua invoice telah dibayarkan!');
})
</script>
<div class="flex-center flex-column">
  <img src="{{ asset('images/success.png') }}" style="width: 15%; padding-bottom:5px;" alt="ERB" loading="lazy" />
  <a href="{{url()->previous()}}" class="btn btn-dark btn-sm">
    Kembali
  </a>
</div>
@endif

@endsection

@section('footer')
<div class="card-footer d-flex justify-content-between align-items-center">
  <span>Tanda <sup class="text-danger">*</sup> wajib diisi</span>
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