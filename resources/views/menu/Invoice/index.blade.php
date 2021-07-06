@extends('menu.base_layout_menu')

@section('page-title')
&nbsp;- Tagihan
@endsection

@section('menu-header')
@if ($profiles->type == "CUS")
<h5 class="pt-2">Daftar Tagihan</h5>
@else
<h5 class="pt-2">Daftar Tagihan Pelanggan</h5>
@endif
@endsection

@section('filter-button')
{{-- <x-showfilterboxbtn /> --}}
@endsection

@section('filter-menu')
<form class="col-12 bg-blue text-white py-4 form-filter form-filter-hide">
  @csrf

  <div class="form-row d-flex justify-content-center">
    <div class="col-3">
      <x-filterdate title="Awal Periode" id="start_date" name="start_date" />
    </div>
    <div class="col-3">
      <x-filterdate title="Akhir Periode" id="end_date" name="end_date" />
    </div>
  </div>

  <div class="form-row mt-2 d-flex justify-content-center">
    <div class="col-6 d-flex justify-content-end">
      <x-resetfilterbtn> Reset</x-resetfilterbtn>
    </div>
    <div class="col-6">
      <x-submitfilterbtn> Submit Filter</x-submitfilterbtn>
    </div>
  </div>

</form>
@endsection

@section('menu-body')
<div class="col-12 pt-4 pb-2">
  <table id="invoice-table" class="table">
    <thead>
      <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
  </table>
  {{-- {!! $dataTable->table(['class' => 'table table-stripedx']) !!} --}}
</div>
@endsection

@section('menu-footer')
<div class="card-footer flex-between">
  <span>
    Catatan : TOTAL belum termasuk biaya collect dan biaya terlambat
  </span>
  <div>
    @if ($user_type != 'CUS')
    <button type="button" id="generateKwitansi" data-toggle="modal" data-target="#generateKwitansiModals" class="btn btn-sm btn-warning mr-2">
      Generate Kwitansi
    </button>
    <div class="btn-group dropup">
      <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Pembayaran Sekaligus
      </button>
      <div id="dropdown-pembayaran-sekaligus" class="dropdown-menu p-2 shadow">
        <a href="{{route('invoice.payment_all', 'lo')}}" class="btn btn-sm btn-outline-success text-left w180px mb-1">
          <svg class="bi" width="16" height="16" fill="currentColor">
            <use href="{{asset("bootstrap-icons.svg#shop")}}" />
          </svg>&nbsp; Berdasarkan LO
        </a>
        <a href="{{route('invoice.payment_all', 'partner')}}" class="btn btn-sm btn-outline-success text-left w180px mb-1">
          <svg class="bi" width="16" height="16" fill="currentColor">
            <use href="{{asset("bootstrap-icons.svg#exclude")}}" />
          </svg>&nbsp; Berdasarkan Partner
        </a>
        <a href="{{route('invoice.payment_all', 'area')}}" class="btn btn-sm btn-outline-success text-left w180px mb-1">
          <svg class="bi" width="16" height="16" fill="currentColor">
            <use href="{{asset("bootstrap-icons.svg#geo-alt")}}" />
          </svg>&nbsp; Berdasarkan Area
        </a>
        <a href="{{route('invoice.payment_all', 'date')}}" class="btn btn-sm btn-outline-success text-left w180px mb-1">
          <svg class="bi" width="16" height="16" fill="currentColor">
            <use href="{{asset("bootstrap-icons.svg#calendar-date")}}" />
          </svg>&nbsp; Berdasarkan Tanggal
        </a>
        <a href="{{route('invoice.payment_all', 'month')}}" class="btn btn-sm btn-outline-success text-left w180px mb-1">
          <svg class="bi" width="16" height="16" fill="currentColor">
            <use href="{{asset("bootstrap-icons.svg#calendar-month")}}" />
          </svg>&nbsp; Berdasarkan Bulan
        </a>
      </div>
    </div>
    @endif
  </div>
</div>
@endsection

