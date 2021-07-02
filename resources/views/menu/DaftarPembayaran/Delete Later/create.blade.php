@extends('layouts.create_layout')
<!-- Content Section -->

@section('action')
action="{{route("daftar_pembayaran.store")}}"
@endsection

@section('title')
Pembayaran Invoice
@endsection

@section('form')
@include('menu.DaftarPembayaran.form')
@endsection

@section('footer')
<div class="card-footer d-flex justify-content-between align-items-center">
  <span>Tanda <sup class="text-danger">*</sup> wajib diisi</span>
  <div>
    <a href="{{url()->previous()}}" class="btn btn-dark btn-sm">
      Cancel
    </a>
    <button type="submit" class="btn btn-success btn-sm ml-2">
      Submit Pembayaran
    </button>
  </div>
</div>
@endsection