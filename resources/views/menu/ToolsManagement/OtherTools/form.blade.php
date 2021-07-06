<div class="row mt-4 d-flex justify-content-center">
  <div class="col-6">

    <!-- Nama Produk -->
    @if (Request::is('*/edit'))
    <x-form-input title="Nama {{$module->section}} *" ipname="tools_desc" value="{{$tools->tools_desc}}" opsi="required autofocus" />
    @else
    <x-form-input title="Nama {{$module->section}} *" ipname="tools_desc" value="{{old('tools_desc')}}" opsi="required autofocus" />
    @endif

    <!-- UOM -->
    @if (Request::is('*/edit'))
    <x-form-input title="UOM *" ipname="tools_uom" value="{{$tools->tools_uom}}" opsi="required autofocus" />
    @else
    <x-form-input title="UOM *" ipname="tools_uom" value="{{old('tools_uom') ?? 'UNIT'}}" opsi="required autofocus" />
    @endif

    <!-- Remark -->
    @if (Request::is('*/edit'))
    <x-alamat-input title="Remark" ipname="tools_remark" value="{{$tools->tools_remark}}" />
    @else
    <x-alamat-input title="Remark" ipname="tools_remark" value="{{old('tools_remark')}}" />
    @endif

    @if (Request::is('*edit*') && $updated_by != '')
    <footer class="blockquote-footer text-right">
      <small class="text-muted">
        terakhir diedit: <cite title="Source Title">
          {{ Carbon\Carbon::parse($tools->updated_at)->format('d M Y H:i:s') }}
          oleh
          {{$updated_by}}
        </cite>
      </small>
    </footer>
    @endif

  </div>
</div>