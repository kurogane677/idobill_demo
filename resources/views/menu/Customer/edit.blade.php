@extends('layouts.edit_layout')
<!-- Content Section -->

@section('action')
action="{{ route("customer.update", $customer->cust_id) }}"
@endsection

@section('title')
Edit Data Pelanggan
@endsection

@section('idtitle')
ID
@endsection

@section('idvalue')
value="{{$customer->cust_id}}"
@endsection

@section('form')
@include($module->form)
<h5 class="text-dark mt-5 pl-3">Daftar Langganan</h5>
<hr>
<div class="col-12 pt-1 pb-2">
  {!! $dataTable->table(['class' => 'table table-striped']) !!}
</div>
@endsection

@section('footer')
<div class="card-footer d-flex justify-content-between align-items-center">
  <span>Tanda <sup class="text-danger">*</sup> wajib diisi</span>
  <div>
    <a href="{{url()->previous()}}" class="btn btn-dark btn-sm">
      Cancel
    </a>
    <button id="submitEditCustomer" type="submit" class="btn btn-info btn-sm ml-2">
      Simpan Perubahan
    </button>
  </div>
</div>
@endsection

@section('scripts')

{!! $dataTable->scripts() !!}
{{-- ${res[0].prod_id} --}}
<script>
  $("#submitEditCustomer").on('click', function(){
    // jika masih ada input yang error/invalid
    if ($('input.is-invalid').length > 0) {
      alert('Masih ada input yang tidak valid, mohon untuk diperbaiki sebelum menyimpan data!');
      return false;
    } else {
      $("#ModalsLoading").modal("toggle");
    }
  });

  function format (d) {
    // `d` is the original data object for the row

      return `<table class="table table-striped table-dark" style="padding-left:50px;">
        <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td>${d.subs_remark ?? ''}</td>            
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
    var tblID = "#produklangganan-table"
    var table = $("#produklangganan-table").DataTable();

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