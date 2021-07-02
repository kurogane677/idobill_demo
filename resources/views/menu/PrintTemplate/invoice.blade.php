@extends('menu.PrintTemplate._masterInvoice')

@section('form')
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
      <td class="w70pxPDF w120px">ID Pelanggan: </td>
      <td class="w500pxPDF w1000px">
        {{$invoice->cust_id ?? ''}}
      </td>
      <td class="w115px">No.</td>
      <td class="w5pxPDF w5px">:</td>
      <td class="w85pxPDF w1px text-right">
        {{$invoice->inv_no ?? ''}}
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
        {{$customer->cust_name ?? ''}}
      </td>
      <td>No. Langganan</td>
      <td>:</td>
      <td class="text-right">
        {{$invoice->subs_id ?? ''}}
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
        {{$customer->alamat ?? ''}}
      </td>
      <td>Invoice Date</td>
      <td>:</td>
      <td class="text-right">
        {{ (\Carbon\Carbon::parse($invoice->inv_date)->format('d-m-Y')) ?? '' }}
      </td>
    </tr>
    <tr>
      <td></td>
      <td>No Rekening Listrik: {{$customer->rek_listrik ?? ''}}</td>
      <td>Due Date</td>
      <td>:</td>
      <td class="text-right">
        {{ (\Carbon\Carbon::parse($invoice->exp_date)->format('d-m-Y')) ?? '' }}
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
    <!-- Transfer ke PDF -->
    @isset($biaya)
    <tr>
      <td colspan="6" class="text-center">BIAYA REGISTRASI</td>
    </tr>
    @if (count($biaya)>0)
    @for ($i = 0; $i < count($biaya); $i++) <tr>
      <td class="text-center">{{$i+1}}</td>
      <td>{{$biaya[$i]->biaya_name}}</td>
      <td class="text-center">{{$biaya[$i]->biaya_qty}}</td>
      <td class="text-center">{{$biaya[$i]->biaya_uom}}</td>
      <td class="text-right">{{number_format($biaya[$i]->biaya_price,2,',','.')}}</td>
      <td class="text-right">{{number_format($biaya[$i]->biaya_qty * $biaya[$i]->biaya_price,2,',','.')}}</td>

      </tr>
      @endfor
      @endif
      @endisset
  </tbody>
</table>

<table width="100%" cellpadding="2" border="1" class="tableDetailModalsFormInvoice itemsTableModalsFormInvoie bordertop0">
  <tbody class="products">
    <!-- Transfer ke PDF -->
    @isset($products)
    <tr>
      <td colspan="6" class="text-center">IURAN TETAP BULANAN</td>
    </tr>
    @if (count($products)>0)
    @for ($i = 0; $i < count($products); $i++) <tr>
      <td class="text-center">{{$i+1}}</td>
      <td>{{$products[$i]->prod_desc}}</td>
      <td class="text-center">{{$products[$i]->prod_qty}}</td>
      <td class="text-center">{{$products[$i]->prod_uom}}</td>
      <td class="text-right">{{number_format($products[$i]->prod_price,2,',','.')}}</td>
      <td class="text-right">{{number_format($products[$i]->prod_qty * $products[$i]->prod_price,2,',','.')}}</td>
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
        {{(number_format($invoice->sub_total,2,',','.')) ?? '0,00'}}
      </td>
    </tr>
    <tr>
      <td class="text-right text-bold">Disc</td>
      <td class="text-right text-bold">
        {{(number_format($invoice->disc,2,',','.')) ?? '0,00'}}
      </td>
    </tr>
    <tr>
      <td class="text-right text-bold">Tax</td>
      <td class="text-right text-bold">
        {{(number_format($invoice->tax,2,',','.')) ?? '0,00'}}
      </td>
    </tr>
    <tr>
      <td class="text-right text-bold">Grand Total</td>
      <td class="text-right text-bold">
        {{(number_format($invoice->grand_total,2,',','.')) ?? '0,00'}}
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
@endsection