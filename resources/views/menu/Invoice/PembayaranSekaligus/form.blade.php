<div class="row mt-4 d-flex justify-content-center">

  <div class="col-8">
    <input name="berdasarkan" value="{{$berdasarkan}}" hidden>

    @if ($berdasarkan == 'lo' || $berdasarkan == 'partner')
    <!-- GROUP -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">
          @if ($berdasarkan == 'lo')
          Pilih LO *
          @elseif ($berdasarkan == 'partner')
          Pilih Partner *
          @endif
        </span>
      </div>
      <select class="form-control form-control-sm" id="group_id" name="group_id">
        @foreach ($groups as $group_id => $group_name)
        <option value="{{$group_id}}">
          {{$group_id}} - {{$group_name}}
        </option>
        @endforeach
      </select>
    </div>
    @endif

    @if ($berdasarkan == 'area')
    <!-- AREA -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">
          Pilih Area *
        </span>
      </div>
      <select class="form-control form-control-sm" id="area_id" name="area_id">
        @foreach ($areas as $area_id => $area_name)
        <option value="{{$area_id}}">
          {{$area_id}} - {{$area_name}}
        </option>
        @endforeach
      </select>
    </div>
    @endif

    @if ($berdasarkan == 'date')
    <div class="flex-center">
      <!-- Tanggal Mulai -->
      <x-inputprepend title="Tanggal Mulai" type="date" id="start_date" name="start_date" size="" value="{{now()}}" opsi="required" />
      <div class="mx-1"></div>
      <!-- Tanggal Akhir -->
      <x-inputprepend title="Tanggal Akhir" type="date" id="end_date" name="end_date" size="" value="{{now()}}" opsi="required" />
      <div class="mx-1"></div>
      <button type="button" id="generate" class="btn btn-sm btn-warning d-inline-flex mb-2">
        <svg class="bi" width="22" height="22" fill="currentColor">
          <use href="{{asset("bootstrap-icons.svg#arrow-repeat")}}" />
        </svg>&nbsp;Generate
      </button>
    </div>
    @endif

    @if ($berdasarkan == 'month')
    <div class="flex-center">
      <!-- Month -->
      <x-select-month />
      <div class="mx-1"></div>
      <!-- Year -->
      <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend field170px">
          <span class="input-group-text field170px">
            Tahun
          </span>
        </div>
        <select class="form-control form-control-sm" id="year" name="year">
          @foreach ($years as $year)
          <option value="{{$year}}">
            {{$year}}
          </option>
          @endforeach
        </select>
      </div>
      <div class="mx-1"></div>
      <button type="button" id="generate" class="btn btn-sm btn-warning d-inline-flex mb-2">
        <svg class="bi" width="22" height="22" fill="currentColor">
          <use href="{{asset("bootstrap-icons.svg#arrow-repeat")}}" />
        </svg>&nbsp;Generate
      </button>
    </div>
    @endif

    <hr>

    <table id="invoice_list" class="dataTable table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr class="text-center">
          <th>No. Invoice</th>
          <th>Tgl Invoice</th>
          <th>Jatuh Tempo</th>
          <th>Nama Pelanggan</th>
          <th>Total</th>
        </tr>
      </thead>
      <tfoot>
        <tr class="bg-dark text-white">
          <th colspan="4" class="text-right">Total Keseluruhan :</th>
          <th colspan="1"></th>
        </tr>
      </tfoot>
    </table>

  </div>

  <div class="col-4">

    @if ($berdasarkan == 'lo' || $berdasarkan == 'partner')
    <!-- Group Info -->
    <div class="group_info mb-3 shadow">
      <div class="row no-gutters">
        <img id="logoImg" alt="logo" src="{{('/storage/group_logo/'.$group->group_logo) ?? ''}}" class="col-6" style="object-fit: contain;">
        <div class="col-6 flex-center flex-column">
          <h5 id="group_name">{{($group->group_name) ?? ''}}</h5>
          <h6 id="group_email">{{($group->group_email) ?? ''}}</h6>
          <h6>
            <svg class="bi" width="16" height="16" fill="currentColor">
              <use href="{{asset("bootstrap-icons.svg#telephone-fill")}}" />
            </svg> <span id="group_nohp_code">{{($group->group_nohp_code) ?? ''}}</span><span id="group_no_hp">{{($group->group_no_hp) ?? ''}}</span>
          </h6>
          <h6 id="group_address">{{($group->group_address) ?? ''}}</h6>
        </div>
      </div>
    </div>
    @endif

    <!-- Tanggal Pembayaran -->
    <x-inputprepend title="Tanggal Pembayaran" type="date" id="paid_date" name="paid_date" value="{{old('paid_date') ?? now()}}" opsi="required" />

    <!-- Remark -->
    <x-form-input title="Remark" ipname="paid_remark" value="{{old('paid_remark')}}" />

    <!-- COLLECTOR -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">Collector *</span>
      </div>
      <select class="form-control form-control-sm" id="collector_id" name="collector_id">
        @foreach ($collectors as $user_id => $user_name)
        <option value="{{$user_id}}">
          {{$user_id}} - {{$user_name}}
        </option>
        @endforeach
      </select>
    </div>
    <div class="my-5"></div>
    <div class="text-right">
      <a href="{{url()->previous()}}" class="btn btn-dark btn-sm">
        Cancel
      </a>
      <button id="submit_pembayaran" type="submit" class="btn btn-success btn-sm ml-2">
        Submit Pembayaran
      </button>
    </div>
  </div>
