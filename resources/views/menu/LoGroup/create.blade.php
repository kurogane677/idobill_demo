@extends('layouts.create_layout')
<!-- Content Section -->

@section('action')
action="/lo"
@endsection

@section('title')
Tambah Group LO Baru
@endsection

@section('form')
<script>
  var areas = []; 
</script>
@include('menu.LoGroup.form')
@endsection

@section('footer')
<div class="card-footer d-flex justify-content-between align-items-center">
  <span>Tanda <sup class="text-danger">*</sup> wajib diisi</span>
</div>
@endsection