@extends('menu.custom_layout_menu')

@section('menu-header')
<h5 class="pt-2">PRINT KWITANSI PEMBAYARAN</h5>
@endsection

@section('menu-body')
<div class="row">
  <div class="col-6">
    <!-- Awal Periode -->
    <x-inputprepend title="Awal Periode" type="date" id="start_paid_date" name="start_paid_date" value="{{old('start_paid_date') ?? now()}}" opsi="required" />
  </div>
  <div class="col-6">
    <!-- Akhir Periode -->
    <x-inputprepend title="Akhir Periode" type="date" id="end_paid_date" name="end_paid_date" value="{{old('end_paid_date') ?? now()}}" opsi="required" />
  </div>
</div>

<!-- Jenis Pelanggan -->
<x-selectprepend title="Jenis Pelanggan" id="jenis_pelanggan" name="jenis_pelanggan" first="Semua jenis">
  <option value="1">COMMERCIAL</option>
  <option value="2">RETAIL</option>
</x-selectprepend>

<!-- Pelanggan -->
<x-selectprepend title="Pelanggan" id="pelanggan" name="pelanggan" first="Semua pelanggan">
  @if (count($customers)>0)
  @foreach ($customers as $customer)
  <option value="{{ $customer->id_cust }}">{{ $customer->nama }} || {{ $customer->id_product }}</option>
  @endforeach
  @endif
</x-selectprepend>

<!-- Jenis Produk -->
<x-selectprepend title="Jenis Produk" id="jenis_produk" name="jenis_produk" first="Semua produk">
  <option value="1">TV</option>
  <option value="2">INTERNET</option>
</x-selectprepend>

<div class="mt-3 ml-2">
  <!-- Tampilkan Tagihan Lalu	-->
  <x-customswitch label="Tampilkan Tagihan Lalu" id="tampilkan_tagihan" name="tampilkan_tagihan" />
  <!-- Tampilkan Sudah Bayar -->
  <x-customswitch label="Tampilkan Sudah Bayar" id="tampilkan_paid" name="tampilkan_paid" />
</div>

@endsection

@section('menu-footer')
<a href="/" class="btn btn-success btn-sm">Print Preview</a>
@endsection