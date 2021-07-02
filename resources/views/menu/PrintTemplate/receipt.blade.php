@extends('menu.PrintTemplate._masterKwitansi')

@section('form')
<table width="100%" cellpadding="2" border="0" class="table-form">
  <tbody>
    <tr>
      <td rowspan="3" class="w560pxPDF w858px" style="border-right: 1px solid #444">
        <img src="{{$logo ?? asset('images/grahakomindo_logo.png')}}" alt="ERB" width="30%" />
      </td>
      <td colspan="3" class="text-center"><strong>PAYMENT RECEIPT</strong></td>
    </tr>
    <tr>
      <td class="w110pxPDF w110px"><strong>No. Invoice</strong></td>
      <td class="w5pxPDF w5px">:</td>
      <td class="w110px" class="text-right">
        {{$invoice->inv_no ?? ''}}
      </td>
    </tr>
    <tr>
      <td class="w110px"><strong>No. Subscription</strong></td>
      <td class="w5pxPDF w5px">:</td>
      <td class="w110px" class="text-right">
        {{$invoice->subs_id ?? ''}}
      </td>
    </tr>
  </tbody>
</table>

<hr class="hr-line-form">

<table width="100%" cellpadding="2" border="0" class="table-form">
  <tbody>
    <tr>
      <td class="w120pxPDF w200px">ID Pelanggan</td>
      <td class="w5pxPDF w5px">:</td>
      <td>
        {{$customer->cust_id ?? ''}}
      </td>
    </tr>
    <tr>
      <td>Telah Terima Dari</td>
      <td>:</td>
      <td>
        {{$customer->cust_name ?? ''}}
      </td>
    </tr>
    <tr>
      <td>Uang Sejumlah</td>
      <td>:</td>
      <td>Rp.
        {{(number_format($invoice_payments->received_total,2,',','.')) ?? '0,00'}}
      </td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>:</td>
      <td>
        {{$customer->alamat ?? ''}}
      </td>
    </tr>
    <tr>
      <td>No Rekening Listrik</td>
      <td>:</td>
      <td>
        {{$customer->rek_listrik ?? ''}}
      </td>
    </tr>
  </tbody>
</table>

<br>

<table width="100%" cellpadding="2" border="0" class="table-form">
  <tbody>
    <tr>
      <td width="70%"><strong>Rincian tagihan</strong></td>
      <td width="15%" class="text-right"><strong>Jatuh Tempo :</strong></td>
      <td width="15%" class="text-right">
        {{ (\Carbon\Carbon::parse($invoice->exp_date)->format('d-m-Y')) ?? '' }}
      </td>
    </tr>
  </tbody>
</table>

