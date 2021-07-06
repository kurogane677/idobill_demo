<div class="row mt-4 d-flex justify-content-center">
  <div class="col-6">

    <!-- Tanggal Pembayaran -->
    @if (Request::is('*edit*'))
    <x-inputprepend title="Tanggal Pembayaran" type="date" id="paid_date" name="paid_date" value="{{$invoice_payments->paid_date}}" opsi="required" />
    @else
    <x-inputprepend title="Tanggal Pembayaran" type="date" id="paid_date" name="paid_date" value="{{old('paid_date') ?? now()}}" opsi="required" />
    @endif

    <!-- NO INVOICE -->
    <input name="old_inv_no" value="{{$invoice->inv_no ?? null}}" hidden>
    <div class="row">
      <div class="col-10">
        <x-form-input title="Nomor Invoice" ipname="inv_no" value="{{$invoice->inv_no ?? ''}}" opsi="required readonly" />
      </div>
      <div class="col-2 text-right">
        <a href="/print/invoice/{{$invoice->inv_no}}" class="btn btn-sm btn-warning printForm">
          <svg class="bi" width="16" height="16" fill="currentColor">
            <use href="{{asset("bootstrap-icons.svg#printer")}}" />
          </svg> Print
        </a>
      </div>
    </div>

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
            {{\Carbon\Carbon::parse($invoice->inv_date)->format('d-m-Y')}}
          </td>
          <td id="exp_date" class="text-center">
            {{\Carbon\Carbon::parse($invoice->exp_date)->format('d-m-Y')}}
          </td>
          <td id="subs_products">
            @foreach ($invoice->subs_products as $item)
            <li style="list-style: none;">{{$item}}</li>
            @endforeach
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

    <div class="row">
      <div class="col-12 text-right">
        <button id="delete_krdb" type="button" class="btn btn-danger btn-sm">
          <svg class="bi" width="16" height="16" fill="currentColor">
            <use href="{{asset("bootstrap-icons.svg#eraser-fill")}}" />
          </svg>
        </button>
        <button id="tambah-krdb" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalsKrdb">
          <svg class="bi" width="16" height="16" fill="currentColor">
            <use href="{{asset("bootstrap-icons.svg#plus-circle-fill")}}" />
          </svg>&nbsp;Kredit/Debit
        </button>
      </div>
    </div>
    <hr class="w-100">

    <div class="krdb mb-5">
      @if ((Request::is('*edit*') && $invoice_payments->credit_id != null) || (Request::is('*payment*') && $credit_note != null))

      <!-- Tgl Kredit -->
      <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend field170px">
          <span class="input-group-text field170px">Tanggal Kredit</span>
        </div>
        <input type="date" id="credit_date" name="credit_date" class="form-control form-control-sm RobotoFont" value="{{$credit_note->credit_date}}" readonly>
      </div>

      <!-- Kredit Amount -->
      <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend field170px">
          <span class="input-group-text field170px">Kredit Note</span>
        </div>
        <input id="credit_amount" name="credit_amount" class="form-control form-control-sm RobotoFont money" value="{{number_format($invoice_payments->credit_amount ?? $credit_note->credit_amount, '2', ',','.')}}" required readonly>
      </div>

      <!-- Keterangan Tgl Kredit -->
      <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend field170px">
          <span class="input-group-text field170px">Keterangan</span>
        </div>
        <textarea class="form-control" id="credit_remark" name="credit_remark" rows="3" required readonly>{{$credit_remark ?? $credit_note->credit_remark}}</textarea>
      </div>

      @elseif ((Request::is('*edit*') && $invoice_payments->debit_id != null) || (Request::is('*payment*') && $debit_note != null))

      <!-- Tgl Debit -->
      <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend field170px">
          <span class="input-group-text field170px">Tanggal Debit</span>
        </div>
        <input type="date" id="debit_date" name="debit_date" class="form-control form-control-sm RobotoFont" value="{{$debit_note->debit_date}}">
      </div>

      <!-- Debit Amount -->
      <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend field170px">
          <span class="input-group-text field170px">Debit Note</span>
        </div>
        <input id="debit_amount" name="debit_amount" class="form-control form-control-sm RobotoFont money" value="{{number_format($invoice_payments->debit_amount ?? $debit_note->debit_amount, '2', ',','.')}}" required readonly>
      </div>

      <!-- Keterangan Debit Note -->
      <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend field170px">
          <span class="input-group-text field170px">Keterangan</span>
        </div>
        <textarea class="form-control" id="debit_remark" name="debit_remark" rows="3" required readonly>{{$debit_remark ?? $debit_note->debit_remark}}</textarea>
      </div>

      @endif
    </div>

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

