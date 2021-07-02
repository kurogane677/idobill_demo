@extends('layouts.edit_layout')
<!-- Content Section -->

@section('action')
action="/partner_group/{{$group_id}}/partner_user/{{$user_id}}"
@endsection

@section('title')
Edit User
@endsection

@section('idtitle')
ID
@endsection

@section('idvalue')
value="{{$user_id}}"
@endsection

@section('form')
@include('Menu.PartnerUser.form')
@endsection

@section('footer')
<div class="card-footer d-flex justify-content-between align-items-center">
  <span>Tanda <sup class="text-danger">*</sup> wajib diisi</span>
  <div>
    <a href="{{ route("partner_user.index",$group_id) }}" class="btn btn-dark btn-sm">
      Cancel
    </a>
    <button type="submit" class="btn btn-success btn-sm ml-2">
      Update User
    </button>
  </div>
</div>
@endsection