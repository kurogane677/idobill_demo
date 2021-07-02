@extends('layouts.app')

@section('page-title')
@yield('page-title')
@endsection

<!-- Content Section -->
@section('content')

<div class="container-fluid">
  @yield('top-area')
  <div class="row mt-2 d-flex justify-content-center">
    <div class="{{$module->col}}">
      <div class="card shadow card-filter" data-color="{{$profiles->menu_bg}}" data-text="{{$profiles->menu_text}}" style="background-color:{{$profiles->menu_bg}}; color:{{$profiles->menu_text}};">
        <div class="card-header card-header-filter bg-dark text-white">
          <div class="col-12">
            <div class="row d-flex align-items-center">
              <div class="col">
                @yield('menu-header')
              </div>
              <div class="col text-right">
                @yield('filter-button')

                {{-- <span class="id-lo-div">
                  {{ $profiles->user_id }}
                </span> --}}
              </div>
            </div>
          </div>
        </div>

        <div class="card-body p-0">
          @yield('filter-menu')
          @yield('menu-body')
        </div>
        @yield('menu-footer')
      </div>
    </div>
  </div>
</div>

@yield('modals')
@yield('scripts')

@endsection