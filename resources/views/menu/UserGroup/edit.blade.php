@extends('layouts.edit_layout')
<!-- Content Section -->

@section('action')
action="{{ route("ug_management.update", $id) }}"
@endsection

@section('title')
Edit Group
@endsection

@section('idtitle')
ID
@endsection

@section('idvalue')
value="{{$id}}"
@endsection

@section('form')
@include($module->form)
@endsection

@section('footer')
<div class="card-footer d-flex justify-content-between align-items-center">
  <span>Tanda <sup class="text-danger">*</sup> wajib diisi</span>
  <div>
    <a href="{{ route("ug_management.index") }}" class="btn btn-dark btn-sm">
      Cancel
    </a>
    <button type="submit" class="btn btn-info btn-sm ml-2">
      Simpan Perubahan
    </button>
  </div>
</div>
@endsection