@section('modals')
<!-- Modals:generateKwitansiModals -->
<div class="modal fade" id="generateKwitansiModals" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body mt-0 pt-0">
        <div class="d-flex justify-content-between align-items-center mt-4 mr-3">
          <h6>Generate Kwitansi</h6>
          <span class="area-title badge badge-info p-2"></span>
        </div>
        <hr class="w-100">
        <!-- Periode -->
        <div class="d-flex justify-content-between align-items-center">
          <div class="col-4 text-right">
            <h6>Periode : </h6>
          </div>
          <div class="col-8 flex-between">
            <!-- Tanggal Mulai -->
            <x-inputprepend title="Mulai" type="date" size="" id="start_inv_date" name="start_inv_date" value="{{now()}}" opsi="required" />
            <div class="mx-1"></div>
            <!-- Tanggal Akhir -->
            <x-inputprepend title="Akhir" type="date" id="end_inv_date" name="end_inv_date" size="" value="{{now()}}" opsi="required" />
          </div>
        </div>
        <!-- Jenis Pelanggan -->
        <div class="d-flex justify-content-between align-items-center mb-2">
          <div class="col-4 text-right">
            <h6>Jenis Pelanggan :</h6>
          </div>
          <div class="col-8">
            <select class="form-control form-control-sm RobotoFont" id="cust_type" name="cust_type">
              <option value="all">All</option>
              <option value="0">Retail</option>
              <option value="1">Corporate</option>
            </select>
          </div>
        </div>
        <!-- Pelanggan -->
        <div class="d-flex justify-content-between align-items-center mb-2">
          <div class="col-4 text-right">
            <h6>Pelanggan :</h6>
          </div>
          <div class="col-8">
            <select class="form-control form-control-sm RobotoFont" id="cust_id" name="cust_id">
              <option value="all">All</option>
            </select>
          </div>
        </div>
        <!-- Tampilkan Tagihan Lalu Switch -->
        <div class="d-flex justify-content-between align-items-center mb-2">
          <div class="col-4 text-right">
            <h6>Tampilkan Tagihan Lalu :</h6>
          </div>
          <div class="col-8">
            <div class="custom-control custom-switch">
              <input type="checkbox" data-onstyle="info" class="custom-control-input" id="tagihan_lalu_switch" name="tagihan_lalu_switch" checked>
              <label class="custom-control-label switch" for="tagihan_lalu_switch"></label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
          Close
        </button>
        <a href="" id="printPreview" class="btn btn-success btn-sm mr-2">
          Print Preview
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Modals:Tipe -->
<x-modals-with-table id="ModalsTipe" title="Pembayaran Sekaligus" modalSize="modal-sm">
  <div class="text-center">
    <div class="my-2">
      <a href="{{route('invoice.payment_all', 'lo')}}" class="btn btn-sm btn-success w270px py-2">
        <div class="row flex-center">
          <div class="col-2">
            <svg class="bi" width="32" height="32" fill="currentColor">
              <use href="{{asset("bootstrap-icons.svg#shop")}}" />
            </svg>
          </div>
          <div class="col-10 text-left">
            <span style="font-size: 1.2rem; line-height: 1.2rem;">Berdasarkan LO
            </span>
          </div>
        </div>
      </a>
    </div>
    <div class="my-2">
      <a href="{{route('invoice.payment_all', 'partner')}}" class="btn btn-sm btn-success w270px py-2">
        <div class="row flex-center">
          <div class="col-2">
            <svg class="bi" width="32" height="32" fill="currentColor">
              <use href="{{asset("bootstrap-icons.svg#exclude")}}" />
            </svg>
          </div>
          <div class="col-10 text-left">
            <span style="font-size: 1.2rem; line-height: 1.2rem;">Berdasarkan Partner
            </span>
          </div>
        </div>
      </a>
    </div>
    <div class="my-2">
      <a href="{{route('invoice.payment_all', 'area')}}" class="btn btn-sm btn-success w270px py-2">
        <div class="row flex-center">
          <div class="col-2">
            <svg class="bi" width="32" height="32" fill="currentColor">
              <use href="{{asset("bootstrap-icons.svg#geo-alt")}}" />
            </svg>
          </div>
          <div class="col-10 text-left">
            <span style="font-size: 1.2rem; line-height: 1.2rem;">Berdasarkan Area
            </span>
          </div>
        </div>
      </a>
    </div>
    <div class="my-2">
      <a href="{{route('invoice.payment_all', 'date')}}" class="btn btn-sm btn-success w270px py-2">
        <div class="row flex-center">
          <div class="col-2">
            <svg class="bi" width="32" height="32" fill="currentColor">
              <use href="{{asset("bootstrap-icons.svg#calendar-date")}}" />
            </svg>
          </div>
          <div class="col-10 text-left">
            <span style="font-size: 1.2rem; line-height: 1.2rem;">Berdasarkan Tanggal
            </span>
          </div>
        </div>
      </a>
    </div>
    <div class="my-2">
      <a href="{{route('invoice.payment_all', 'month')}}" class="btn btn-sm btn-success w270px py-2">
        <div class="row flex-center">
          <div class="col-2">
            <svg class="bi" width="32" height="32" fill="currentColor">
              <use href="{{asset("bootstrap-icons.svg#calendar-month")}}" />
            </svg>
          </div>
          <div class="col-10 text-left">
            <span style="font-size: 1.2rem; line-height: 1.2rem;">
              Berdasarkan Bulan
            </span>
          </div>
        </div>
      </a>
    </div>
  </div>
