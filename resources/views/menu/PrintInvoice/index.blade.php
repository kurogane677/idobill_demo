@extends('menu.custom_layout_menu')

@section('menu-header')
<h5 class="pt-2">PRINT INVOICE</h5>
@endsection

@section('menu-body')
<div class="row">
  <div class="col-6">
    <!-- Awal Periode -->
    <x-inputprepend title="Awal Periode" type="date" id="start_inv_date" name="start_inv_date" value="{{old('start_inv_date') ?? now()}}" opsi="required" />
  </div>
  <div class="col-6">
    <!-- Akhir Periode -->
    <x-inputprepend title="Akhir Periode" type="date" id="end_inv_date" name="end_inv_date" value="{{old('end_inv_date') ?? now()}}" opsi="required" />
  </div>
</div>
<!-- Pelanggan -->
<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">Pelanggan </span>
  </div>
  <select class="form-control form-control-sm" id="filter_email">
    <option>- Pilih pelanggan -</option>
    @if (count($customers)>0)
    @foreach ($customers as $customer)
    <option value="{{ $customer->id_cust }}">{{ $customer->nama }} || {{ $customer->id_product }}</option>
    @endforeach
    @endif
  </select>
</div>
@endsection

@section('menu-footer')
<a href="/" class="btn btn-success btn-sm">Print Preview</a>
@endsection