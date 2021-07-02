<div class="row mt-4 d-flex justify-content-center">
  <div class="col-6">

    @if (Request::is('*/edit'))
    <input id="wilayah_id" name="wilayah_id" value="{{$area->wilayah_id}}" hidden />
    @else
    <input id="wilayah_id" name="wilayah_id" hidden />
    @endif

    <!-- Wilayah -->
    <div class="row no-gutters">
      <div class="col-9">
        @if (Request::is('*/edit'))
        <x-form-input title="Wilayah *" ipname="pilih_wilayah" value="{{$area->wilayah_id .' - '. $wilayah->wilayah_name}}" opsi="required readonly" />
        @else
        <x-form-input title="Wilayah *" ipname="pilih_wilayah" value="{{old('pilih_wilayah')}}" opsi="required readonly" />
        @endif
      </div>
      <div class="col-3 pl-1 text-right">
        {{-- @if (Request::is('*/edit')) --}}
        <button type="button" class="btn btn-primary btn-sm" @if (isset($area) && $area->area_link > 0)
          onclick="alert('Area ini tidak dapat diubah wilayahnya jika sudah memiliki link dengan customer, lo, ataupun partner!')">
          @else
          data-toggle="modal" data-target="#ModalsWilayah">
          @endif
          <svg class="bi" width="16" height="16" fill="currentColor">
            <use href="{{asset("bootstrap-icons.svg#building")}}" />
          </svg> Pilih Wilayah
        </button>
        {{-- @endif --}}
      </div>
    </div>

    <!-- Nama -->
    @if (Request::is('*/edit'))
    <x-form-input title="Nama {{$module->section}} *" ipname="area_name" value="{{$area->area_name}}" opsi="required autofocus" />
    @else
    <x-form-input title="Nama {{$module->section}} *" ipname="area_name" value="{{old('area_name')}}" opsi="required autofocus" />
    @endif

    <!-- Keterangan -->
    @if (Request::is('*/edit'))
    <x-alamat-input title="Keterangan" ipname="area_remark" value="{{$area->area_remark}}" />
    @else
    <x-alamat-input title="Keterangan" ipname="area_remark" value="{{old('area_remark')}}" />
    @endif

    @if (Request::is('*edit*'))
    @if ($updated_by != '')
    <footer class="blockquote-footer text-right">
      <small class="text-muted">
        terakhir diedit: <cite title="Source Title">
          {{ Carbon\Carbon::parse($area->updated_at)->format('d M Y H:i:s') }}
          oleh
          {{$updated_by}}
        </cite>
      </small>
    </footer>
    @endif
    @endif

  </div>
</div>

<!-- Modals:Wilayah -->
<div class="modal fade" id="ModalsWilayah" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body mt-0 pt-0">
        <h6 class="text-dark mt-4 pl-2">Pilih Wilayah</h6>
        <hr class="w-100">
        <div class="row d-flex justify-content-center">
          <div class="col-12 pb-2">
            {!! $dataTable->table(['class' => 'table table-striped table-hover']) !!}
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
{!! $dataTable->scripts() !!}
<script>
  $(function() {

    var tblID = "#areawilayah-table"
    var table = $("#areawilayah-table").DataTable();   

    $(tblID + " tbody").on("click","tr", function () {
      var row = table.row(this).data();
      wilayah_id = row.wilayah_id
      wilayah_name = row.wilayah_name

      $("#wilayah_id").val(wilayah_id);
      $("#pilih_wilayah").val(wilayah_id + ' - ' + wilayah_name);
      $("#ModalsWilayah").modal('toggle');
    });


  });
</script>