</x-modals-with-table>
@endsection

@section('scripts')

{!! $dataTable->scripts() !!}

<script>
  function format (d) {
    // `d` is the original data object for the row
      return `<table width="100%" class="table-child-detail">
        <tr>
            <td>No. Subscription</td>
            <td>:</td>
            <td>${d.subs_id ?? ''}</td>
        </tr>
        <tr>
            <td>LO</td>
            <td>:</td>
            <td>${d.lo_name ?? ''}</td>
        </tr>
        <tr>
            <td>Partner</td>
            <td>:</td>
            <td>${d.partner_name ?? ''}</td>
        </tr>
        <tr>
            <td>Created</td>
            <td>:</td>
            <td>${new Date(d.created_at)}, By: ${d.created_by}</td>            
        </tr>
        <tr>
            <td>Last Updated</td>
            <td>:</td>
            <td>${d.updated_at ? new Date(d.updated_at)+', By: '+d.updated_by : ''}</td>
        </tr>
      </table>`;
    }
  
  $(function() {
    var tblID = "#invoice-table"
    var table = $("#invoice-table").DataTable();
    
    $(tblID + " tbody").on("click", "td.details-control", function () {
      var tr = $(this).closest("tr");
      var row = table.row( tr );
      if ( row.child.isShown() ) {
        // This row is already open - close it
        row.child.hide();
        tr.removeClass("shown");
      }
      else {
          // Open this row
          row.child( format(row.data()) ).show();
          tr.addClass("shown");
      }
    });

    $("#generateKwitansi").on('click', function(){
      $("#cust_id").html("");
      $("#cust_id").append(`<option value="all">All</option>`)
      getCustomers("all");
    });

    $("#cust_type").on('change', function(){
      $("#cust_id").html("");
      $("#cust_id").append(`<option value="all">All</option>`)
      getCustomers($(this).val());
    });

    // click Print Preview
    $("#printPreview").on('click', function(e){
      e.preventDefault();
      let start_inv_date = $("#start_inv_date").val();
      let end_inv_date = $("#end_inv_date").val();
      let cust_type = $("#cust_type").val();
      let cust_id = $("#cust_id").val();
      let tagihan_lalu = $("#tagihan_lalu_switch").val();

      $(this).attr('href', `print/allkwitansi?start_inv_date=${start_inv_date}&end_inv_date=${end_inv_date}&cust_type=${cust_type}&cust_id=${cust_id}&tagihan_lalu=${tagihan_lalu}`);

      console.log($(this).attr('href'));

      popupCenter({url: $(this).attr('href'), title: 'kwitansi', w: 1150, h: 630});
    });

  });

  function getCustomers(cust_type) {
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  });
  $.ajax({
    url: "{{route('invoice.get_customers')}}",
    method: 'get',
    data: {
      cust_type: cust_type,
    },
    success: function(result){
        // console.log(result);
      if (result.length>0){
        result.forEach(element => {
          $("#cust_id").append(`<option value="${element.cust_id}">${element.cust_id} | ${element.cust_name}</option>`)
        });      
      } else {
        $("#cust_id").html("");
        $("#cust_id").append(`<option value="none">Tidak ada pelanggan</option>`)
      }
   
    },
    error: function (e) {
      console.log(e);
    }
  });
}

</script>

@endsection