@extends('layouts.app')

@section('page-title')
@yield('page-title')
@endsection

<!-- Content Section -->
@section('content')

<div class="container-fluid">
  <div class="row mt-2 d-flex justify-content-center">
    <div class="{{$module->col}}">
      @yield('form')
      <div class="card shadow card-filter" data-color="{{$profiles->menu_bg}}" data-text="{{$profiles->menu_text}}" style="background-color:{{$profiles->menu_bg}}; color:{{$profiles->menu_text}};">
        <div class="card-header bg-dark text-white">
          <div class="col-12">
            <div class="row d-flex align-items-center">
              <div class="col">
                @yield('menu-header')
              </div>
              {{-- <div class="col text-right">
                <span class="id-lo-div">
                  {{ $profiles->user_id }}
              </span>
            </div> --}}
          </div>
        </div>
      </div>
      <div class="card-body">
        @yield('menu-body')
      </div>
      <div class="card-footer d-flex justify-content-end align-items-center">
        @yield('menu-footer')
      </div>
    </div>
    @yield('close-form')
  </div>
</div>
</div>

@yield('modals')
@yield('scripts')

@endsection