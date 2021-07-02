<!-- Side Menu Section -->

<div class="sideMenu" style="background-color:{{$profiles->sidebar_bg}};" data-color="{{$profiles->sidebar_bg}}">
  <div class="sidebar" style="color:{{$profiles->sidebar_text}};" data-color="{{$profiles->sidebar_text}}">
    <ul class="navbar-nav" id="accordionSidebar">

      @foreach ($profiles['menu'] as $menu)
      @if ($profiles[$menu['menu_id']]["allow_show"] == "on")
      <li class="nav-item mb-1" id="{{$menu['menu_tag']}}">
        <a href="{{$menu['url']}}" class="nav-link px-3" style="color:{{$profiles->sidebar_text}};" data-color="{{$profiles->sidebar_text}}">
          <svg class="bi" width="16" height="16" fill="currentColor">
            <use href="{{asset("bootstrap-icons.svg#".$menu['menu_icon'])}}" />
          </svg>
          <span class="text px-2" data-color="{{$profiles->sidebar_text}}" style="color:{{$profiles->sidebar_text}};">{{$menu['menu_name']}}</span>
        </a>
      </li>
      @endif
      @endforeach

      <br />
      <div class="hr-line mb-2"></div>

      <li class="nav-item w-100" id="logout">
        <form method="POST" action="{{ route('logout') }}" class="w-100">
          @csrf
          <button class="nav-link px-3 wbtn-logout text-left w-100" style="color:{{$profiles->sidebar_text}};" data-color="{{$profiles->sidebar_text}}">
            <svg class="bi" width="16" height="16" fill="currentColor">
              <use href="{{asset("bootstrap-icons.svg#door-open-fill")}}" />
            </svg>
            <span class="text px-2" data-color="{{$profiles->sidebar_text}}" style="color:{{$profiles->sidebar_text}};">Logout</span>
          </button>
        </form>
      </li>

      <li class="nav-item mt-2 mb-5"></li>
    </ul>

  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var ActiveMenu = '.sideMenu #' + "{!! $module->name !!}" +' .nav-link'
    $(ActiveMenu).addClass('activeMenu');

    var invoiceSubMenuShow = localStorage.getItem("invoiceSubMenuShown");
    if ((invoiceSubMenuShow = false)) {
        $("#invoiceMenu .collapse").collapse();
    }
  });
</script>


{{-- 
      @foreach ($profiles['menu'] as $key => $item)
      <!-- Dashboard -->
      @if ($profiles[$key]["allow_show"] == "on")
      <x-sidebarmenu title="Dashboard" id="dashboard" href="{{ url('/dashboard') }}" icon="person-circle" color="{{$profiles->sidebar_text}}" />
@endif
@endforeach --}}

<!-- Dashboard -->
{{-- @if ($profiles[$key]["allow_show"] == "on")
      <x-sidebarmenu title="Dashboard" id="dashboard" href="{{ url('/dashboard') }}" icon="person-circle" color="{{$profiles->sidebar_text}}" />
@endif --}}

{{-- 
      @if ($profiles["M02"]["allow_show"] == "on")
      <!-- Data Pelanggan -->
      <x-sidebarmenu title="Data Pelanggan" id="Customer" href="{{ route('customer.index') }}" icon="person-lines-fill" color="{{$profiles->sidebar_text}}" />
@endif

@if ($profiles["M03"]["allow_show"] == "on")
<!-- Berlangganan -->
<x-sidebarmenu title="Berlangganan" id="Subscription" href="{{ route('subscription.index') }}" icon="basket" color="{{$profiles->sidebar_text}}" />
@endif

@if ($profiles["M04"]["allow_show"] == "on")
<!-- Invoice -->
@if ($profiles->type == "CUS")
<x-sidebarmenu title="Tagihan" id="Invoice" href="{{ route('invoice.index') }}" icon="journal-text" color="{{$profiles->sidebar_text}}" />
@else
<x-sidebarmenu title="Tagihan Pelanggan" id="Invoice" href="{{ route('invoice.index') }}" icon="journal-text" color="{{$profiles->sidebar_text}}" />
@endif
@endif

@if ($profiles["M08"]["allow_show"] == "on")
<!-- Daftar Pembayaran -->
<x-sidebarmenu title="Daftar Pembayaran" id="DaftarPembayaran" href="{{ route('daftar_pembayaran.index') }}" icon="journals" color="{{$profiles->sidebar_text}}" />
@endif

@if ($profiles["M10"]["allow_show"] == "on")
<!-- Laporan -->
<x-sidebarmenu title="Laporan" id="Laporan" href="{{ route('laporan.index') }}" icon="file-bar-graph" color="{{$profiles->sidebar_text}}" />
@endif

<br />

@if ($profiles->type != "CUS")
<span class="text {{$profiles->sidebar_text}}">Setting</span>
@endif

@if ($profiles["P01"]["allow_show"] == "on")
<!-- Product Master -->
<x-sidebarmenu title="Product Master" id="ProductMaster" href="{{ route('product.index') }}" icon="cart3" color="{{$profiles->sidebar_text}}" />
@endif

@if ($profiles["P02"]["allow_show"] == "on")
<!-- Wilayah Master -->
<x-sidebarmenu title="Wilayah" id="WilayahMaster" href="{{ route('wilayah.index') }}" icon="building" color="{{$profiles->sidebar_text}}" />
@endif

@if ($profiles["P03"]["allow_show"] == "on")
<!-- Area Master -->
<x-sidebarmenu title="Area" id="AreaMaster" href="{{ route('area.index') }}" icon="geo-alt" color="{{$profiles->sidebar_text}}" />
@endif

@if ($profiles["P04"]["allow_show"] == "on")
<!-- Partner Group -->
<x-sidebarmenu title="Partner Group" id="PartnerGroup" href="{{ route('partner_group.index') }}" icon="exclude" color="{{$profiles->sidebar_text}}" />
@endif

@if ($profiles["P05"]["allow_show"] == "on")
<!-- LO Group -->
<x-sidebarmenu title="LO Group" id="LoGroup" href="{{ route('lo.index') }}" icon="shop" color="{{$profiles->sidebar_text}}" />
@endif

@if ($profiles["P06"]["allow_show"] == "on")
<!-- User Management -->
<x-sidebarmenu title="User Management" id="UserManagement" href="{{ route('user_management.index') }}" icon="person-badge" color="{{$profiles->sidebar_text}}" />
@endif

@if ($profiles["P07"]["allow_show"] == "on")
<!-- User Group Manager -->
<x-sidebarmenu title="User Group Manager" id="UserGroup" href="{{ route('ug_management.index') }}" icon="people" color="{{$profiles->sidebar_text}}" />
@endif --}}