@extends('layouts.edit_layout')
<!-- Content Section -->

@section('action')
action="{{ route("partner_group.update", $id) }}"
@endsection

@section('title')
Edit {{$module->section}}
@endsection

@section('idtitle')
ID
@endsection

@section('idvalue')
value="{{$id}}"
@endsection

@section('form')
<script>
  var areas = {!! $areas !!}; 
</script>
@include($module->form)
@endsection

@section('footer')
<div class="card-footer d-flex justify-content-between align-items-center">
  <span>Tanda <sup class="text-danger">*</sup> wajib diisi</span>
</div>
@endsection