</div>

<script>
  // load table
  $(function () {
    var berdasarkan = "{{$berdasarkan}}"

    var table = $('#invoice_list').DataTable({
        processing: true,
        serverSide: false,
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        ajax: {
          url: "{{ route('invoice.get_invoices') }}",
          data: function(data){

            data.berdasarkan = berdasarkan;

            if (berdasarkan == 'lo' || 'partner')
            {
              let group_id = $('#group_id').val();
              data.group_id = group_id;              
            }

            if (berdasarkan == 'area')
            {
              let area_id = $('#area_id').val();
              data.area_id = area_id;
            }

            if (berdasarkan == 'date')
            {
              let start_date = $('#start_date').val();
              let end_date = $('#end_date').val();
              data.start_date = start_date;
              data.end_date = end_date;
            }

            if (berdasarkan == 'month')
            {
              let month = $('#month').val();
              let year = $('#year').val();
              data.month = month;
              data.year = year;
            }

          },
        },
        columns: [
            {data: 'inv_no', name: 'inv_no'},
            {data: 'inv_date', name: 'inv_date'},
            {data: 'exp_date', name: 'exp_date'},
            {data: 'cust_name', name: 'cust_name'},
            {data: 'grand_total', name: 'grand_total', className: 'text-right'},
        ],
        // columnDefs: [
        //   {
        //       targets: 0,
        //       createdCell:  function (td, cellData, rowData, row, col) {
        //         $(td).attr('name', 'inv[]'); 
        //       }
        //   }
        // ],
        footerCallback: function(row, data, start, end, display) {
          var api = this.api(),
              data;

          // Remove the formatting to get integer data for summation
          var intVal = function(i) {          
              return typeof i === "string"
                  ? i.slice(0, -3).replace(/[\$,.]/g, "") * 1
                  : typeof i === "number"
                  ? i
                  : 0;
          };

          allTotal = api
              .column(4)
              .data()
              .reduce(function(a, b) {
                  return intVal(a) + intVal(b);
              }, 0);

          // Update footer
          $(api.column(4).footer()).html(number_format(allTotal,2,',','.'));
        },
        dom: '<"flex-between"lf>rt<"flex-between"ip>',
        language: {
          searchPlaceholder: 'Search ...',
          sSearch: '',          
          paginate: {
            next: '&#11166;',
            previous: '&#11164;',
          },
          lengthMenu: 'Show _MENU_',
          processing: `
            <div class="progress px-2">
              <div class="bg-danger progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%"></div>                
            </div>`
        }

    });


    if (berdasarkan == 'lo' || berdasarkan == 'partner')
    {
      $('#group_id').on('change', function(){

        // reload table
        table.ajax.reload(null,false);

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
        });
        $.ajax({
          url: "{{ route('invoice.get_group') }}",
          method: 'get',
          data: {
            group_id: $(this).val(),
          },
          success: function(result){
            let res = JSON.parse(result);
            // console.log(res);
            $("#logoImg").attr('src', '/storage/group_logo/'+res.group_logo);
            $("#group_name").text(res.group_name)
            $("#group_email").text(res.group_email)
            $("#group_nohp_code").text(res.group_nohp_code)
            $("#group_no_hp").text(res.group_no_hp)
            $("#group_address").text(res.group_address)
          },
          error: function (e) {
          console.log(e);
          }
        });

      });
    }
    if (berdasarkan == 'area')
    {
      $('#area_id').on('change', function(){
        // reload table
        table.ajax.reload(null,false);
      });
    }
    if (berdasarkan == 'date' || berdasarkan == 'month')
    {
      $('#generate').on('click', function(){
        // reload table
        table.ajax.reload(null,false);
      });
    }

    $('#formCreate').on('submit', function(){
      let data = table.rows().data();
      for (let i = 0; i < data.length; i++) {
        $("<input />").attr("type", "hidden")
            .attr("name", "inv_no[]")
            .attr("value", data[i].inv_no)
            .appendTo("#formCreate");
      }
    })
    
  });

</script>