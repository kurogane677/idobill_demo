<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'iDoBill') }}</title>

  <link href="{{ asset('images/favicon.png') }}" type="image/x-icon" rel="icon" />

  <link href="{{ asset('css/plugins/bootstrap4.1.3.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/plugins/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/login.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/plugins/toastr.min.css') }}" rel="stylesheet" />

  <script src="{{ asset('js/plugins/jquery.min.js') }}"></script>
  <script src="{{ asset('js/themes-current.js') }}"></script>

</head>

<body>
  @yield('content')

  <script>
    $(function() {
      // show the alert, in miliseconds
      setTimeout(function () {
          $(".alert").alert('close');
      }, 10000);

      var timeout = ({{config('session.lifetime')}} * 60000) -10 ;
      setTimeout(function(){
          window.location = "{{config('app.url')}}";
      },  timeout);
    });

  </script>

  <script src="{{ asset('js/plugins/bootstrap.bundle.min.js') }}"></script>
  {{-- <script src="{{ asset('js/master.js') }}"></script> --}}
  {{-- <script src="{{ asset('js/themes.js') }}"></script> --}}

  <script src="{{ asset('js/plugins/toastr.min.js') }}"></script>

  @if(Session::has('message'))
  <script>
    $(function() {
      toastr.options.positionClass = 'toast-bottom-full-width';
      toastr.success("{{ Session::get('message') }}");
    });
  </script>
  @elseif(Session::has('wrong'))
  <script>
    $(function() {
      toastr.options.positionClass = 'toast-bottom-full-width';
      toastr.error("{{ Session::get('wrong') }}");
    });
  </script>
  @endif

</body>

</html>