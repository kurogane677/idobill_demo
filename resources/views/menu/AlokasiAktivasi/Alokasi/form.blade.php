<div class="row mt-4 d-flex justify-content-center">
  <div class="col-8 flex-column">
    <div class="row">
      <div class="col-5 bg-light flex-center">
        <img @if (Request::is('*edit*')) src="/storage/group_logo/{{$group_company->group_logo}}" @else src="/storage/no_logo.png" @endif alt="logo" id="group_logo">
      </div>
      <div class="col-7">

        <!-- Tgl Alokasi -->
        @if (Request::is('*/edit'))
        <x-inputprepend title="Tanggal Alokasi" type="date" id="alp_date" name="alp_date" value="{{$subscription->alp_date}}" opsi="required" />
        @else
        <x-inputprepend title="Tanggal Alokasi" type="date" id="alp_date" name="alp_date" value="{{now()}}" opsi="required" />
        @endif

        <!-- ID LO -->
        <div class="row">
          <div class="col-7">
            <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">ID*</span>
              </div>
              <input type="text" id="lo_id" name="lo_id" class="form-control" value="{{$invoice->inv_no ?? ''}}" required readonly>
            </div>
          </div>
          <div class="col-5 text-right">
            <button id="lo-btn" type="button" class="btn btn-primary btn-sm w150px" data-toggle="modal" data-target="#ModalsLO">
              <svg class="bi" width="16" height="16" fill="currentColor">
                <use href="{{asset("bootstrap-icons.svg#shop")}}" />
              </svg> &nbsp; Pilih LO
            </button>
          </div>
        </div>

        <!-- LO Details -->
        <div id="lo-details" class="row flex-column" @if (Request::is('*/create')) hidden @endif>
          <div class="col-12">
            @if (Request::is('*edit*'))
            <li class="no-bullet"><input id="lo_name" class="input-transparent mb-1" value="Nama:" readonly></li>
            <li class="no-bullet"><input id="lo_email" class="input-transparent mb-1" value="Email:" readonly></li>
            <li class="no-bullet"><input id="lo_contact" class="input-transparent mb-1" value="Contact:" readonly></li>
            <li class="no-bullet"><input id="lo_address" class="input-transparent mb-1" value="Alamat:" readonly></li>
            @else
            <li class="no-bullet"><input id="lo_name" class="input-transparent mb-1" value="Nama:" readonly></li>
            <li class="no-bullet"><input id="lo_email" class="input-transparent mb-1" value="Email:" readonly></li>
            <li class="no-bullet"><input id="lo_contact" class="input-transparent mb-1" value="Contact:" readonly></li>
            <li class="no-bullet"><input id="lo_address" class="input-transparent mb-1" value="Alamat:" readonly></li>
            @endif
          </div>
        </div>

        <!-- Remark -->
        <div class="row mt-2">
          <div class="col-12">
            @if (Request::is('*/edit'))
            <x-alamat-input title="Remark" ipname="alp_remark" value="{{$stb->alp_remark}}" />
            @else
            <x-alamat-input title="Remark" ipname="alp_remark" value="{{old('alp_remark')}}" />
            @endif
          </div>
        </div>

      </div>
    </div>

  </div>
</div>

