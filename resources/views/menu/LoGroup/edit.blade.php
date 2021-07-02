@extends('layouts.edit_layout')
<!-- Content Section -->

@section('action')
action="{{ route("lo.update", $id) }}"
@endsection

@section('title')
Edit Group LO
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