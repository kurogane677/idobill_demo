@extends('menu.PrintTemplate._masterKwitansi')

@section('form')

{{-- {{dd($allInvoices)}} --}}

@for ($i = 0; $i < count($allInvoices) ; $i++) <table width="100%" cellpadding="2" border="0" class="table-form">
  <tbody>
    <tr>
      <td rowspan="3" class="w560pxPDF w858px" style="border-right: 1px solid rgb(119, 116, 116)">
        <img src="{{$logo ?? asset('images/grahakomindo_logo.png')}}" alt="ERB" width="30%" />
      </td>
      <td colspan="3" class="text-center"><strong>PAYMENT RECEIPT</strong></td>
    </tr>
    <tr>
      <td class="w110pxPDF w110px"><strong>No. Invoice</strong></td>
      <td class="w5pxPDF w5px">:</td>
      <td class="w110px" class="text-right">
        {{$allInvoices[$i][0][0]['inv_no'] ?? ''}}
      </td>
    </tr>
    {{-- <tr>
      <td class="w110px"><strong>No. Subscription</strong></td>
      <td class="w5pxPDF w5px">:</td>
      <td class="w110px" class="text-right">
        {{$allInvoices->subs_id ?? ''}}
    </td>
    </tr> --}}
  </tbody>
  </table>

  <hr class="hr-line-form">

  <table width="100%" cellpadding="2" border="0" class="table-form">
    <tbody>
      <tr>
        <td class="w120pxPDF w200px">ID Pelanggan</td>
        <td class="w5pxPDF w5px">:</td>
        <td>
          {{$allInvoices[$i][0][0]['cust_id'] ?? ''}}
        </td>
      </tr>
      <tr>
        <td>Telah Terima Dari</td>
        <td>:</td>
        <td>
          {{$allInvoices[$i][0][0]['cust_name'] ?? ''}}
        </td>
      </tr>
      <tr>
        <td>Uang Sejumlah</td>
        <td>:</td>
        <td>Rp.
          {{(number_format($allInvoices[$i][0][0]['grand_total'],2,',','.')) ?? '0,00'}}
        </td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>
          {{$allInvoices[$i][0][0]['alamat'] ?? ''}}
        </td>
      </tr>
      <tr>
        <td>No Rekening Listrik</td>
        <td>:</td>
        <td>
          {{$allInvoices[$i][0][0]['rek_listrik'] ?? ''}}
        </td>
      </tr>
    </tbody>
  </table>

  <br>

  <table width="100%" cellpadding="2" border="0" class="table-form">
    <tbody>
      <tr>
        <td width="70%"><strong>Rincian tagihan bulan {{(\Carbon\Carbon::parse($allInvoices[$i][0][0]['inv_date'])->format('F Y')) ?? ''}}</strong></td>
        <td width="15%" class="text-right"><strong>Jatuh Tempo :</strong></td>
        <td width="15%" class="text-right">
          {{ (\Carbon\Carbon::parse($allInvoices[$i][0][0]['exp_date'])->format('d-m-Y')) ?? '' }}
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
          {{(number_format($allInvoices[$i][0][0]['grand_total'],2,',','.')) ?? '0,00'}}
        </td>
        <td class="text-center">
          {{(number_format($allInvoices[$i][0][0]['grand_total'],2,',','.')) ?? '0,00'}}
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
                {{(\Carbon\Carbon::parse($allInvoices[$i][0][0]['inv_date'])->format('F Y')) ?? ''}}
              </td>
              <td width="3%" class="td-top">:</td>
              <td class="products">
                @if($allInvoices[$i][1])
                @if (count($allInvoices[$i][1])>0)
                @foreach ($allInvoices[$i][1] as $product)
                <li>{{$product['prod_id']}} - {{$product['prod_desc']}}</li>
                @endforeach
                @endif
                @else
                <li>-</li>
                @endif
              </td>
            </tr>
            <tr class="td-top">
              <td class="td-top">Biaya-Biaya</td>
              <td class="td-top">:</td>
              <td class="biaya">
                @if($allInvoices[$i][2])
                @if (count($allInvoices[$i][2])>0)
                @foreach ($allInvoices[$i][2] as $fee)
                <li>{{$fee['biaya_id']}} - {{$fee['biaya_name']}}</li>
                @endforeach
                @endif
                @else
                <li>-</li>
                @endif
              </td>
            </tr>
          </table>
        </td>
        <td>
          <table width="100%" border="0">
            <tr>
              <td class="product_price text-right" style="list-style: none;">
                @if($allInvoices[$i][1])
                @if (count($allInvoices[$i][1])>0)
                @foreach ($allInvoices[$i][1] as $product)
                <li>
                  {{(number_format($product['prod_price'],2,',','.')) ?? '0,00'}}
                </li>
                @endforeach
                @endif
                @else
                <li>-</li>
                @endif
              </td>
            </tr>
            <tr>
              <td class="biaya_price text-right" style="list-style: none;">
                @if($allInvoices[$i][2])
                @if (count($allInvoices[$i][2])>0)
                @foreach ($allInvoices[$i][2] as $fee)
                <li>
                  {{(number_format($fee['biaya_price'],2,',','.')) ?? '0,00'}}
                </li>
                @endforeach
                @endif
                @else
                <li>-</li>
                @endif
              </td>
            </tr>
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
                {{(number_format($allInvoices[$i][0][0]['grand_total'],2,',','.')) ?? '0,00'}}
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
                <hr>
              </td>
              <td>
                <hr>
              </td>
              <td>
                <hr>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </tbody>
  </table>

  <p class="text-center"><i>- end of form -</i></p>

  @if ($i < (count($allInvoices)-1)) <div class="page_break_after">
    </div>
    @endif

    @endfor


    @endsection