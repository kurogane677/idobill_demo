@extends('layouts.app')
<!-- Content Section -->
@section('content')

<div class="container-fluid">
  {{-- @if(Session::has('message'))
  <div class="alert alert-info">
    {{session('message')}}
</div>
@endif
@include('Navigations.alert') --}}
<div class="row mt-2 d-flex justify-content-center">
  <div class="{{$module->col}}">
    @yield('form')
    <div class="card shadow" data-color="{{$themes->menu_bg}}" data-text="{{$themes->menu_text}}" style="background-color:{{$themes->menu_bg}}; color:{{$themes->menu_text}};">
      @yield('menu-header')
      <div class="card-body">
        @yield('menu-body')
      </div>
      <div class="card-footer d-flex justify-content-between align-items-center">
        @yield('menu-footer')
      </div>
    </div>
    @yield('close-form')
  </div>
</div>
</div>

@yield('scripts')

@endsection