<div class="row mt-4 d-flex justify-content-center">
  <div class="col-10">

    <!-- Nama -->
    @if (Request::is('*/edit'))
    <x-form-input title="Nama {{$module->section}} *" ipname="wilayah_name" value="{{$wilayah->wilayah_name}}" opsi="required autofocus" />
    @else
    <x-form-input title="Nama {{$module->section}} *" ipname="wilayah_name" value="{{old('wilayah_name')}}" opsi="required autofocus" />
    @endif

    <!-- Keterangan -->
    @if (Request::is('*/edit'))
    <x-alamat-input title="Keterangan" ipname="wilayah_remark" value="{{$wilayah->wilayah_remark}}" />
    @else
    <x-alamat-input title="Keterangan" ipname="wilayah_remark" value="{{old('wilayah_remark')}}" />
    @endif

    @if (Request::is('*edit*'))
    @if ($updated_by != '')
    <footer class="blockquote-footer text-right">
      <small class="text-muted">
        terakhir diedit: <cite title="Source Title">
          {{ Carbon\Carbon::parse($wilayah->updated_at)->format('d M Y H:i:s') }}
          oleh
          {{$updated_by}}
        </cite>
      </small>
    </footer>
    @endif
    @endif

  </div>
</div>