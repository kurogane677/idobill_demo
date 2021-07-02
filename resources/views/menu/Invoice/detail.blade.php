@extends('layouts.base')

@section('isi')
{{-- {{dd($nama_cust)}} --}}
<div class="container d-flex justify-content-center">
  <div class="col-7">
    <div class="card rounded-10 shadow mt-3" data-color="{{$profiles->menu_bg}}" data-text="{{$profiles->menu_text}}" style="background-color:{{$profiles->menu_bg}}; color:{{$profiles->menu_text}};">
      <div class="card-body rounded-10 p-5">
        <h5 class="text-dark">Detail Invoice</h5>

        <small class="text-muted">Pelanggan</small>
        <hr class="w-100">

        <x-inputreadonly val="{{$invoice->inv_no}}" id="inv_no" name="inv_no" title="No. Invoice" />

        <x-inputreadonly val="{{$invoice->id_subscription}}" id="id_subscription" name="id_subscription" title="ID Langganan" />

        <x-inputreadonly val="{{Carbon\Carbon::parse($invoice->inv_date)->format('d-m-Y')}}" id="inv_date" name="inv_date" title="Tgl Invoice" />

        <x-inputreadonly val="{{Carbon\Carbon::parse($invoice->exp_date)->format('d-m-Y')}}" id="exp_date" name="exp_date" title="Jatuh Tempo" />

        <x-inputreadonly val="{{$invoice->status==0 ? 'BELUM BAYAR' : 'SUDAH BAYAR'}}" id="status" name="status" title="Status" />

        <x-inputreadonly val="{{$invoice->id_cust . ' - ' . $nama_cust}}" id="id_cust" name="id_cust" title="Pelanggan" />

        <x-inputreadonly val="{{number_format($tagihan)}}" id="id_cust" name="id_cust" title="Tagihan Bulan Lalu" />

        <br>
        <small class="text-muted">Produk Detail</small>
        <hr class="w-100">

        <div class="col-12 d-flex justify-content-end align-items-center">
          <a href="/{{$module}}" class="btn btn-dark btn-sm mr-2">Kembali</a>
          <button type="submit" class="btn btn-success btn-sm">Print PDF</button>
        </div>

      </div>
    </div>
  </div>

</div>

@endsection


@section('scripts')


@endsection