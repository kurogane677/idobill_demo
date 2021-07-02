@extends('layouts.create_layout')
<!-- Content Section -->

@section('action')
action="/customer"
@endsection

@section('page-title')
&nbsp;- Tambah Pelanggan Baru
@endsection

@section('title')
Tambah Pelanggan Baru
@endsection

@section('form')
@include('navigations.alert')
@include('sweetalert::alert')
@include($module->form)
<x-modals-loading id="ModalsLoading" title="Creating New Customer" />
@endsection

@section('footer')
<div class="card-footer flex-between">
  <span>Tanda <sup class="text-danger">*</sup> wajib diisi</span>
  <div>
    <a href="{{route('customer.index')}}" class="btn btn-dark btn-sm">
      Cancel
    </a>
    <button id="submitNewCustomer" type="submit" class="submitBtn btn btn-success btn-sm ml-2">
      Simpan Data Pelanggan Baru
    </button>
  </div>
</div>

@if(Session::has('user_created'))
<script>
  $(function() {
    let id = "{{Session::get('user_created')}}";
    // if (confirm(`Pelanggan baru dengan ID: ${id} telah berhasil ditambahkan, apakah ingin langsung berlangganan?`))
    // {
    //   window.location.href = `/subscription/create/${id}`;
    // }
    // alert()->question('Peringatan','Pelanggan baru dengan ID: ${id} telah berhasil ditambahkan, apakah ingin langsung berlangganan?')
    // ->showConfirmButton('<a href="/subscription/create/${id}" style="text-decoration: none;">Lanjutkan</a>', '#3085d6')
    // ->showCancelButton('Kembali', '#aaa')->reverseButtons()

  });
</script>
@endif

@endsection