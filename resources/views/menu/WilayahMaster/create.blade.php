@extends('layouts.create_layout')
<!-- Content Section -->

@section('action')
action="{{route("wilayah.store")}}"
@endsection

@section('title')
Tambah {{$module->section}} Baru
@endsection

@section('form')
@include('navigations.alert')
@include('menu.WilayahMaster.form')
@endsection

@section('footer')
<div class="card-footer d-flex justify-content-between align-items-center">
  <span>Tanda <sup class="text-danger">*</sup> wajib diisi</span>
  <div>
    <a href="{{ route("wilayah.index") }}" class="btn btn-dark btn-sm">
      Cancel
    </a>
    <button type="submit" class="btn btn-success btn-sm ml-2">
      Create
    </button>
  </div>
</div>
@endsection