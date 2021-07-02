@extends('menu.base_layout_menu')

@section('menu-header')
<h5 class="pt-2">Daftar {{$module->section}}</h5>
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
<div class="card-footer d-flex justify-content-between align-items-center">
  <span>
    *Link => Area yang terhubung dengan pelanggan, LO, atau partner. Hanya 0 link yang dapat dihapus!
  </span>
  <a href="{{route(strtolower($module->section).".create")}}" class="btn btn-sm btn-success text-white">
    + Tambah {{$module->section}} Baru
  </a>
</div>
@endsection

@section('scripts')
{!! $dataTable->scripts() !!}
<script>
  function format (d) {
    // `d` is the original data object for the row
      return `<table width="100%" class="table-child-detail"> 
        <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td>${d.area_remark ?? ''}</td>            
        </tr>
        <tr>
            <td>Created</td>
            <td>:</td>
            <td>${Date(d.created_at)}, By: ${d.created_by}</td>            
        </tr>
        <tr>
            <td>Last Updated</td>
            <td>:</td>
            <td>${d.updated_at ? Date(d.updated_at)+', By: '+d.updated_by : ''}</td>
        </tr>
      </table>`;
    }
  
  $(function() {
    var tblID = "#area-table"
    var table = $("#area-table").DataTable();
    
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