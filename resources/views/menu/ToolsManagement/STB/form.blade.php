<div class="row mt-4 d-flex justify-content-center">
  <div class="col-6">

    <!-- Nama Produk -->
    @if (Request::is('*/edit'))
    <x-form-input title="Nama {{$module->section}} *" ipname="stb_desc" value="{{$stb->stb_desc}}" opsi="required autofocus" />
    @else
    <x-form-input title="Nama {{$module->section}} *" ipname="stb_desc" value="{{old('stb_desc')}}" opsi="required autofocus" />
    @endif

    <!-- Serial Number -->
    @if (Request::is('*/edit'))
    <x-form-input title="Serial Number *" ipname="stb_serial_no" value="{{$stb->stb_serial_no}}" opsi="required autofocus" />
    @else
    <x-form-input title="Serial Number *" ipname="stb_serial_no" value="{{old('stb_serial_no')}}" opsi="required autofocus" />
    @endif

    <!-- Chip ID -->
    @if (Request::is('*/edit'))
    <x-form-input title="Chip ID *" ipname="stb_chip_id" value="{{$stb->stb_chip_id}}" opsi="required autofocus" />
    @else
    <x-form-input title="Chip ID *" ipname="stb_chip_id" value="{{old('stb_chip_id')}}" opsi="required autofocus" />
    @endif

    <!-- Remark -->
    @if (Request::is('*/edit'))
    <x-alamat-input title="Remark" ipname="stb_remark" value="{{$stb->stb_remark}}" />
    @else
    <x-alamat-input title="Remark" ipname="stb_remark" value="{{old('stb_remark')}}" />
    @endif

    @if (Request::is('*edit*') && $updated_by != '')
    <footer class="blockquote-footer text-right">
      <small class="text-muted">
        terakhir diedit: <cite title="Source Title">
          {{ Carbon\Carbon::parse($stb->updated_at)->format('d M Y H:i:s') }}
          oleh
          {{$updated_by}}
        </cite>
      </small>
    </footer>
    @endif

  </div>
</div>