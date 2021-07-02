@extends('layouts.create_layout')
<!-- Content Section -->

@section('action')
action="{{ route("partner_user.store",$group_id) }}"
@endsection

@section('title')
Tambah User Baru
@endsection

@section('form')
@include($module->form)
@endsection

@section('footer')
<div class="card-footer d-flex justify-content-between align-items-center">
  <span>Tanda <sup class="text-danger">*</sup> wajib diisi</span>
  <div>
    <a href="{{ route("partner_user.index",$group_id) }}" class="btn btn-dark btn-sm">
      Cancel
    </a>
    <button type="submit" class="btn btn-success btn-sm ml-2">
      Create User
    </button>
  </div>
</div>
@endsection