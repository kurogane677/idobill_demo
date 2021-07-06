<div class="row mt-4 d-flex justify-content-center">
  <div class="col-8 flex-column">
    <div class="row">
      <div class="col-5 bg-light flex-center">
        <div id="lo-logo">
          <img @if (Request::is('*/edit')) src="/storage/group_logo/{{$lo_groups->group_logo}}" @else src="/storage/no_logo.png" @endif alt="logo" id="group_logo">
        </div>
      </div>
      <div class="col-7">

        <!-- Tgl Alokasi -->
        @if (Request::is('*/edit'))
        <x-inputprepend title="Tanggal Alokasi" type="date" id="alp_date" name="alp_date" value="{{$alokasi->alp_date}}" opsi="required" />
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
              <input type="text" id="lo_id" name="lo_id" class="form-control" value="{{$alokasi->lo_id ?? ''}}" required readonly>
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
        <div id="lo-details" class="row flex-column" @if (Request::is('*create*')) hidden @endif>
          <div class="col-12">
            @if (Request::is('*/edit'))
            <li class="no-bullet"><input id="lo_name" class="input-transparent mb-1" value="Nama: {{$lo_groups->group_name}}" readonly></li>
            <li class="no-bullet"><input id="lo_email" class="input-transparent mb-1" value="Email: {{$lo_groups->group_email}}" readonly></li>
            <li class="no-bullet"><input id="lo_contact" class="input-transparent mb-1" value="Contact: {{$lo_groups->group_nohp_code.$lo_groups->group_no_hp}}" readonly></li>
            <li class="no-bullet"><input id="lo_address" class="input-transparent mb-1" value="Alamat: {{$lo_groups->group_address}}" readonly></li>
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
            <x-alamat-input title="Remark" ipname="alp_remark" value="{{$alokasi->alp_remark}}" />
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
  <div class="col-10">

    <!-- Table:Device -->
    <div class="row">
      <div class="col-7 d-flex align-items-end">
        <small class="text-muted">Daftar perangkat yang akan dialokasikan</small>
      </div>
      <div class="col-5 text-right">
        <button id="stb-btn" type="button" class="btn btn-primary btn-sm w150px" data-toggle="modal" data-target="#ModalsDevice">
          <svg class="bi" width="16" height="16" fill="currentColor">
            <use href="{{asset("bootstrap-icons.svg#hdd-fill")}}" />
          </svg> &nbsp; Pilih Perangkat
        </button>
      </div>
    </div>
    <hr class="w-100">
    <div class="col-12 p-0">
      <table id="{{ 'DataTableAlokasiPerangkat' }}" class="table table-sm table-bordered table-hover" style="width: 100%; font-size: 0.85rem;">
        <thead>
          <tr>
            <th>No.</th>
            <th>ID</th>
            <th class="text-center">Category</th>
            <th>Deskripsi Perangkat</th>
            <th>Details</th>
            <th class="text-center">UOM</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @if (Request::is('*/edit'))
          @foreach ($alp_devices as $dev)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$dev->dev_id}}</td>
            <td class="text-center">{{$dev->category_name}}</td>
            <td>{{$dev->dev_desc}}</td>
            <td>
              <li class="no-bullet">S/N: {{$dev->dev_sn}}</li>
              <li class="no-bullet">
                @if ($dev->stb_chip_id)
                Chip ID: {{$dev->stb_chip_id}}
                @elseif($dev->router_mac_addr)
                MAC Address: {{$dev->router_mac_addr}}
                @endif
              </li>
              <li class="no-bullet">
                @if ($dev->router_ip_addr)
                IP Address: {{$dev->router_ip_addr}}
                @endif
              </li>
            </td>
            <td class="text-center">{{$dev->dev_uom}}</td>
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

    @if (Request::is('*/edit') && $updated_by != '')
    <footer class="blockquote-footer text-right">
      <small class="text-muted">
        terakhir diedit: <cite title="Source Title">
          {{ Carbon\Carbon::parse($alokasi->updated_at)->format('d M Y H:i:s') }}
          oleh
          {{$updated_by}}
        </cite>
      </small>
    </footer>
    @endif

  </div>
</div>

<!-- Modals:LO -->
<x-modals-with-table id="ModalsLO" title="Pilih LO" modalSize="modal-xl">
  {!! $loTable->html()->table(['id' => 'alokasilo-table','class' => 'table table-striped cursor-pointer']) !!}
</x-modals-with-table>

<!-- Modals:Device -->
<x-modals-with-table id="ModalsDevice" title="Pilih Perangkat" modalSize="modal-xl">
  {!! $deviceTable->html()->table(['id' => 'device-table','class' => 'table table-striped']) !!}
</x-modals-with-table>

{{ $loTable->html()->scripts() }}
{{ $deviceTable->html()->scripts() }}

<script src="{{ asset('js/views/alokasi/alokasi_perangkat.js') }}"></script>

<script>
  $(function() {
      $("#alokasilo-table").children('tbody').on('click', function(e){
      let td = $(e.target).closest('tr').children('td');
      let lo_logo = td.eq(0).html();
      let lo_id = td.eq(1).text();
      let lo_name = td.eq(2).text();
      let lo_email = td.eq(3).text();
      let lo_contact = td.eq(4).text();
      let lo_address = td.eq(5).text();
      
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

        $("#lo-logo").html(lo_logo);
        $("#lo_id").val(lo_id);
        $("#lo_name").val('Nama: ' + lo_name);
        $("#lo_email").val('Email: ' + lo_email);
        $("#lo_contact").val('Contact: ' + lo_contact);
        $("#lo_address").val('Alamat: ' + lo_address);

        $("#lo-logo img").removeAttr('width');

        $("#ModalsLO").modal('toggle');
      }

    });
  });
</script>