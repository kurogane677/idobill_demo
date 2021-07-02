<div class="row mt-4 d-flex justify-content-center">
  <div class="col-6">

    <!-- Tanggal Pembayaran -->
    @if (Request::is('*edit*'))
    <x-inputprepend title="Tanggal Pembayaran" type="date" id="paid_date" name="paid_date" value="{{$invoice_payments->paid_date}}" opsi="required" />
    @else
    <x-inputprepend title="Tanggal Pembayaran" type="date" id="paid_date" name="paid_date" value="{{old('paid_date') ?? now()}}" opsi="required" />
    @endif

    <!-- NO INVOICE -->
    @if (Request::is('*payment*'))
    <x-form-input title="Nomor Invoice" ipname="inv_no" value="{{$invoice->inv_no ?? ''}}" opsi="required readonly" />
    @else
    <input name="old_inv_no" value="{{$invoice->inv_no ?? null}}" hidden>
    <div class="row">
      <div class="col-12">
        <x-form-input title="Nomor Invoice" ipname="inv_no" value="{{$invoice->inv_no}}" opsi="required readonly" />
      </div>
      {{-- <div class="col-2 text-right">
        <x-buttonsearch target="#InvoiceModal" title="Cari" />
      </div> --}}
    </div>
    @endif

    <!-- Pelanggan -->
    @if (Request::is('*payment*'))
    <input id="cust_id" name="cust_id" value="{{$invoice->cust_id}}" hidden>
    <x-form-input title="Pelanggan" ipname="cust_name" value="{{$invoice->cust_id . ' - ' .$invoice->cust_name}}" opsi="required readonly" />
    @else
    <input id="old_cust_id" name="old_cust_id" value="{{$customer->cust_id ?? null}}" hidden>
    <input id="cust_id" name="cust_id" value="{{$customer->cust_id}}" hidden>
    <x-form-input title="Pelanggan" ipname="cust_name" value="{{$customer->cust_id}} - {{$customer->cust_name}}" opsi="required readonly" />
    @endif

    <div class="mb-3"></div>
    <!-- TABLE -->
    <table class="table dataTable">
      <thead>
        <tr class="text-center">
          <th>Tgl Invoice</th>
          <th>Jth Tempo</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-center">
          <td id="inv_date">
            {{\Carbon\Carbon::parse($invoice->inv_date)->format('d-m-Y')}}
          </td>
          <td id="exp_date">
            {{\Carbon\Carbon::parse($invoice->exp_date)->format('d-m-Y')}}
          </td>
          <td>
            <a href="/print/invoice/{{$invoice->inv_no}}" class="btn btn-sm btn-warning p-0 px-2 printForm">
              Print
            </a>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- SUB TOTAL -->
    <div class="input-group input-group-sm">
      <input type="text" id="sub_total_text" class="form-control form-control-sm font-weight-bold RobotoFont text-right bg-dark text-white" value="SUB TOTAL " disabled readonly>
      <input type="text" id="sub_total" name="sub_total" class="form-control form-control-sm font-weight-bold RobotoFont text-right money" required readonly value="{{number_format($invoice->grand_total, '2', ',','.')}}" style="max-width: 150px;">
    </div>

    <!-- BIAYA COLLECT -->
    <div class="input-group input-group-sm">
      <input type="text" id="collect_fee_text" class="form-control form-control-sm font-weight-bold RobotoFont text-right bg-dark text-white" value="BIAYA COLLECT * " disabled readonly>
      <input type="text" id="collect_fee" name="collect_fee" class="form-control form-control-sm font-weight-bold RobotoFont text-right money" required style="max-width: 150px;" @if (Request::is('*edit*')) value="{{number_format($invoice_payments->collect_fee,2,',','.')}}" @else value="{{ old('collect_fee') ?? "0" }}" @endif>
    </div>

    <!-- BIAYA TERLAMBAT -->
    <div class="input-group input-group-sm mb-2">
      <input type="text" id="late_fee_text" class="form-control form-control-sm font-weight-bold RobotoFont text-right bg-dark text-white" value="BIAYA TERLAMBAT * " disabled readonly>
      <input type="text" id="late_fee" name="late_fee" class="form-control form-control-sm font-weight-bold RobotoFont text-right money" required style="max-width: 150px;" @if (Request::is('*edit*')) value="{{number_format($invoice_payments->late_fee,2,',','.')}}" @else value="{{ old('late_fee') ?? "0" }}" @endif>
    </div>

    <!-- TOTAL HARUS DIBAYAR -->
    <div class="input-group input-group-sm mb-2">
      <input type="text" id="paid_total_text" class="form-control form-control-sm font-weight-bold RobotoFont text-right bg-dark text-white" value="TOTAL HARUS DIBAYAR " disabled readonly>
      <input type="text" id="paid_total" name="paid_total" class="form-control form-control-sm font-weight-bold RobotoFont text-right" required readonly style="max-width: 150px;" @if (Request::is('*edit*')) value="{{number_format($invoice_payments->paid_total, '2', ',','.')}}" @else value="{{number_format($invoice->grand_total, '2', ',','.')}}" @endif>
    </div>

    <div class="mt-3"></div>

    @if (Request::is('*edit*') && $invoice_payments->credit_id != null)
    <!-- KREDIT NOTE -->
    <x-form-input title="Kredit Note *" ipname="credit_amount" value="{{number_format($invoice_payments->credit_amount, '2', ',','.')}}" class="RobotoFont money" opsi="required" />

    <!-- Keterangan Kredit Note -->
    <div class="div_credit_amount_paid_remark">
      <x-form-input title="Keterangan Kredit Note *" ipname="credit_remark" value="{{$credit_remark}}" opsi="required" />
    </div>

    @else
    <!-- KREDIT NOTE -->
    <x-form-input title="Kredit Note *" ipname="credit_amount" value="{{old('credit_amount') ?? 0 }}" class="RobotoFont money" opsi="required" />

    <!-- Keterangan Kredit Note -->
    <div class="div_credit_amount_paid_remark" hidden>
      <x-form-input title="Keterangan Kredit Note *" ipname="credit_remark" value="{{old('credit_remark')}}" />
    </div>
    @endif

    @if (Request::is('*edit*') && $invoice_payments->debit_id != null)
    <!-- DEBIT NOTE -->
    <x-form-input title="Debit Note *" ipname="debit_amount" value="{{number_format($invoice_payments->debit_amount, '2', ',','.')}}" class="RobotoFont money" opsi="required" />

    <!-- Keterangan Debit Note -->
    <div class="div_debit_amount_paid_remark">
      <x-form-input title="Keterangan Debit Note *" ipname="debit_remark" value="{{$debit_remark}}" opsi="required" />
    </div>

    @else
    <!-- DEBIT NOTE -->
    <x-form-input title="Debit Note *" ipname="debit_amount" value="{{old('debit_amount') ?? 0 }}" class="RobotoFont money" opsi="required" />

    <!-- Keterangan Debit Note -->
    <div class="div_debit_amount_paid_remark" hidden>
      <x-form-input title="Keterangan Debit Note *" ipname="debit_remark" value="{{old('debit_remark')}}" />
    </div>
    @endif

    <!-- TOTAL TERIMA -->
    @if (Request::is('*edit*'))
    <x-form-input title="Total Terima" ipname="received_total" value="{{number_format($invoice_payments->received_total, '2', ',','.')}}" class="RobotoFont" opsi="required readonly" />
    @else
    <x-form-input title="Total Terima" ipname="received_total" value="{{number_format($invoice->grand_total, '2', ',','.')}}" class="RobotoFont" opsi="required readonly" />
    @endif

    <!-- Remark -->
    @if (Request::is('*edit*'))
    <x-form-input title="Remark" ipname="paid_remark" value="{{$invoice_payments->paid_remark}}" />
    @else
    <x-form-input title="Remark" ipname="paid_remark" value="{{old('paid_remark')}}" />
    @endif

    <!-- DIBAYAR OLEH -->
    @if (Request::is('*edit*'))
    <x-form-input title="Dibayar Oleh" ipname="paid_by" value="{{$invoice_payments->paid_by}}" opsi="required" />
    @else
    <x-form-input title="Dibayar Oleh" ipname="paid_by" value="{{$invoice->cust_name}}" opsi="required" />
    @endif

    <!-- COLLECTOR -->
    <div class="input-group input-group-sm mb-2">
      <div class="input-group-prepend field170px">
        <span class="input-group-text field170px">Collector</span>
      </div>
      <select class="form-control form-control-sm" id="collector_id" name="collector_id">
        @foreach ($collectors as $user_id => $user_name)
        @if (Request::is('*/edit'))
        <option value="{{$user_id}}" {{ ( $user_id == $invoice_payments->collector_id) ? 'selected' : '' }}>
          {{$user_id}} - {{$user_name}}
        </option>
        @else
        <option value="{{$user_id}}">
          {{$user_id}} - {{$user_name}}
        </option>
        @endif
        @endforeach
      </select>
    </div>

    <!-- Generate Invoice Untuk Bulan Selanjutnya -->
    {{-- <div class="custom-control custom-switch mt-3">
      <input type="checkbox" class="custom-control-input" id="generate_next_inv" name="generate_next_inv" checked>
      <label class="custom-control-label pt-1" for="generate_next_inv">Generate Invoice Untuk Bulan Selanjutnya</label>
    </div> --}}

    @if (Request::is('*edit*') && $updated_by != '')
    <footer class="blockquote-footer text-right">
      <small class="text-muted">
        terakhir diedit: <cite title="Source Title">
          {{ Carbon\Carbon::parse($invoice_payments->updated_at)->format('d M Y H:i:s') }}
          oleh
          {{$updated_by}}
        </cite>
      </small>
    </footer>
    @endif

  </div>
