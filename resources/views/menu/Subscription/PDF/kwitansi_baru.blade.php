<table width="100%" cellpadding="2" border="0" class="table-form">
  <tbody>
    <tr>
      <td rowspan="3" class="w560pxPDF w858px" style="border-right: 1px solid #444">
        <img src="{{$logo ?? asset('images/grahakomindo_logo.png')}}" alt="ERB" width="30%" />
      </td>
      <td colspan="3" class="text-center"><strong>PAYMENT RECEIPT</strong></td>
    </tr>
    <tr>
      <td class="w85pxPDF w110px"><strong>No.</strong></td>
      <td class="w5pxPDF w5px">:</td>
      <td class="w110px" class="text-right">
        <input name="inv_no" value="{{Session::get('inv_no')}}" class="inv_no input-pdf text-right w110px" readonly />
        {{$request->inv_no ?? ''}}
      </td>
    </tr>
    <tr>
      <td><strong>Ref No</strong></td>
      <td>:</td>
      <td></td>
    </tr>
  </tbody>
</table>

<hr class="hr-line-form">

<table width="100%" cellpadding="2" border="0" class="table-form">
  <tbody>
    <tr>
      <td class="w120pxPDF w200px">No Pelanggan</td>
      <td class="w5pxPDF w5px">:</td>
      <td>
        <input name="cust_id" value="{{Session::get('cust_id')}}" class="cust_id input-pdf" readonly />
        {{$request->cust_id ?? ''}}
      </td>

      <td class="pad320pxPDF w85pxPDF pad470px">Subscription No.</td>
      <td class="w5pxPDF w5px">:</td>
      <td class="w85pxPDF w110px text-right">
        <input name="subs_id" value="{{Session::get('subs_id')}}" class="subs_id input-pdf text-right w110px" readonly />
        {{$request->subs_id ?? ''}}
      </td>
    </tr>
    <tr>
      <td>Telah Terima Dari</td>
      <td>:</td>
      <td>
        <input name="cust_name" value="{{Session::get('cust_name')}}" class="cust_name input-pdf" readonly />
        {{$request->cust_name ?? ''}}
      </td>
    </tr>
    <tr>
      <td>Uang Sejumlah</td>
      <td>:</td>
      <td>Rp.
        <input name="subs_total" value="{{Session::get('subs_total')}}" class="subs_total input-pdf" readonly />
        {{$request->subs_total ?? ''}}
      </td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>:</td>
      <td>
        <input name="alamat" value="{{Session::get('alamat')}}" class="alamat input-pdf" readonly />
        {{$request->alamat ?? ''}}
      </td>
    </tr>
    <tr>
      <td>No Rekening Listrik</td>
      <td>:</td>
      <td></td>
    </tr>
  </tbody>
</table>

<br>

<table width="100%" cellpadding="2" border="0" class="table-form">
  <tbody>
    <tr>
      <td width="70%"><strong>Ringkasan biaya mulai berlangganan</strong></td>
      <td width="15%" class="text-right"><strong>Jatuh Tempo :</strong></td>
      <td width="15%" class="text-right">
        <input name="exp_date" value="{{Session::get('exp_date')}}" class="exp_date input-pdf text-right font-weight-bold" readonly />
        {{$request->exp_date ?? ''}}
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
        <input name="subs_total" value="{{number_format(Session::get('subs_total'),2,",",".")}}" class="subs_total input-pdf text-center" readonly />
        {{$request->subs_total ?? ''}}
      </td>
      <td class="text-center">
        <input name="subs_total" value="{{number_format(Session::get('subs_total'),2,",",".")}}" class="subs_total input-pdf text-center" readonly />
        {{$request->subs_total ?? ''}}
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
              Iuran Tetap Bulanan -<input name="subs_date" value="{{\Carbon\Carbon::parse(Session::get('subs_date'))->format('F Y')}}" class="subs_date input-pdf" readonly />
              {{($request->subs_date ?? '')}}
            </td>
            <td width="3%" class="td-top">:</td>
            <td class="products">
              @if(Session::get('products'))
              @foreach (Session::get('products') as $no => $product)
              <li>
                <input name="prod_dtl[]" class="input-pdf input-resize" value="{{$product->prod_id}} | {{$product->prod_desc}}" readonly \>
              </li>
              @endforeach
              @endif

              @isset($request->prod_dtl)
              @if (count($request->prod_dtl)>0)
              @foreach ($request->prod_dtl as $prod)
              <li>{{$prod}}</li>
              @endforeach
              @endif
              @endisset

            </td>
          </tr>
          <tr class="td-top">
            <td class="td-top">Biaya Registrasi</td>
            <td class="td-top">:</td>
            <td class="biaya">
              @if(Session::get('biaya'))
              @if (count(Session::get('biaya'))>0)
              @foreach (Session::get('biaya') as $no => $biaya)
              <li>
                <input name="biaya_dtl[]" class="input-pdf input-resize" value="{{$biaya->biaya_id}} | {{$biaya->biaya_name}}" readonly \>
              </li>
              @endforeach
              @endif
              @endif

              @isset($request->biaya_dtl)
              @if (count($request->biaya_dtl)>0)
              @foreach ($request->biaya_dtl as $biaya)
              <li>{{$biaya}}</li>
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
        </table>
      </td>
      <td>
        <table width="100%" border="0">
          <tr>
            <td class="product_price text-right" style="list-style: none;">
              @if(Session::get('products'))
              @foreach (Session::get('products') as $no => $product)
              <li style="list-style: none;">
                <input name="prod_prices[]" class="input-pdf text-right" value="{{number_format($product->prod_price,2,",",".")}}" readonly \>
              </li>
              @endforeach
              @endif

              @isset($request->prod_prices)
              @if (count($request->prod_prices)>0)
              @foreach ($request->prod_prices as $price)
              <li>{{$price}}</li>
              @endforeach
              @endif
              @endisset
            </td>
          </tr>
          <tr>
            <td class="biaya_price text-right" style="list-style: none;">
              @if(Session::get('biaya'))
              @foreach (Session::get('biaya') as $no => $biaya)
              <li style="list-style: none;">
                <input name="biaya_prices[]" class="input-pdf text-right" value="{{number_format($biaya->biaya_price,2,",",".")}}" readonly \>
              </li>
              @endforeach
              @endif

              @isset($request->biaya_prices)
              @if (count($request->biaya_prices)>0)
              @foreach ($request->biaya_prices as $price)
              <li>{{$price}}</li>
              @endforeach
              @endif
              @endisset
            </td>
          </tr>
          <tr>
            <td class="text-right">0.00</td>
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
              <input name="subs_total" value="{{number_format(Session::get('subs_total'),2,",",".")}}" class="subs_total input-pdf font-weight-bold text-right" readonly />
              {{$request->subs_total ?? ''}}
              {{-- <strong>{{number_format(Session::get('subs_total'),2,",",".")}}</strong> --}}
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