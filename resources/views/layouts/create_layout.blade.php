@extends('layouts.app')

@section('page-title')
@yield('page-title')
@endsection

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
    <!-- action Section -->
    <form id="formCreate" method="POST" enctype="multipart/form-data" @yield('action')>
      @csrf
      <div class="card shadow" data-color="{{$profiles->menu_bg}}" data-text="{{$profiles->menu_text}}" style="background-color:{{$profiles->menu_bg}}; color:{{$profiles->menu_text}};">
        <div class="card-header bg-success d-flex justify-content-between align-items-center">
          <!-- title Section -->
          <h5 class="text-white my-1">@yield('title')</h5>
        </div>
        <div class="card-body">
          <h6 id="mohondiisi_text" class="text-center text-muted mb-3">--- Mohon diisi dengan teliti dan benar ---</h6>
          <!-- form Section -->
          @yield('form')
        </div>
        <!-- card footer Section -->
        @yield('footer')
      </div>
    </form>
  </div>
</div>
</div>

@yield('modals')
@yield('scripts')

@endsection