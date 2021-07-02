<div class="row mt-4 d-flex justify-content-center">
  <div class="col-6">

    <!-- Tanggal Pembayaran -->
    <x-inputprepend title="Tanggal Pembayaran" type="date" id="tgl_bayar" name="tgl_bayar" value="{{old('tgl_bayar') ?? now()}}" opsi="required" />

    <!-- NO INVOICE -->
    @if (Request::is('*payment*'))
    <x-form-input title="Nomor Invoice" ipname="inv_no" value="{{$invoice->inv_no ?? ''}}" opsi="required readonly" />
    @else
    <input type="text" id="inv_no" name="inv_no" value="{{old('inv_no')}}" hidden>
    <x-form-input title="Nomor Invoice" ipname="inv_no" value="{{old('inv_no')}}" opsi="required readonly" />
    <x-buttonsearch target="#InvoiceModal">Cari</x-buttonsearch>
    @endif

    <!-- NO INVOICE -->
    @if (Request::is('*payment*'))
    <x-form-input title="Pelanggan" ipname="cust_id" value="{{$invoice->cust_id . ' - ' .$invoice->cust_name}}" opsi="required readonly" />
    @else
    <input type="text" id="cust_id" name="cust_id" value="{{old('cust_id')}}" hidden>
    <x-form-input title="Pelanggan" ipname="cust_id" value="{{old('cust_id')}}" opsi="required readonly" />
    <x-buttonsearch target="#InvoiceModal">Cari</x-buttonsearch>
    @endif


    <div class="mb-3"></div>
    <!-- TABLE -->
    <table id="invoicePay" class="invoiceDetail table-bordered shadow" width="100%">
      <thead class="bg-dark text-white">
        <tr class="text-center">
          <th>TGL INVOICE</th>
          <th>JATUH TEMPO</th>
          <th>DETAIL</th>
          <th>HARGA</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

    <!-- SUB TOTAL -->
    <div class="input-group input-group-sm">
      <input type="text" id="sub_total_text" class="form-control form-control-sm font-weight-bold RobotoFont text-right bg-dark" value="SUB TOTAL " disabled readonly>
      <input type="text" id="sub_total" name="sub_total" class="form-control form-control-sm font-weight-bold RobotoFont" required readonly value="{{ old('sub_total') }}">
    </div>

    <!-- BIAYA COLLECT -->
    <div class="input-group input-group-sm">
      <input type="text" id="biaya_collect_text" class="form-control form-control-sm font-weight-bold RobotoFont text-right bg-dark" value="BIAYA COLLECT * " disabled readonly>
      <input type="text" id="biaya_collect" name="biaya_collect" class="form-control form-control-sm font-weight-bold RobotoFont" required value="{{ old('biaya_collect') ?? "0" }}">
    </div>

    <!-- BIAYA TERLAMBAT -->
    <div class="input-group input-group-sm mb-2">
      <input type="text" id="biaya_terlambat_text" class="form-control form-control-sm font-weight-bold RobotoFont text-right bg-dark" value="BIAYA TERLAMBAT * " disabled readonly>
      <input type="text" id="biaya_terlambat" name="biaya_terlambat" class="form-control form-control-sm font-weight-bold RobotoFont" required value="{{ old('biaya_terlambat') ?? "0" }}">
    </div>

    <!-- TOTAL HARUS DIBAYAR -->
    <div class="input-group input-group-sm mb-2">
      <input type="text" id="total_bayar_text" class="form-control form-control-sm font-weight-bold RobotoFont text-right bg-dark" value="TOTAL HARUS DIBAYAR " disabled readonly>
      <input type="text" id="total_bayar" name="total_bayar" class="form-control form-control-sm font-weight-bold RobotoFont" required readonly value="{{ old('total_bayar') ?? "0" }}">
    </div>

    <div class="mt-3"></div>

    <!-- KREDIT NOTE -->
    <x-inputprepend title="Kredit Note" type="text" id="kredit_note" name="kredit_note" value="{{old('kredit_note') ?? 0 }}" opsi="required" />

    <!-- DEBIT NOTE -->
    <x-inputprepend title="Debit Note" type="text" id="debit_note" name="debit_note" value="{{old('debit_note') ?? 0 }}" opsi="required" />

    <!-- TOTAL TERIMA -->
    <x-inputprepend title="Total Terima" type="text" id="total_terima" name="total_terima" value="{{old('total_terima')}}" opsi="required" />

    <!-- REMARK -->
    <x-inputprepend title="Remark" type="text" id="remark" name="remark" value="{{old('remark')}}" opsi="" />

    <!-- DIBAYAR OLEH -->
    <x-inputprepend title="Dibayar Oleh" type="text" id="paid_by" name="paid_by" value="{{old('paid_by')}}" opsi="required" />

    <!-- COLLECTOR -->
    <div class="input-group input-group-sm mb-4">
      <div class="input-group-prepend">
        <span class="input-group-text">Collector <sup class="text-danger">*</sup></span>
      </div>
      <input type="text" id="collector" name="collector" class="form-control form-control-sm @error('collector') is-invalid @enderror" value="{{ old('collector') }}" required readonly>
      @error('collector')
      <span class="invalid-feedback text-right" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
      <x-buttonsearch target="#CollectorModal">Cari</x-buttonsearch>
    </div>

    <!-- POINT iDoMerchant -->
    <div class="form-check mt-2 ml-3">
      <input class="form-check-input" type="checkbox" id="point" checked>
      <label class="form-check-label" for="point" checked>
        iDoMerchant POINT
      </label>
    </div>
    @if (Request::is('*edit*'))
    @if ($updated_by != '')
    <footer class="blockquote-footer text-right">
      <small class="text-muted">
        terakhir diedit: <cite title="Source Title">
          {{ Carbon\Carbon::parse($product->updated_at)->format('d M Y H:i:s') }}
          oleh
          {{$updated_by}}
        </cite>
      </small>
    </footer>
    @endif
    @endif

  </div>
</div>