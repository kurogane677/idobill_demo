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
  {!! $dataTable->table(['class' => 'table table-stripedx']) !!}
</div>
@endsection

@section('menu-footer')
<div class="card-footer d-flex justify-content-between align-items-center">
  <span>Untuk upgrade/downgrade langganan pastikan semua invoice untuk nomor langganan tersebut telah dibayar.</span>
  <a href="{{route('subscription.create')}}" class="btn btn-sm btn-success">
    + Tambah Langganan Baru
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
    var tblID = "#subscription-table"
    var table = $("#subscription-table").DataTable();
    
    $(tblID + " tbody").on("click", "td.details-control", function () {
      let tr = $(this).closest("tr");
      let row = table.row( tr );
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

    $(tblID + " tbody").on("click", ".updown-subs", function (e) {
      e.preventDefault();
      let tr = $(this).closest("tr");
      let row = table.row( tr );
      let subs_id = row.data().subs_id;

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
        });
      $.ajax({
        url: `subscription/${subs_id}/checkUnpaid`,
        method: 'get',
        data: {
          subs_id: subs_id,
        },
        success: function(result){
          res = parseInt(result);
          if (res>0)
          {
            if (confirm('Masih ada tagihan yang belum dibayarkan untuk langganan ini. \nInvoice yang belum dibayarkan tersebut akan dihapus!.'))
            {
              location.href = `subscription/${subs_id}/updown`;
            }
          }          
        },
        error: function (e) {
          console.log(e);
        }
      });

    });

    

  });

</script>

@endsection