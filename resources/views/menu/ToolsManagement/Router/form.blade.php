<div class="row mt-4 d-flex justify-content-center">
  <div class="col-6">

    <!-- Nama Produk -->
    @if (Request::is('*/edit'))
    <x-form-input title="Nama {{$module->section}} *" ipname="router_desc" value="{{$router->router_desc}}" opsi="required autofocus" />
    @else
    <x-form-input title="Nama {{$module->section}} *" ipname="router_desc" value="{{old('router_desc')}}" opsi="required autofocus" />
    @endif

    <!-- Serial Number -->
    @if (Request::is('*/edit'))
    <x-form-input title="Serial Number *" ipname="router_serial_no" value="{{$router->router_serial_no}}" opsi="required autofocus" />
    @else
    <x-form-input title="Serial Number *" ipname="router_serial_no" value="{{old('router_serial_no')}}" opsi="required autofocus" />
    @endif

    <!-- MAC Address -->
    @if (Request::is('*/edit'))
    <x-form-input title="MAC Address *" ipname="router_mac_addr" value="{{$router->router_mac_addr}}" opsi="required autofocus" />
    @else
    <x-form-input title="MAC Address *" ipname="router_mac_addr" value="{{old('router_mac_addr')}}" opsi="required autofocus" />
    @endif

    <!-- IP Address -->
    @if (Request::is('*/edit'))
    <x-form-input title="IP Address *" ipname="router_ip_addr" value="{{$router->router_ip_addr}}" maxlength="15" opsi="required autofocus" />
    @else
    <x-form-input title="IP Address *" ipname="router_ip_addr" value="{{old('router_ip_addr')}}" maxlength="15" opsi="required autofocus" />
    @endif

    <!-- Remark -->
    @if (Request::is('*/edit'))
    <x-alamat-input title="Remark" ipname="router_remark" value="{{$router->router_remark}}" />
    @else
    <x-alamat-input title="Remark" ipname="router_remark" value="{{old('router_remark')}}" />
    @endif

    @if (Request::is('*edit*') && $updated_by != '')
    <footer class="blockquote-footer text-right">
      <small class="text-muted">
        terakhir diedit: <cite title="Source Title">
          {{ Carbon\Carbon::parse($router->updated_at)->format('d M Y H:i:s') }}
          oleh
          {{$updated_by}}
        </cite>
      </small>
    </footer>
    @endif

  </div>
</div>