</div>

<!-- Modals:InvoiceModal -->
<x-modals-with-table id="InvoiceModal" title="Pilih Invoice" modalSize="modal-xl" modalPosition="">
  {{ $dataTable->table(['class' => 'table table-striped']) }}
</x-modals-with-table>

{{ $dataTable->scripts() }}

<script>
  $(function(){
    $('.printForm').on('click', function(e){
      popupCenter({url: $(this).attr('href'), title: 'invoice', w: 1150, h: 630});
      e.preventDefault()
    });
  });
</script>

<script>
  function format (d) {
    // `d` is the original data object for the row
      return `<table class="table table-striped table-dark">
        <tr>
            <td>Tipe Invoice</td>
            <td>:</td>
            <td>${d.type_name}</td>
        </tr>
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
  

  });

</script>

<script>
  $(function() {

    function sub_total(){
    var sub_total = $("#sub_total").val()
                  .replace(',00', "")
                  .replace(/\D/g, "");
      return parseFloat(sub_total);
    }

    function collect_fee(){
    var collect_fee = $("#collect_fee").val()
                  .replace(',00', "")
                  .replace(/\D/g, "");
      return parseFloat(collect_fee);
    }

    function late_fee(){
    var late_fee = $("#late_fee").val()
                  .replace(',00', "")
                  .replace(/\D/g, "");
      return parseFloat(late_fee);
    }

    function paid_total(){
    var paid_total = $("#paid_total").val()
                  .replace(',00', "")
                  .replace(/\D/g, "");
      return parseFloat(paid_total);
    }

    function credit_amount(){
    var credit_amount = $("#credit_amount").val()
                  .replace(',00', "")
                  .replace(/\D/g, "");
      return parseFloat(credit_amount);
    }

    function debit_amount(){
    var debit_amount = $("#debit_amount").val()
                  .replace(',00', "")
                  .replace(/\D/g, "");
      return parseFloat(debit_amount);
    }

    $("#collect_fee, #late_fee").on("input", function() {
      let to_paid_total = sub_total() + collect_fee() + late_fee();
        $("#paid_total").val(number_format(to_paid_total,2,',','.'))
      let received_total = paid_total() - credit_amount() + debit_amount();
        $("#received_total").val(number_format(received_total,2,',','.'))
    });
        
    $("#debit_amount, #credit_amount").on("input", function() {
      let received_total = paid_total() - credit_amount() + debit_amount();
        $("#received_total").val(number_format(received_total,2,',','.'))
    });

    $("#collect_fee, #late_fee, #credit_amount, #debit_amount").on("focusin", function() {
      $(this).select();
      $(this).data('val', $(this).val());
    });
    
    $("#collect_fee, #late_fee, #credit_amount, #debit_amount").on("focusout", function() {
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

    $("#sub_total").on('update', function(){
        console.log("jajajaj");
    });
    
    $("#credit_amount").on("change", function() {
      if ($(this).val() != 0)
      {
        $(".div_credit_amount_paid_remark").removeAttr('hidden');
        $(".div_credit_amount_paid_remark input").attr('required', true);
        // remove debit
        $("#debit_amount").val(0);
        $(".div_debit_amount_paid_remark").attr('hidden', true);        
        $(".div_debit_amount_paid_remark input").removeAttr('required');
      } else {
        $(".div_credit_amount_paid_remark").attr('hidden', true);        
        $(".div_credit_amount_paid_remark input").removeAttr('required');
      }
    });
    
    $("#debit_amount").on("change", function() {
      if ($(this).val() != 0)
      {
        $(".div_debit_amount_paid_remark").removeAttr('hidden');
        $(".div_debit_amount_paid_remark input").attr('required', true);
        // remove credit
        $("#credit_amount").val(0);
        $(".div_credit_amount_paid_remark").attr('hidden', true);        
        $(".div_credit_amount_paid_remark input").removeAttr('required');
      } else {
        $(".div_debit_amount_paid_remark").attr('hidden', true);        
        $(".div_debit_amount_paid_remark input").removeAttr('required');
      }
    });

    var tblID = "#selectinvoicetopay-table"
    var table = $("#selectinvoicetopay-table").DataTable();
    
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
    
    $(tblID + " tbody").on("click", "tr", function () {
      let tr = $(this).closest("tr");
      let row = table.row( tr );
      $("#inv_date").text(row.data().inv_date);
      $("#exp_date").text(row.data().exp_date);
      $("#inv_no").val(row.data().inv_no);
      $("#cust_id").val(row.data().cust_id);
      $("#cust_name").val(row.data().cust_name);
      $("#sub_total").val(row.data().grand_total);

      let to_paid_total = sub_total() + collect_fee() + late_fee();
        $("#paid_total").val(number_format(to_paid_total,2,',','.'))
      let received_total = paid_total() - credit_amount() + debit_amount();
        $("#received_total").val(number_format(received_total,2,',','.'))

      $("#InvoiceModal").modal("toggle");
    });

  });

</script>