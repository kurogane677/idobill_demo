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
    <form method="POST" enctype="multipart/form-data" @yield('action')>
      @csrf
      @method("PUT")
      <div class="card shadow" data-color="{{$profiles->menu_bg}}" data-text="{{$profiles->menu_text}}" style="background-color:{{$profiles->menu_bg}}; color:{{$profiles->menu_text}};">
        <div class="card-header bg-info d-flex justify-content-between align-items-center">
          <!-- title Section -->
          <h5 class="text-white my-1">@yield('title')</h5>
          <div class="col-3">
            <div class="input-group input-group-sm">
              <div class="input-group-prepend">
                <!-- id title Section -->
                <span class="input-group-text">@yield('idtitle')</span>
              </div>
              <!-- id value Section -->
              <input type="text" class="form-control form-control-sm bg-dark text-white RobotoFont" id="id" name="id" readonly @yield('idvalue')>
            </div>
          </div>
        </div>
        <div class="card-body">
          <h6 class="text-center text-muted mb-3">--- Mohon diisi dengan teliti dan benar ---</h6>
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

@yield('scripts')

@endsection