<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  {{-- <meta charset="utf-8"> --}}
  {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  {{-- <meta name="csrf-token" content="{{csrf_token()}}"> --}}

  <title>{{$filename}}</title>

  <link rel="icon" href="{{$logo}}" type=" image/x-icon" />

  <style>
    @page {
      margin: 8px 10px 0 10px;
    }

    body {
      font-family: Arial, Helvetica, sans-serif !important;
      font-size: 0.7rem;
      margin: 15px 10px 0 10px;
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
      width: 530px;
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

    .w110pxPDF {
      width: 110px;
    }

    .w853pxPDF {
      width: 185px;
    }

    .page_break_after {
      page-break-after: always;
    }
  </style>

</head>

<body>
  @yield('form')
</body>

</html>