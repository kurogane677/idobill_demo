<div class="row mt-4 d-flex justify-content-center">
  <div class="col-6">

    <!-- Nama Produk -->
    @if (Request::is('*/edit'))
    <x-form-input title="Nama {{$module->section}} *" ipname="dev_desc" value="{{$router->dev_desc}}" opsi="required autofocus" />
    @else
    <x-form-input title="Nama {{$module->section}} *" ipname="dev_desc" value="{{old('dev_desc')}}" opsi="required autofocus" />
    @endif

    <!-- Serial Number -->
    @if (Request::is('*/edit'))
    <x-form-input title="Serial Number *" ipname="dev_sn" value="{{$router->dev_sn}}" opsi="required autofocus" />
    @else
    <x-form-input title="Serial Number *" ipname="dev_sn" value="{{old('dev_sn')}}" opsi="required autofocus" />
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
    <x-alamat-input title="Remark" ipname="dev_remark" value="{{$router->dev_remark}}" />
    @else
    <x-alamat-input title="Remark" ipname="dev_remark" value="{{old('dev_remark')}}" />
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