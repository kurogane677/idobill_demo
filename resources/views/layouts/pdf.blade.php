<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  {{-- <meta charset="utf-8"> --}}
  {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}


  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  {{-- <meta name="csrf-token" content="{{csrf_token()}}"> --}}

  <title>{{$filename}}</title>
  <link rel="icon" href="{{$logo}}" type=" image/x-icon" />

  @if ($request->title == 'Form Kwitansi')
  <!-- Styling untuk Kwitansi -->
  <style>
    @page {
      margin: 8px 10px 0 10px;
    }

    body {
      font-family: Arial, Helvetica, sans-serif !important;
      font-size: 0.7rem;
      margin: 8px 10px 0 10px;
    }

    .pdf-invoice {
      line-height: 1rem;
      font-size: 0.6rem;
      vertical-align: middle;
    }

    table {
      border-collapse: collapse;
    }

    table tbody tr td {
      vertical-align: middle;
    }

    .lineheigth8PDF {
      line-height: 0.8rem;
    }

    .text-center {
      text-align: center;
    }

    .text-right {
      text-align: right;
    }

    .w2 {
      width: 2px;
    }

    .w150 {
      width: 150px;
    }

    .td-top {
      vertical-align: top !important;
    }

    .input-pdf {
      border: none;
    }

    .font-weight-bold {
      font-weight: bold;
    }

    .w560pxPDF {
      width: 560px;
    }

    .w20px {
      width: 20px;
    }

    .w5pxPDF {
      width: 5px;
    }

    .w120pxPDF {
      width: 120px;
    }

    .pad320pxPDF {
      padding-left: 320px;
    }

    .w85pxPDF {
      width: 85px;
    }

    .w853pxPDF {
      width: 185px;
    }
  </style>
  @else
  <!-- Styling untuk Invoice -->
  <style>
    @page {
      margin: 15px 60px 0 60px;
    }

    body {
      font-family: Arial, Helvetica, sans-serif !important;
      font-size: 0.6rem;
    }

    .logoPDF img {
      width: 90%
    }

    .top-header {
      line-height: 0.8rem;
      font-size: 0.6rem;
    }

    .top-detail {
      line-height: 0.9rem;
      font-size: 0.6rem;
    }

    table {
      border-collapse: collapse;
    }

    table tbody tr td {
      vertical-align: middle;
    }

    .lineheigth8PDF {
      line-height: 0.8rem;
    }

    .text-center {
      text-align: center;
    }

    .text-right {
      text-align: right;
    }

    .text-bold {
      font-weight: bold;
    }

    .w2 {
      width: 2px;
    }

    .w150 {
      width: 150px;
    }

    .td-top {
      vertical-align: top !important;
    }

    .input-pdf {
      border: none;
    }

    .font-weight-bold {
      font-weight: bold;
    }

    .w560pxPDF {
      width: 560px;
    }

    .w500pxPDF {
      width: 410px;
    }

    .w40pxPDF {
      width: 40px;
    }

    .w70pxPDF {
      width: 70px;
    }

    .w5pxPDF {
      width: 5px;
    }

    .w10px {
      width: 10px;
    }

    .w120pxPDF {
      width: 120px;
    }

    .pad320pxPDF {
      padding-left: 320px;
    }

    .w85pxPDF {
      width: 85px;
    }

    .w853pxPDF {
      width: 185px;
    }

    .bordertop0 {
      border-top: none;
    }

    .borderbottom0 {
      border-bottom: none;
    }

    .itemsTableModalsFormInvoie tr td:nth-child(1) {
      width: 3%;
    }

    .itemsTableModalsFormInvoie tr td:nth-child(4),
    .itemsTableModalsFormInvoie tr td:nth-child(3) {
      width: 8%;
    }

    .itemsTableModalsFormInvoie tr td:nth-child(5) {
      width: 12%;
    }

    .itemsTableModalsFormInvoie tr td:nth-child(6) {
      width: 15.5%;
    }

    .footerTableModalsFormInvoie tr td:nth-child(1) {
      width: 84.5%;
    }

    .footerTableModalsFormInvoie tr td:nth-child(2) {
      width: 15.5%;
    }
  </style>
  @endif

</head>

<body>

  @if ($request->title == 'Form Kwitansi')
  @include('menu.Subscription.PDF.kwitansi_baru')
  @else
  @include('menu.Subscription.PDF.invoice_baru')
  @endif

</body>

</html>