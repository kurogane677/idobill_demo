<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'iDoBill') }}</title>

  <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon" />
  <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap.min.css') }}" />
  <script src="{{ asset('js/plugins/jquery.min.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('css/master.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/print_laporan.css') }}" />

</head>

<body style="background: #fff">

  @yield('content')

  <script src="{{ asset('js/plugins/bootstrap.bundle.min.js') }}"></script>
</body>

</html>