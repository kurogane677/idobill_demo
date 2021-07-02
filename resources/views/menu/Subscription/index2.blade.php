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
<div class="card-footer d-flex justify-content-end align-items-center">
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
      return `<table class="table table-striped table-dark" style="padding-left:50px;">
        <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td>${d.subs_remark ?? ''}</td>
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
    var tblID = "#subscription-table"
    var table = $("#subscription-table").DataTable();
    
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

    $(tblID + " tbody").on("click", ".show-form", function () {
      var tr = $(this).closest("tr");
      var row = table.row( tr );
      details(row.data());

      if (row.data().cust_type == 0)
      {
        $('#ModalsKwitansi').modal('show');
      } else {
        $('#ModalsInvoice').modal('show');
      }

    });

  });

  function details(d) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    $.ajax({
      url: "{{ route('subscription.modalPDF') }}",
      method: 'get',
      data: {
        id: d.subs_id,
      },
      success: function(result){
      let res = JSON.parse(result);
      // console.log(res);
      let subs_total = numeral(res.subscription.subs_total).format("0,0");
      
        $(".title").val(res.customer.cust_type == 0 ? 'Form Kwitansi' : 'Form Invoice');
        $(".printBtn").text(res.customer.cust_type == 0 ? 'Print Kwitansi' : 'Print Invoice');
        
        $(".cust_id").val(res.customer.cust_id);
        $(".inv_no").val('INV/' + res.invoice.inv_no.substring(4));
        $(".cust_name").val(res.customer.cust_name);
        $(".alamat").val(res.user.alamat);
        $(".subs_total").val(number_format(subs_total.split(",").join(""), 2, ',', '.'));
        $(".subs_id").val(res.subscription.subs_id);
        $(".exp_date").val(format_date(res.invoice.exp_date,'d-m-Y'));
        $(".subs_date").val(format_date(res.subscription.subs_date,'MY'));
        
        $(".subs_date_invoiceform").val(format_date(res.subscription.subs_date,'d-m-Y'));
        $(".exp_date_invoiceform").val(format_date(res.invoice.exp_date,'d-m-Y'));
        $(".no_hp").val(res.customer.nohp_code+res.customer.no_hp);

        // Untuk Table Product
        if (res.products && (res.customer.cust_type == 0))
        {
          // Untuk Kwitansi
          let li_prod = '';
          let li_prod_price = '';
          for (let i = 0; i < res.products.length; i++) {
            li_prod += `<li>`
            li_prod += `<input name="prod_dtl[]" class="input-pdf input-resize" value="${res.products[i].prod_id} | ${res.products[i].prod_desc}" readonly \>`
            li_prod += `</li>`

            let price = numeral(res.products[i].prod_price).format("0,0");
            price = number_format(price.split(",").join(""), 2, ',', '.');

            li_prod_price += '<li>'
            li_prod_price += `<input name="prod_prices[]" class="input-pdf text-right" value="${price}" readonly \>`
            li_prod_price += '</li>'
          }
          $(".products").html(li_prod);
          $(".product_price").html(li_prod_price);

        } else if (res.products && (res.customer.cust_type == 1)) {
          // Untuk Invoice
          let tr_prod = '';
          tr_prod += `
              <tr>
                <td colspan="6" class="text-center">IURAN TETAP BULANAN</td>
              </tr>`
          for (let i = 0; i < res.products.length; i++) {
            let prod_price = number_format(res.products[i].prod_price,2,',','.');
            let prod_total = number_format(res.products[i].prod_price,2,',','.');
            tr_prod += `
            <tr>
              <td class="text-center p-0">
                <input name="prod_number[]" class="input-pdf w30px text-center" value="${i+1}" readonly \>
              </td>
              <td>
                <input name="prod_desc[]" class="input-pdf w535px" value="${res.products[i].prod_id} - ${res.products[i].prod_desc}" readonly \>
              </td>
              <td class="text-center p-0">
                <input name="prod_qty[]" class="input-pdf w75px text-center" value="1" readonly \>
              </td>
              <td class="text-center p-0">
                <input name="prod_uom[]" class="input-pdf w75px text-center" value="${res.products[i].prod_uom}" readonly \>
              </td>
              <td class="text-right p-0">
                <input name="prod_price[]" class="input-pdf w115px text-right" value="${prod_price}" readonly \>
              </td>
              <td class="text-right p-0">
                <input name="prod_total[]" class="input-pdf w150px text-right" value="${prod_total}" readonly \>  
              </td>
            </tr>`
          }
          $(".products").html(tr_prod);          
        } else {
          $(".products").html('');
          $(".product_price").html('');
        }
 
        // Untuk Table Biaya
        if (res.biaya && (res.customer.cust_type == 0))
        {
          // Untuk Kwitansi
          let li_biaya = '';
          let li_biaya_price = '';
          for (let i = 0; i < res.biaya.length; i++) {     
            li_biaya += `<li>`
            li_biaya += `<input name="biaya_dtl[]" class="input-pdf input-resize" value="${res.biaya[i].biaya_id} | ${res.biaya[i].biaya_name}" readonly \>`
            li_biaya += `</li>`

            let price = numeral(res.biaya[i].biaya_price).format("0,0");
            price = number_format(price.split(",").join(""), 2, ',', '.');

            li_biaya_price += '<li>'
            li_biaya_price += `<input name="biaya_prices[]" class="input-pdf text-right" value="${price}" readonly \>`
            li_biaya_price += '</li>'
          }
          $(".biaya").html(li_biaya);
          $(".biaya_price").html(li_biaya_price);
        } else if (res.biaya && (res.customer.cust_type == 1)){
          // Untuk Invoice
          let tr_biaya = '';
          tr_biaya += `
              <tr>
                <td colspan="6" class="text-center">BIAYA REGISTRASI</td>
              </tr>`
          for (let i = 0; i < res.biaya.length; i++) {
            let biaya_price = number_format(res.biaya[i].biaya_price,2,',','.')
            let biaya_total = number_format(res.biaya[i].biaya_price,2,',','.')
            
            tr_biaya += `
            <tr>
              <td class="text-center p-0">
                <input name="biaya_number[]" class="input-pdf w30px text-center" value="${i+1}" readonly \>
              </td>
              <td>
                <input name="biaya_name[]" class="input-pdf w535px" value="${res.biaya[i].biaya_id} - ${res.biaya[i].biaya_name}" readonly \>
              </td>
              <td class="text-center p-0">
                <input name="biaya_qty[]" class="input-pdf w75px text-center" value="1" readonly \>
              </td>
              <td class="text-center p-0">
                <input name="biaya_uom[]" class="input-pdf w75px text-center" value="${res.biaya[i].biaya_uom}" readonly \>
              </td>
              <td class="text-right p-0">
                <input name="biaya_price[]" class="input-pdf w115px text-right" value="${biaya_price}" readonly \>
              </td>
              <td class="text-right p-0">
                <input name="biaya_total[]" class="input-pdf w150px text-right" value="${biaya_total}" readonly \>  
              </td>
            </tr>`            
          }
          $(".biaya").html(tr_biaya);
        } else {
          $(".biaya").html('');
          $(".biaya_price").html('');
        }

      },
      error: function (e) {
      console.log(e);
      }
    });

  }
</script>

@if (session()->has('cust_type'))
@if(Session::get('cust_type')==0)
<script>
  $(function() {
    $('#ModalsKwitansi').modal('show');
  });
</script>
@else
<script>
  $(function() {
    $('#ModalsInvoice').modal('show');
  });
</script>
@endif
@endif

@endsection

@section('modals')

@include('menu.Subscription.modal-form-kwitansi')
@include('menu.Subscription.modal-form-invoice')

@endsection