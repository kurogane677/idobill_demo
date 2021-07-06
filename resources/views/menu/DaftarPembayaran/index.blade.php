@extends('menu.base_layout_menu')

@section('page-title')
&nbsp;- Daftar Pembayaran
@endsection

@section('top-area')
<div class="row">
  <div class="col-12 flex-between">
    <div class="col-6">
    </div>
    <div class="col-6 text-right">
      <a href="{{route("invoice.index")}}" class="btn btn-sm btn-primary">
        Daftar Tagihan
      </a>
    </div>
  </div>
</div>
@endsection

@section('menu-header')
@if ($profiles->type == "CUS")
<h5 class="pt-2">Daftar Pembayaran</h5>
@else
<h5 class="pt-2">Daftar Pembayaran Pelanggan</h5>
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
  {!! $dataTable->table(['class' => 'table table-striped']) !!}
</div>
@endsection

@section('menu-footer')
<div class="card-footer d-flex justify-content-end align-items-center">

</div>
@endsection

@section('modals')

@endsection

@section('scripts')
{!! $dataTable->scripts() !!}

@if (session()->has('inv_no'))
<script>
  popupCenter({url: "{{route('print.kwitansi', Session::get('inv_no'))}}", title: 'kwitansi', w: 1150, h: 630});
</script>
@endif

<script>
  function format (d) {
    // `d` is the original data object for the row
      return `<table width="100%" class="table-child-detail">  
        <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td>${d.paid_remark ?? ''}</td>            
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
    var tblID = "#daftarpembayaranTable"
    var table = $("#daftarpembayaranTable").DataTable();
    
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
  });
</script>
@endsection