<div class="row mt-4 d-flex justify-content-center">
  <div class="col-6">

    <!-- Tanggal Debit -->
    @if (Request::is('*/edit'))
    <x-inputprepend title="Tanggal Debit" type="date" id="debit_date" name="debit_date" value="{{$debit_notes->debit_date}}" opsi="required" />
    @else
    <x-inputprepend title="Tanggal Debit" type="date" id="debit_date" name="debit_date" value="{{old('debit_date') ?? now()}}" opsi="required" />
    @endif

    <!-- NO INVOICE -->
    <div class="row">
      <div class="col-9">
        @if (Request::is('*/edit'))
        <x-form-input title="Nomor Invoice" ipname="inv_no" value="{{$debit_notes->inv_no ?? ''}}" opsi="required readonly" />
        @else
        <x-form-input title="Nomor Invoice" ipname="inv_no" value="" opsi="required readonly" />
        @endif
      </div>
      <div class="col-3 text-right">
        <button id="delete_inv" type="button" class="btn btn-danger btn-sm">
          <svg class="bi" width="16" height="16" fill="currentColor">
            <use href="{{asset("bootstrap-icons.svg#eraser-fill")}}" />
          </svg>
        </button>
        <x-buttonsearch target="#InvoiceModal" title="Cari" />
      </div>
    </div>

    <!-- Pelanggan -->
    @if (Request::is('*/edit'))
    <input id="cust_id" name="cust_id" value="{{$debit_notes->cust_id}}" hidden>
    <x-form-input title="Pelanggan" ipname="cust_name" value="{{$debit_notes->cust_id . ' - ' .$debit_notes->cust_name}}" opsi="required readonly" />
    @else
    <input id="cust_id" name="cust_id" value="" hidden>
    <x-form-input title="Pelanggan" ipname="cust_name" value="" opsi="required readonly" />
    @endif

    <div class="mb-3"></div>
    <!-- TABLE -->
    <table id="inv_detail" class="table dataTable">
      <thead>
        <tr class="text-center">
          <th>Tgl Invoice</th>
          <th>Jth Tempo</th>
          <th>Produk</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td id="inv_date" class="text-center">
            @if (Request::is('*/edit'))
            {{\Carbon\Carbon::parse($debit_notes->inv_date)->format('d-m-Y')}}
            @endif
          </td>
          <td id="exp_date" class="text-center">
            @if (Request::is('*/edit'))
            {{\Carbon\Carbon::parse($debit_notes->exp_date)->format('d-m-Y')}}
            @endif
          </td>
          <td id="subs_products">
            @if (Request::is('*/edit'))
            @foreach ($debit_notes->subs_products as $item)
            <li style="list-style: none;">{{$item}}</li>
            @endforeach
            @endif
          </td>
        </tr>
      </tbody>
    </table>

    <!-- TOTAL HARUS DIBAYAR -->
    <div class="input-group input-group-sm mb-2">
      <input type="text" id="paid_total_text" class="form-control form-control-sm font-weight-bold RobotoFont text-right bg-dark text-white" value="TOTAL TAGIHAN " disabled readonly>
      <input type="text" id="paid_total" name="paid_total" class="form-control form-control-sm font-weight-bold RobotoFont text-right" required readonly style="max-width: 150px;" @if (Request::is('*/edit')) value="{{number_format($debit_notes->grand_total, '2', ',','.')}}" @else value="" @endif>
    </div>

    <div class="mt-3"></div>

    <!-- JUMLAH Debit NOTE -->
    @if (Request::is('*/edit'))
    <x-form-input title="Jumlah Debit Note *" ipname="debit_amount" value="{{number_format($debit_notes->debit_amount, '2', ',','.')}}" class="RobotoFont money" opsi="required" />
    @else
    <x-form-input title="Jumlah Debit Note *" ipname="debit_amount" value="{{old('debit_amount') ?? '' }}" class="RobotoFont money" opsi="required" />
    @endif

    <!-- DIBAYAR OLEH -->
    @if (Request::is('*/edit'))
    <x-form-input title="Dibayar Oleh" ipname="paid_by" value="{{$debit_notes->paid_by}}" opsi="required" />
    @else
    <x-form-input title="Dibayar Oleh" ipname="paid_by" value="{{old('paid_by') ?? ''}}" opsi="required" />
    @endif

    <!-- REMARK -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">Remark *</span>
      </div>
      @if (Request::is('*/edit'))
      <textarea class="form-control" id="debit_remark" name="debit_remark" rows="3" required>{{ $debit_notes->debit_remark ?? old('debit_remark') }}</textarea>
      @else
      <textarea class="form-control" id="debit_remark" name="debit_remark" rows="3" required>{{old('debit_remark')}}</textarea>
      @endif
    </div>

    @if (Request::is('*/edit') && $updated_by != '')
    <footer class="blockquote-footer text-right">
      <small class="text-muted">
        terakhir diedit: <cite title="Source Title">
          {{ Carbon\Carbon::parse($debit_notes->updated_at)->format('d M Y H:i:s') }}
          oleh
          {{$updated_by}}
        </cite>
      </small>
    </footer>
    @endif

  </div>
</div>

<!-- Modals:InvoiceModal -->
<div class="modal fade" id="InvoiceModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body mt-0 pt-0">
        <div class="d-flex justify-content-between align-items-center mt-4 mr-3">
          <h6>Pilih Invoice</h6>
          <span class="area-title badge badge-info p-2"></span>
        </div>
        <hr class="w-100">
        {{ $dataTable->table(['class' => 'table table-striped']) }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

{{ $dataTable->scripts() }}

<script>
  $(function() {

    $("#delete_inv").on('click', function(){
      // clear table
      $("#inv_date").text('');
      $("#exp_date").text('');
      $("#subs_products").text('');
      $("#paid_total").val('');

      $("#inv_no").val('');
      $("#cust_id").val('');
      $("#cust_name").val('');      
      $("#debit_amount").val('');
      $("#paid_by").val('');
      $("#debit_remark").val('');
    });

    var tblID = "#invoiceunpaid-table"
    var table = $("#invoiceunpaid-table").DataTable();  
    
    $(tblID + " tbody").on("click", "tr", function () {
      let tr = $(this).closest("tr");
      let row = table.row( tr );
      
      $("#inv_no").val(row.data().inv_no);
      $("#cust_id").val(row.data().cust_id);
      $("#cust_name").val(row.data().cust_id + ' - ' + row.data().cust_name);
      $("#paid_by").val(row.data().cust_name);

      // fill table
      $("#inv_date").text(row.data().inv_date);
      $("#exp_date").text(row.data().exp_date);
      $("#subs_products").text(row.data().subs_products);
      $("#paid_total").val(row.data().grand_total);

      $("#InvoiceModal").modal("toggle");
    });

    
    $("#debit_amount").on("focusin", function() {
      $(this).select();
      $(this).data('val', $(this).val());
    });
    
    $("#debit_amount").on("focusout", function() {
      let prev = $(this).data('val');
        if ($(this).val() == "") {
          $(this).val(0);
        } else if ($(this).val() !== prev) {
          if ($(this).val() == 0) {
            $(this).val(0);            
          }else {
            $(this).val(number_format($(this).val(),2,',','.'));
          }
        }
    });

  });

</script>