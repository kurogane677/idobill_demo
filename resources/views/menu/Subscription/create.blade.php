@extends('layouts.base')

@section('isi')
@include('navigations.alert')
<form method="POST" enctype="multipart/form-data" action="{{route('subscription.store')}}">
  @csrf
  @include($module->form)
</form>
@endsection