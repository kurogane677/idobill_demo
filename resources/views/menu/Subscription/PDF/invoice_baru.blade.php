<div class="wrapperModalsFormInvoice">
  <table width="100%" cellpadding="2" border="0" class="table-form top-header topHeaderModalsFormInvoice">
    <tbody>
      <tr>
        <td rowspan="6" class="logoPDF w853pxPDF logoModalsFormInvoice">
          <img src="{{$logo ?? asset('images/grahakomindo_logo.png')}}" alt="ERB" />
        </td>
        <td><strong>{{$host->company_name ?? 'PT. Graha Telekomunikasi Indonesia'}}</strong></td>
      </tr>
      <tr>
        <td>{{$host->address ?? 'Jl. Imam Bonjol, Nagoya Point No.7, Kampung Utama'}}</td>
      </tr>
      <tr>
        <td>{{$host->city ?? 'Batam 29444, Indonesia'}}</td>
      </tr>
      <tr>
        <td>{{$host->phone ?? '(0778) 431889, 606 2077'}}</td>
      </tr>
      <tr>
        <td>Email : {{$host->email ?? 'Email : sales.batam@grahakomindo.com'}}</td>
      </tr>
      <tr>
        <td>{{$host->website ?? 'www.grahakomindo.com'}}</td>
      </tr>

    </tbody>
  </table>

  <hr class="hr-line-form mt-1 mb-0">

  <br class="my-0">

  <table width="100%" cellpadding="2" border="0" class="table-form lineheigth8PDF top-detail topDetailModalsFormInvoice">
    <tbody>
      <tr>
        <td></td>
        <td></td>
        <td colspan="3" style="font-weight: bold; text-decoration:underline;">INVOICE</td>
      </tr>
      <tr>
        <td class="w70pxPDF w120px">Customer No. :</td>
        <td class="w500pxPDF w1000px">
          <input name="cust_id" value="{{Session::get('cust_id')}}" class="cust_id input-pdf" readonly />
          {{$request->cust_id ?? ''}}
        </td>
        <td class="w115px">No.</td>
        <td class="w5pxPDF w5px">:</td>
        <td class="w85pxPDF w1px text-right">
          <input name="inv_no" value="{{Session::get('inv_no')}}" class="inv_no input-pdf text-right w120px" readonly />
          {{$request->inv_no ?? ''}}
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
          <input name="cust_name" value="{{Session::get('cust_name')}}" class="cust_name input-pdf" readonly />
          {{$request->cust_name ?? ''}}
        </td>
        <td>Client ID</td>
        <td>:</td>
        <td class="text-right">
          <input name="subs_id" value="{{Session::get('subs_id')}}" class="subs_id input-pdf text-right w120px" readonly />
          {{$request->subs_id ?? ''}}
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
          <input name="alamat" value="{{Session::get('alamat')}}" class="alamat input-pdf" readonly />
          {{$request->alamat ?? ''}}
        </td>
        <td>Invoice Date</td>
        <td>:</td>
        <td class="text-right">
          <input name="subs_date" value="{{Session::get('subs_date')}}" class="subs_date_invoiceform input-pdf text-right" readonly />
          {{$request->subs_date ?? ''}}
        </td>
      </tr>
      <tr>
        <td></td>
        <td>Telp Rumah / Handphone :
          <input name="no_hp" value="{{Session::get('no_hp')}}" class="no_hp input-pdf" readonly />
          {{$request->no_hp ?? ''}}
        </td>
        <td>Due Date</td>
        <td>:</td>
        <td class="text-right">
          <input name="exp_date" value="{{Session::get('exp_date')}}" class="exp_date_invoiceform input-pdf text-right" readonly />
          {{$request->exp_date ?? ''}}
        </td>
      </tr>
    </tbody>
  </table>

  <br>

  <table width="100%" cellpadding="2" border="1" class="tableDetailModalsFormInvoice table-form borderbottom1 itemsTableModalsFormInvoie">
    <tbody class="text-center font-weight-bold">
      <tr>
        <td class="w5pxPDF">No.</td>
        <td>Description</td>
        <td class="w40pxPDF">Qty</td>
        <td class="w40pxPDF">UOM</td>
        <td class="w85pxPDF">Unit Price</td>
        <td class="w85pxPDF">Amount</td>
      </tr>
    </tbody>
  </table>

  <table width="100%" cellpadding="2" border="1" class="tableDetailModalsFormInvoice itemsTableModalsFormInvoie">
    <tbody class="biaya">

      <!-- Transfer dari create new ke modal -->
      @if(Session::get('biaya'))
      <tr>
        <td colspan="6" class="text-center">BIAYA REGISTRASI</td>
      </tr>
      @foreach (Session::get('biaya') as $no => $biaya)
      <tr>
        {{-- <td class="text-center">{{$no+1}}</td>
        <td>{{$biaya->biaya_id}} - {{$biaya->biaya_name}}</td>
        <td class="text-center">{{$biaya->biaya_qty}}</td>
        <td class="text-center">{{$biaya->biaya_uom}}</td>
        <td class="text-right">{{number_format($biaya->biaya_price,2,',','.')}}</td>
        <td class="text-right">{{number_format($biaya->biaya_price,2,',','.')}}</td> --}}

        <td class="text-center p-0">
          <input name="biaya_number[]" class="input-pdf w30px text-center" value="{{$no+1}}" readonly \>
        </td>
        <td>
          <input name="biaya_name[]" class="input-pdf w535px" value="{{$biaya->biaya_id}} - {{$biaya->biaya_name}}" readonly \>
        </td>
        <td class="text-center p-0">
          <input name="biaya_qty[]" class="input-pdf w75px text-center" value="{{$biaya->biaya_qty}}" readonly \>
        </td>
        <td class="text-center p-0">
          <input name="biaya_uom[]" class="input-pdf w75px text-center" value="{{$biaya->biaya_uom}}" readonly \>
        </td>
        <td class="text-right p-0">
          <input name="biaya_price[]" class="input-pdf w115px text-right" value="{{number_format($biaya->biaya_price,2,',','.')}}" readonly \>
        </td>
        <td class="text-right p-0">
          <input name="biaya_total[]" class="input-pdf w150px text-right" value="{{number_format(($biaya->biaya_qty * $biaya->biaya_price),2,',','.')}}" readonly \>
        </td>


      </tr>
      @endforeach
      @endif

      <!-- Transfer dari modals ke PDF -->
      @isset($request->biaya_number)
      <tr>
        <td colspan="6" class="text-center">BIAYA REGISTRASI</td>
      </tr>
      @if (count($request->biaya_number)>0)
      @for ($i = 0; $i < count($request->biaya_number); $i++)
        <tr>
          <td class="text-center">{{$request->biaya_number[$i]}}</td>
          <td>{{$request->biaya_name[$i]}}</td>
          <td class="text-center">{{$request->biaya_qty[$i]}}</td>
          <td class="text-center">{{$request->biaya_uom[$i]}}</td>
          <td class="text-right">{{$request->biaya_price[$i]}}</td>
          <td class="text-right">{{$request->biaya_total[$i]}}</td>
        </tr>
        @endfor
        @endif
        @endisset
    </tbody>
  </table>

  <table width="100%" cellpadding="2" border="1" class="tableDetailModalsFormInvoice itemsTableModalsFormInvoie bordertop0">
    <tbody class="products">

      <!-- Transfer dari create new ke modal -->
      @if(Session::get('products'))
      <tr>
        <td colspan="6" class="text-center">IURAN TETAP BULANAN</td>
      </tr>
      @foreach (Session::get('products') as $no => $product)
      <tr>
        <td class="text-right p-0">
          <input name="prod_number[]" class="input-pdf w30px text-center" value="{{$no+1}}" readonly \>
        </td>
        <td>
          <input name="prod_desc[]" class="input-pdf w535px" value="{{$product->prod_id}} - {{$product->prod_desc}}" readonly \>
        </td>
        <td class="text-right p-0">
          <input name="prod_qty[]" class="input-pdf w75px text-center" value="{{$product->prod_qty}}" readonly \>
        </td>
        <td class="text-right p-0">
          <input name="prod_uom[]" class="input-pdf w75px text-center" value="{{$product->prod_uom}}" readonly \>
        </td>
        <td class="text-right p-0">
          <input name="prod_price[]" class="input-pdf w115px text-right" value="{{number_format($product->prod_price,2,',','.')}}" readonly \>
        </td>
        <td class="text-right p-0">
          <input name="prod_total[]" class="input-pdf w150px text-right" value="{{number_format(($product->prod_qty * $product->prod_price),2,',','.')}}" readonly \>
        </td>
      </tr>
      @endforeach
      @endif

      <!-- Transfer dari modals ke PDF -->
      @isset($request->prod_number)
      <tr>
        <td colspan="6" class="text-center">IURAN TETAP BULANAN</td>
      </tr>
      @if (count($request->prod_number)>0)
      @for ($i = 0; $i < count($request->prod_number); $i++)
        <tr>
          <td class="text-center">{{$request->prod_number[$i]}}</td>
          <td>{{$request->prod_desc[$i]}}</td>
          <td class="text-center">{{$request->prod_qty[$i]}}</td>
          <td class="text-center">{{$request->prod_uom[$i]}}</td>
          <td class="text-right">{{$request->prod_price[$i]}}</td>
          <td class="text-right">{{$request->prod_total[$i]}}</td>
        </tr>
        @endfor
        @endif
        @endisset
    </tbody>
  </table>


  <table width="100%" cellpadding="2" border="1" class="tableDetailModalsFormInvoice bordertop0 footerTableModalsFormInvoie">
    <tbody class="font-weight-bold">
      <tr>
        <td class="text-right text-bold">Sub Total</td>
        <td class="text-right text-bold">
          <input name="subs_total" value="{{number_format(Session::get('subs_total'),2,",",".")}}" class="subs_total input-pdf text-right font-weight-bold" readonly />
          {{$request->subs_total ?? ''}}
        </td>
      </tr>
      <tr>
        <td class="text-right text-bold">Disc</td>
        <td class="text-right text-bold">
          0.00
          {{-- <input name="subs_total" value="{{number_format(Session::get('subs_total'),2,",",".")}}" class="subs_total input-pdf text-right font-weight-bold" readonly />
          {{$request->subs_total ?? ''}} --}}
        </td>
      </tr>
      <tr>
        <td class="text-right text-bold">Tax</td>
        <td class="text-right text-bold">
          0.00
          {{-- <input name="subs_total" value="{{number_format(Session::get('subs_total'),2,",",".")}}" class="subs_total input-pdf text-right font-weight-bold" readonly />
          {{$request->subs_total ?? ''}} --}}
        </td>
      </tr>
      <tr>
        <td class="text-right text-bold">Grand Total</td>
        <td class="text-right text-bold">
          <input name="subs_total" value="{{number_format(Session::get('subs_total'),2,",",".")}}" class="subs_total input-pdf text-right font-weight-bold" readonly />
          {{$request->subs_total ?? ''}}
        </td>
      </tr>
    </tbody>
  </table>



  <br>
  <br>

  <table border="0" width="100%">
    <tr>
      <td><strong>BANK ACCOUNT (IDR)</strong></td>
    </tr>
    <tr>
      <td width="50%">PT.Graha Telekomunikasi Indonesia</td>
      <td width="20%" style="text-align:center;">Received,</td>
      <td width="10%"></td>
      <td width="20%" style="text-align:center;">Authorized,</td>
    </tr>
    <tr>
      <td>BNI : 737 767 777 7</td>
    </tr>
    <tr>
      <td>Mandiri : 109 007 7777 688</td>
    </tr>
    <tr>
      <td width="50%">Kantor Cabang Batam, Indonesia</td>
      <td width="20%" style="text-align:center;">__________________</td>
      <td width="10%"></td>
      <td width="20%" style="text-align:center;">__________________</td>
    </tr>
  </table>

  <br>
  <br>
  <p class="text-center"><i>- end of form -</i></p>
</div>