<div class="row mt-4 d-flex justify-content-center">
  <div class="col-8">

    <!-- Table:STB -->
    <div class="row">
      <div class="col-7 d-flex align-items-end">
        <small class="text-muted">Daftar STB yang akan dialokasikan</small>
      </div>
      <div class="col-5 text-right">
        <button id="stb-btn" type="button" class="btn btn-primary btn-sm w150px" data-toggle="modal" data-target="#ModalsSTB">
          <svg class="bi" width="16" height="16" fill="currentColor">
            <use href="{{asset("bootstrap-icons.svg#hdd-fill")}}" />
          </svg> &nbsp; Pilih STB
        </button>
      </div>
    </div>
    <hr class="w-100">
    <div class="col-12 p-0">
      <table id="{{ 'DataTableberlanggananStb' }}" class="table table-sm table-bordered table-hover" style="width: 100%; font-size: 0.85rem;">
        <thead>
          <tr>
            <th>ID</th>
            <th>Deskripsi STB</th>
            <th>S/N</th>
            <th>Chip ID</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @if (!Request::is('*create*'))
          @foreach ($tools as $tool)
          <tr>
            <td>{{$tool->tools_id}}</td>
            <td>{{$tool->tools_id}}</td>
            <td>{{$tool->tools_id}}</td>
            <td>{{$tool->tools_id}}</td>
            <td>{{$tool->tools_id}}</td>
            <td>
              <div class="text-center">
                <img id="del-icon" src='{{asset('images/delete.png')}}'>
              </div>
            </td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
    </div>

    <br>

    <!-- Table:Router -->
    <div class="row">
      <div class="col-7 d-flex align-items-end">
        <small class="text-muted">Daftar router yang akan dialokasikan</small>
      </div>
      <div class="col-5 text-right">
        <button id="router-btn" type="button" class="btn btn-primary btn-sm w150px" data-toggle="modal" data-target="#ModalsRouter">
          <svg class="bi" width="16" height="16" fill="currentColor">
            <use href="{{asset("bootstrap-icons.svg#hdd-fill")}}" />
          </svg> &nbsp; Pilih Router
        </button>
      </div>
    </div>
    <hr class="w-100">
    <div class="col-12 p-0">
      <table id="{{ 'DataTableberlanggananRouter' }}" class="table table-sm table-bordered table-hover" style="width: 100%; font-size: 0.85rem;">
        <thead>
          <tr>
            <th>ID</th>
            <th>Deskripsi Router</th>
            <th>S/N</th>
            <th>MAC Address</th>
            <th>IP Address</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @if (!Request::is('*create*'))
          @foreach ($tools as $tool)
          <tr>
            <td>{{$tool->tools_id}}</td>
            <td>{{$tool->tools_id}}</td>
            <td>{{$tool->tools_id}}</td>
            <td>{{$tool->tools_id}}</td>
            <td>{{$tool->tools_id}}</td>
            <td>{{$tool->tools_id}}</td>
            <td>
              <div class="text-center">
                <img id="del-icon" src='{{asset('images/delete.png')}}'>
              </div>
            </td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
    </div>

    <br>

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

<!-- Modals:LO -->
<x-modals-with-table id="ModalsLO" title="Pilih LO" modalSize="modal-lg">
  {!! $loTable->html()->table(['id' => 'subscriptionlo-table','class' => 'table table-striped']) !!}
</x-modals-with-table>

<!-- Modals:STB -->
<x-modals-with-table id="ModalsSTB" title="Pilih Set Top Box" modalSize="modal-xl">
  {!! $stbTable->html()->table(['id' => 'subscriptionstb-table','class' => 'table table-striped']) !!}
</x-modals-with-table>

<!-- Modals:Router -->
<x-modals-with-table id="ModalsRouter" title="Pilih Modem / Router" modalSize="modal-xl">
  {!! $routerTable->html()->table(['id' => 'subscriptionrouter-table','class' => 'table table-striped']) !!}
</x-modals-with-table>

{{ $loTable->html()->scripts() }}
{{ $stbTable->html()->scripts() }}
{{ $routerTable->html()->scripts() }}

<script src="{{ asset('js/views/alokasi/stb.js') }}"></script>
<script src="{{ asset('js/views/alokasi/router.js') }}"></script>

<script>
  $(function() {
      $("#subscriptionlo-table").children('tbody').on('click', function(e){
      let td = $(e.target).closest('tr').children('td');
      let lo_id = td.eq(0).text();
      let lo_name = td.eq(1).text();
      let lo_email = td.eq(2).text();
      let lo_contact = td.eq(3).text();
      let lo_address = td.eq(4).text();

      if (lo_id.includes('No data available'))
      {
        lo_id = '';
        lo_name = '';
        lo_email = '';
        lo_contact = '';
        lo_address = '';
      }
      
      $("#lo-details").attr('hidden', false);
      
      if (lo_id != '') {
        $("#lo_id").val(lo_id);
        $("#lo_name").val('Nama: ' + lo_name);
        $("#lo_email").val('Email: ' + lo_email);
        $("#lo_contact").val('Contact: ' + lo_contact);
        $("#lo_address").val('Alamat: ' + lo_address);

        $("#ModalsLO").modal('toggle');
      }

    });
  });
</script>