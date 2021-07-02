@extends('menu.custom_layout_menu')

@section('form')
<form method="POST" action="{{ route("settings.update", $profiles->user_id) }}">
  @csrf
  @method("PUT")
  @endsection

  @section('menu-header')
  <h5 class="pt-2">SETTINGS</h5>
  @endsection

  @section('menu-body')

  <!-- Setting Biaya -->
  <h5 class="ml-2 mb-2">Setting Biaya</h5>
  <div class="row">
    <div class="col-8">
      <input type="text" class="form-control form-control-sm mb-2" value="Biaya Collect" disabled>
      <input type="text" class="form-control form-control-sm mb-2" value="Biaya Terlambat (Per Hari)" disabled>
    </div>
    <div class="col-4">
      <input type="text" class="form-control form-control-sm mb-2">
      <input type="text" class="form-control form-control-sm mb-2">
    </div>
  </div>

  <!-- Setting Promo -->
  <h5 class="ml-2 mb-2 mt-4">Setting Promo</h5>
  <div class="row">
    <div class="col-8">
      <input type="text" class="form-control form-control-sm mb-2" value="Nama Paket" disabled>
      <input type="text" class="form-control form-control-sm mb-2" value="Tanggal Mulai Berlaku" disabled>
    </div>
    <div class="col-4">
      <input type="text" class="form-control form-control-sm mb-2">
      <input type="date" class="form-control form-control-sm mb-2">
    </div>
  </div>

  <!-- Themes -->
  <h5 class="ml-2 mb-2 mt-4">Themes</h5>

  <!-- Main Background Color -->
  <x-setting-color-input colorboardId="mainBGColorColorboard" colorinputTitle="Main Background Color" colorinputId="mainBGColorInput" colorinputName="window_bg" colorinputValue="{{$profiles->window_bg}}" colorchosenId="mainBGColorChosen">
    @foreach ($colors as $color)
    <div class="colors" style="background-color:{{$color->color}}"></div>
    @endforeach
  </x-setting-color-input>

  <!-- Main Text Color -->
  <x-setting-color-input colorboardId="mainTextColorColorboard" colorinputTitle="Main Text Color" colorinputId="mainTextColorInput" colorinputName="window_text" colorinputValue="{{$profiles->window_text}}" colorchosenId="mainTextColorChosen">
    @foreach ($colors as $color)
    <div class="colors" style="background-color:{{$color->color}}"></div>
    @endforeach
  </x-setting-color-input>

  <!-- Navbar Background Color -->
  <x-setting-color-input colorboardId="navbarBGColorColorboard" colorinputTitle="Navbar Background Color" colorinputId="navbarBGColorInput" colorinputName="navbar_bg" colorinputValue="{{$profiles->navbar_bg}}" colorchosenId="navbarBGColorChosen">
    @foreach ($colors as $color)
    <div class="colors" style="background-color:{{$color->color}}"></div>
    @endforeach
  </x-setting-color-input>

  <!-- Navbar Text Color -->
  <x-setting-color-input colorboardId="navbarTextColorColorboard" colorinputTitle="Navbar Text Color" colorinputId="navbarTextColorInput" colorinputName="navbar_text" colorinputValue="{{$profiles->navbar_text}}" colorchosenId="navbarTextColorChosen">
    @foreach ($colors as $color)
    <div class="colors" style="background-color:{{$color->color}}"></div>
    @endforeach
  </x-setting-color-input>

  <!-- Sidebar Background Color -->
  <x-setting-color-input colorboardId="sidebarBGColorColorboard" colorinputTitle="Sidebar Background Color" colorinputId="sidebarBGColorInput" colorinputName="sidebar_bg" colorinputValue="{{$profiles->sidebar_bg}}" colorchosenId="sidebarBGColorChosen">
    @foreach ($colors as $color)
    <div class="colors" style="background-color:{{$color->color}}"></div>
    @endforeach
  </x-setting-color-input>

  <!-- Sidebar Text Color -->
  <x-setting-color-input colorboardId="sidebarTextColorColorboard" colorinputTitle="Sidebar Text Color" colorinputId="sidebarTextColorInput" colorinputName="sidebar_text" colorinputValue="{{$profiles->sidebar_text}}" colorchosenId="sidebarTextColorChosen">
    @foreach ($colors as $color)
    <div class="colors" style="background-color:{{$color->color}}"></div>
    @endforeach
  </x-setting-color-input>

  <!-- Sidebar Background Color -->
  <x-setting-color-input colorboardId="menuBGColorColorboard" colorinputTitle="Menu Background Color" colorinputId="menuBGColorInput" colorinputName="menu_bg" colorinputValue="{{$profiles->menu_bg}}" colorchosenId="menuBGColorChosen">
    @foreach ($colors as $color)
    <div class="colors" style="background-color:{{$color->color}}"></div>
    @endforeach
  </x-setting-color-input>

  <!-- Sidebar Text Color -->
  <x-setting-color-input colorboardId="menuTextColorColorboard" colorinputTitle="Menu Text Color" colorinputId="menuTextColorInput" colorinputName="menu_text" colorinputValue="{{$profiles->menu_text}}" colorchosenId="menuTextColorChosen">
    @foreach ($colors as $color)
    <div class="colors" style="background-color:{{$color->color}}"></div>
    @endforeach
  </x-setting-color-input>

  @endsection

  @section('menu-footer')
  {{-- <button type="button" class="btn btn-danger btn-sm ml-3">Reset Themes</button> --}}
  <button type="submit" class="btn btn-success btn-sm ml-3">Simpan</button>
  @endsection

  @section('close-form')
</form>
@endsection