<!-- Modals:KreditDebit -->
<div class="modal fade" id="ModalsKrdb" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-md modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body mt-0 pt-0">
        <div class="d-flex justify-content-between align-items-center mt-4 mr-3">
          <h6>Add Credit / Debit</h6>
          <span class="area-title badge badge-info p-2"></span>
        </div>
        <hr class="w-100">

        <!-- tipe -->
        <div class="input-group input-group-sm mb-2">
          <div class="input-group-prepend field170px">
            <span class="input-group-text field170px">Tipe</span>
          </div>
          <select class="form-control form-control-sm" id="mdls_tipe" name="mdls_tipe">
            <option value="kredit">Kredit</option>
            <option value="debit">Debit</option>
          </select>
        </div>

        <!-- paid_date -->
        <x-inputprepend title="Tanggal" type="date" id="mdls_date" name="mdls_date" value="{{old('mdls_date') ?? now()}}" />

        <!-- credit_amount -->
        <x-form-input title="Jumlah Kredit Note *" ipname="mdls_amount" value="{{old('mdls_amount') ?? '' }}" class="RobotoFont money" />

        <!-- credit_remark -->
        <div class="input-group input-group-sm mb-2">
          <div class="input-group-prepend field170px">
            <span class="input-group-text field170px">Keterangan *</span>
          </div>
          <textarea class="form-control" id="mdls_remark" name="mdls_remark" rows="3">{{old('mdls_remark')}}</textarea>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button id="simpanKrdb" type="button" class="btn btn-success btn-sm">Simpan</button>
      </div>
    </div>
  </div>
</div>

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
    
    function mdls_amount(){
    var mdls_amount = $("#mdls_amount").val()
                  .replace(',00', "")
                  .replace(/\D/g, "");
      return parseFloat(mdls_amount);
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

    $("#collect_fee, #late_fee, #credit_amount, #debit_amount, #mdls_amount").on("focusin", function() {
      $(this).select();
      $(this).data('val', $(this).val());
    });
    
    $("#collect_fee, #late_fee, #credit_amount, #debit_amount, #mdls_amount").on("focusout", function() {
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

    $("#delete_krdb").on('click', function(){
      $(".krdb").html('');
      $("#received_total").val($("#paid_total").val());
    });

    $("#simpanKrdb").on('click', function(){

      if ($("#mdls_amount").val() == '0')
      {
        alert('Jumlah kredit tidak boleh Rp.0');
        return false;
      }

      if ($("#mdls_remark").val() == '')
      {
        alert('Keterangan tidak boleh kosong!');
        return false;
      }

      let mdls_date = $("#mdls_date").val();
      let mdls_amount = $("#mdls_amount").val();
      let mdls_remark = $("#mdls_remark").val();

      let title_date = '';
      let title_amount = '';
      let id_date = '';
      let id_amount = '';
      let id_remark = '';

      if ($("#mdls_tipe").val()=='kredit')
      {
        title_date = 'Tanggal Kredit'
        title_amount = 'Kredit Note'
        id_date = 'credit_date';
        id_amount = 'credit_amount';
        id_remark = 'credit_remark';
      } else {
        title_date = 'Tanggal Debit'
        title_amount = 'Debit Note'
        id_date = 'debit_date';
        id_amount = 'debit_amount';
        id_remark = 'debit_remark';
      }

      $(".krdb").html('');
      $(".krdb").html(
        `
      <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend field170px">
          <span class="input-group-text field170px">${title_date}</span>
        </div>
        <input type="date" id="${id_date}" name="${id_date}" class="form-control form-control-sm RobotoFont" value="${mdls_date}" readonly>
      </div>
      
      <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend field170px">
          <span class="input-group-text field170px">${title_amount}</span>
        </div>
        <input id="${id_amount}" name="${id_amount}" class="form-control form-control-sm RobotoFont money" value="${mdls_amount}" required readonly>
      </div>

      <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend field170px">
          <span class="input-group-text field170px">Keterangan</span>
        </div>
        <textarea class="form-control" id="${id_remark}" name="${id_remark}" rows="3" required readonly>${mdls_remark}</textarea>
      </div>`
      )

      $("#krdb_date").val($("#mdls_paid_date").val());

      if ($("#mdls_tipe").val()=='kredit')
      {
        let received_total = paid_total() - credit_amount();
        $("#received_total").val(number_format(received_total,2,',','.'))
      } else {
        let received_total = paid_total() + debit_amount();
        $("#received_total").val(number_format(received_total,2,',','.'))
      }
      
      $("#ModalsKrdb").modal("toggle");
    });

    // Load pertama kali
    if ( $("#credit_amount").val() ) {
      let received_total = paid_total() - credit_amount();
        $("#received_total").val(number_format(received_total,2,',','.'))
    }else if ( $("#debit_amount").val() ) {
      let received_total = paid_total() + debit_amount();
        $("#received_total").val(number_format(received_total,2,',','.'))
    }
  
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