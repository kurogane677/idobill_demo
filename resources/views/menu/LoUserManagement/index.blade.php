@extends('menu.base_layout_menu')

@section('menu-header')
<h5 class="pt-2">LO User Management</h5>
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
  <form>
    @csrf
    {!! $dataTable->table() !!}
  </form>
</div>
@endsection

@section('menu-footer')
<div class="card-footer d-flex justify-content-end align-items-center">
  <a href="{{route('lo.index')}}" class="btn btn-sm btn-primary text-white">Daftar LO Group</a>
  <a href="{{route('lo_user.create', $group_id)}}" class="btn btn-sm btn-success text-white ml-2">+ Tambah User Baru</a>
</div>
@endsection

@section('scripts')
{!! $dataTable->scripts() !!}
<script>
  function format (d) {
  // `d` is the original data object for the row
    return `<table width="100%" class="table-child-detail">
      <tr>
          <td>Gender</td>
          <td style="width:3px;">:</td>
          <td>${d.gender}</td>
      </tr>
      <tr>
          <td>Alamat</td>
          <td style="width:3px;">:</td>
          <td>${d.alamat}</td>
      </tr>
      <tr>
          <td>Tgl Lahir</td>
          <td>:</td>
          <td>${dateFormat(d.tgl_lahir)}</td>
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
    var tblID = "#louser-table"
    var table = $("#louser-table").DataTable();
    
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

    $(tblID).on("click", ".imgZoom", function() {
      {
        var data = table.row( this ).data()["profile_img"]
        var filename = $(data).attr("src");

        $("#imgModallogo").modal("show");
        $("#previewImgModallogo").attr("src", filename);
      }
    });
  });
</script>
@endsection

@section('modals')
<!-- Image Modal -->
<div class="modal fade" id="imgModallogo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="text-center">
      <img style="width: 80%" src="{{$noImg}}" id="previewImgModallogo" onerror="this.onerror=null; this.src='{{$noImg}}'">
    </div>
  </div>
</div>
@endsection