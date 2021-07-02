@extends('layouts.create_layout')
<!-- Content Section -->

@section('action')
action="{{route("partner_group.store")}}"
@endsection

@section('title')
Tambah {{$module->section}} Baru
@endsection

@section('form')
<script>
  var areas = []; 
</script>
@include($module->form)
@endsection

@section('footer')
<div class="card-footer d-flex justify-content-between align-items-center">
  <span>Tanda <sup class="text-danger">*</sup> wajib diisi</span>
</div>
@endsection