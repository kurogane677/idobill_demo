@extends('layouts.edit_layout')
<!-- Content Section -->

@section('action')
action="{{route("user_management.update", $id)}}"
@endsection

@section('title')
@if (isset($comefrom) && $comefrom == 'dashboard')
Edit My Profile
@else
Edit Data User
@endif
@endsection

@section('idtitle')
ID
@endsection

@section('idvalue')
value="{{$id}}"
@endsection

@section('form')
@include('navigations.alert')
@include($module->form)
@endsection

@section('footer')
<div class="card-footer d-flex justify-content-between align-items-center">
  <span>Tanda <sup class="text-danger">*</sup> wajib diisi</span>
  <div>
    <a href="{{url()->previous()}}" class="btn btn-dark btn-sm">
      Cancel
    </a>
    <button id="submitEditData" type="submit" class="btn btn-info btn-sm ml-2">
      Simpan Perubahan
    </button>
  </div>
</div>
@endsection