<table width="100%" cellpadding="2" border="1" class="table-kwitansi-detail table-form">
  <thead class="text-center">
    <tr>
      <th width="30%">TAGIHAN SEBELUMNYA</th>
      <th width="30%">PEMBAYARAN</th>
      <th width="20%">TAGIHAN SEKARANG</th>
      <th width="20%">TOTAL TAGIHAN</th>
    </tr>
  </thead>
  <tbody>
    <tr class="text-center">
      <td>-</td>
      <td>Biaya Registrasi & Iuran Bulanan</td>
      <td class="text-center">
        {{(number_format($invoice_payments->received_total,2,',','.')) ?? '0,00'}}
      </td>
      <td class="text-center">
        {{(number_format($invoice_payments->received_total,2,',','.')) ?? '0,00'}}
      </td>
    </tr>
    <tr class="text-center">
      <td colspan="3">KETERANGAN</td>
      <td>JUMLAH</td>
    </tr>
    <tr>
      <td colspan="3">
        <table width="100%" border="0">
          <tr class="td-top">
            <td width="35%" class="td-top">
              Iuran Tetap Bulanan -
              {{(\Carbon\Carbon::parse($invoice->inv_date)->format('F Y')) ?? ''}}
            </td>
            <td width="3%" class="td-top">:</td>
            <td class="products">
              @isset($products)
              @if (count($products)>0)
              @foreach ($products as $product)
              <li>{{$product->prod_id}} - {{$product->prod_desc}}</li>
              @endforeach
              @endif
              @endisset
            </td>
          </tr>
          <tr class="td-top">
            <td class="td-top">Biaya-Biaya</td>
            <td class="td-top">:</td>
            <td class="biaya">
              @isset($biaya)
              @if (count($biaya)>0)
              @foreach ($biaya as $fee)
              <li>{{$fee->biaya_id}} - {{$fee->biaya_name}}</li>
              @endforeach
              @endif
              @endisset
            </td>
          </tr>
          <tr>
            <td>Biaya Collect</td>
            <td>:</td>
            <td></td>
          </tr>
          @if ($invoice_payments->credit_id)
          <tr>
            <td>Credit Note</td>
            <td>:</td>
            <td>Credit Note No. : {{$invoice_payments->credit_id}}</td>
          </tr>
          @endif
          @if ($invoice_payments->debit_id)
          <tr>
            <td>Debit Note</td>
            <td>:</td>
            <td>Debit Note No. : {{$invoice_payments->debit_id}}</td>
          </tr>
          @endif
        </table>
      </td>
      <td>
        <table width="100%" border="0">
          <tr>
            <td class="product_price text-right" style="list-style: none;">
              @isset($products)
              @if (count($products)>0)
              @foreach ($products as $product)
              <li>
                {{(number_format($product->prod_price,2,',','.')) ?? '0,00'}}
              </li>
              @endforeach
              @endif
              @endisset
            </td>
          </tr>
          <tr>
            <td class="biaya_price text-right" style="list-style: none;">
              @isset($biaya)
              @if (count($biaya)>0)
              @foreach ($biaya as $fee)
              <li>
                {{(number_format($fee->biaya_price,2,',','.')) ?? '0,00'}}
              </li>
              @endforeach
              @endif
              @endisset
            </td>
          </tr>
          <tr>
            <td class="text-right">
              {{(number_format(($invoice_payments->collect_fee + $invoice_payments->late_fee),2,',','.')) ?? '0,00'}}
            </td>
          </tr>
          @if ($invoice_payments->credit_id)
          <tr class="text-right">
            <td>
              - {{(number_format($invoice_payments->credit_amount,2,',','.')) ?? '0,00'}}
            </td>
          </tr>
          @endif
          @if ($invoice_payments->debit_id)
          <tr class="text-right">
            <td>
              {{(number_format($invoice_payments->debit_amount,2,',','.')) ?? '0,00'}}
            </td>
          </tr>
          @endif
        </table>
      </td>
    </tr>
    <tr>
      <td colspan="2" class="text-center"><strong>PERHATIAN !!!</strong></td>
      <td class="text-center"><strong>TOTAL</strong></td>
      <td>
        <table width="100%" border="0">
          <tr>
            <td width="20%" class="font-weight-bold">Rp. </td>
            <td width="80%" class="text-right font-weight-bold">
              {{(number_format($invoice_payments->received_total,2,',','.')) ?? '0,00'}}
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <ul style="padding-left: 20px;">
          <li>Periksa kembali seluruh pembayaran anda</li>
          <li>Mohon untuk tidak membuang bukti pembayaran anda</li>
          <li>Kwitansi asli yang telah distempel adalah bukti sah pembayaran</li>
          <li>Pembayaran dapat ditransfer ke Rek. Atas Nama <br /><strong>PT. Graha Telekomunikasi Indonesia No. 737 767 777 7<br />BANK NEGARA INDONESIA (BNI)</strong></li>
          <li>Untuk layanan Informasi / Keluhan : +62-778-431889, 606 2077</li>
        </ul>
      </td>
      <td colspan="2">
        <table width="100%" cellpadding="10">
          <tr class="text-center">
            <td>
              <div>Diketahui,</div>
            </td>
            <td>
              <div>Penerima, </div>
            </td>
            <td>
              <div>Pelanggan,</div>
            </td>
          </tr>

          <tr>
            <td>
              <hr class="hr-line-form">
            </td>
            <td>
              <hr class="hr-line-form">
            </td>
            <td>
              <hr class="hr-line-form">
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </tbody>
</table>

<p class="text-center"><i>- end of form -</i></p>
@endsection