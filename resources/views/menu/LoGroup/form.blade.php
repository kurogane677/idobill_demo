<div class="row mt-4 d-flex justify-content-center">

  <div class="col-6">
    <small class="text-muted">Area cakupan LO</small>
    <hr class="w-100">
    <div class="row">
      <div class="col-12">
        <table id="DataTableLoArea" class="table table-sm table-bordered table-hover" style="width: 100%; font-size: 0.85rem;">
          <thead>
            <tr>
              <th></th>
              <th>ID Area</th>
              <th>Nama Area</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-6">

    <!-- Upload Logo -->
    @if (Request::is('*/edit'))
    <x-image-input title="Upload Logo *" tempImg="temp_group_logo" value="{{ $LoGroup->group_logo ? ($LoGroup->group_logo ?? old('group_logo')) : 'no_img.png' }}" src="{{$LoGroup->group_logo ? '/storage/group_logo/'.$LoGroup->group_logo : $noImage}}" noImage="{{$noLogo}}" dbField="group_logo" />
    @else
    <x-image-input title="Upload Logo *" tempImg="temp_lo_group_logo" value="no_img.png" src="{{$noLogo}}" noImage="{{$noLogo}}" dbField="group_logo" />
    @endif

    <!-- Nama Group -->
    @if (Request::is('*/edit'))
    <x-form-input title="Nama Perusahaan *" ipname="group_name" placeholder="Isi dengan nama perusahaan" value="{{$LoGroup->group_name}}" opsi="required" />
    @else
    <x-form-input title="Nama Perusahaan *" ipname="group_name" placeholder="Isi dengan nama perusahaan" value="{{old('group_name')}}" opsi="required" />
    @endif

    <!-- Email Perusahaan -->
    @if (Request::is('*/edit'))
    <x-form-input type="email" title="Email Perusahaan *" ipname="group_email" value="{{$LoGroup->group_email}}" opsi="required" />
    @else
    <x-form-input type="email" title="Email Perusahaan *" ipname="group_email" value="{{old('group_email')}}" opsi="required" />
    @endif

    <!-- No Pelayanan -->
    @if (Request::is('*/edit'))
    <x-hpno-input title="No Pelayanan *" codename="group_nohp_code" ipname="group_no_hp" code="{{$LoGroup->group_nohp_code}}" value="{{$LoGroup->group_no_hp}}" />
    @else
    <x-hpno-input title="No Pelayanan *" codename="group_nohp_code" ipname="group_no_hp" code="+62" value="{{old('group_no_hp')}}" />
    @endif

    <!-- Rekening Bank -->
    @if (Request::is('*/edit'))
    <x-form-input title="Rekening Bank *" ipname="group_bank_account" value="{{$LoGroup->group_bank_account}}" />
    @else
    <x-form-input title="Rekening Bank *" ipname="group_bank_account" value="{{old('group_bank_account')}}" />
    @endif

    <!-- Komisi -->
    @if (Request::is('*/edit'))
    <x-form-input type="number" title="Komisi (%) *" ipname="group_comission" maxlength="3" value="{{$LoGroup->group_comission}}" />
    @else
    <x-form-input type="number" title="Komisi (%) *" ipname="group_comission" maxlength="3" value="{{old('group_comission')}}" />
    @endif

    <!-- Alamat -->
    @if (Request::is('*/edit'))
    <x-alamat-input title="Alamat *" ipname="group_address" value="{{$LoGroup->group_address}}" />
    @else
    <x-alamat-input title="Alamat *" ipname="group_address" value="{{old('group_address')}}" />
    @endif

    <!-- Cara Pembayaran -->
    {{-- <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">Cara Pembayaran</span>
      </div>
      <select class="form-control form-control-sm" id="cara_bayar_id" name="cara_bayar_id">
        @foreach ($cara_bayar as $cara_bayar_id => $cara_bayar_name)
        @if (Request::is('*edit*'))
        <option value="{{$cara_bayar_id}}" {{ ( $cara_bayar_id == $customer->cara_bayar_id) ? 'selected' : '' }}>
    {{$cara_bayar_name}}
    </option>
    @else
    <option value="{{$cara_bayar_id}}">
      {{$cara_bayar_name}}
    </option>
    @endif
    @endforeach
    </select>
  </div> --}}

  @if (Request::is('*edit*'))
  @isset($LoGroup)
  @if ($updated_by != '')
  <footer class="blockquote-footer text-right">
    <small class="text-muted">
      terakhir diedit: <cite title="Source Title">
        {{ Carbon\Carbon::parse($LoGroup->updated_at)->format('d M Y H:i:s') }}
        oleh
        {{$updated_by}}
      </cite>
    </small>
  </footer>
  @endif
  @endisset
  @endif

  <div class="float-right my-3">
    <a href="{{ route("lo.index") }}" class="btn btn-dark btn-sm">
      Cancel
    </a>
    @if (Request::is('*/edit'))
    <button type="submit" id="submitBtn" class="btn btn-info btn-sm ml-2">
      Simpan Perubahan
    </button>
    @else
    <button type="submit" id="submitBtn" class="btn btn-success btn-sm ml-2">
      Create LO Baru
    </button>
    @endif
  </div>

  @if (Request::is('*/edit'))
  <div class="my-3 py-3"></div>
  <small class="text-muted">Area cakupan LO saat ini</small>
  <hr class="w-100">
  <div class="row">
    <div class="col-12">
      {!! $dataTable->table() !!}
    </div>
  </div>
  @endif

</div>

</div>

{!! $dataTable->scripts() !!}
<script type="text/javascript">
  $(function() {

    var table = $('#DataTableLoArea').DataTable({
      'serverSide': true,
      'processing': true,
      'ajax': '{{ route("lo.selectArea") }}',
      'columnDefs': [
         {
            'targets': 0,
            'checkboxes': {
               'selectRow': true
            }
         }
        ],
      'columns': [
          {'data': 'area_id'},
          {'data': 'area_id'},
          {'data': 'area_name'},
        ],
      'createdRow': function( row, data ) {
        if ( areas.includes(data.area_id) ) {
          table.row( row ).select();
        }
      },
      'select': {'style': 'multi'},
      'order': [[2, 'asc']],
      // 'scrollY': '600px',
      // 'scrollCollapse': true,
      'paging': false,
      'dom': '<"d-flex justify-content-between align-items-center"if>rt',
      'language' : {
            'searchPlaceholder' : 'Search...',
            'sSearch' : '',
            'lengthMenu' : '_MENU_ Area',
            'info': '',
            'select': {'rows': '%d Area dipilih'},
            'processing': `
            <div class="col-12">
              <div class="progress">
                <div class="bg-danger progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%">
                </div>
              </div>
            </div>
            `,
            // 'processing': 'Lagi Loading...',
          },
   });

   // Handle form submission event
   $('form').on('submit', function(e){
      var form = this;

      var rows_selected = table.column(0).checkboxes.selected();

      // Iterate over all selected checkboxes
      $.each(rows_selected, function(index, rowId){
         // Create a hidden element
         $(form).append(
             $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'idAreaSelected[]')
                .val(rowId)
         );
      });

      if (rows_selected.length == 0) {
        alert('Area tidak boleh kosong, silahkan pilih salah satu area.');
        return false;
      }
   });

    $("#nohp_code,#notelp_code").intlTelInput({
      initialCountry:"id",
      preferredCountries: ["id"],
    });

 
  });
</script>