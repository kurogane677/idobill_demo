@extends('layouts.create_layout')
<!-- Content Section -->

@section('action')
action="{{route($module->route.'.store')}}"
@endsection

@section('title')
Form {{$module->section}} Perangkat
@endsection

@section('form')
@include('menu.'. $module->folder . '.form')
@endsection

@section('footer')
<div class="card-footer d-flex justify-content-between align-items-center">
  <span>Tanda <sup class="text-danger">*</sup> wajib diisi</span>
  <div>
    <a href="{{ route($module->route.'.index') }}" class="btn btn-dark btn-sm">
      Cancel
    </a>
    <button type="submit" class="btn btn-success btn-sm ml-2">
      Create
    </button>
  </div>
</div>
@endsection