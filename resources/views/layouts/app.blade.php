<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{config('app.name', 'iDoBill')}}@yield('page-title')</title>
  <link href="{{ asset('images/favicon.png') }}" rel="icon" type="image/x-icon" />
  <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap.min.css') }}" />

  <script src="{{ asset('js/plugins/jquery.min.js') }}"></script>
  <script src="{{ asset('js/master.js') }}"></script>

  <link rel="stylesheet" href="{{ asset('css/master.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/loading.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/width.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/height.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/plugins/country.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/plugins/intlTelInput.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/plugins/toastr.min.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('DataTables/dataTables.checkboxes.css')}}" />

  <script src="{{ asset('js/themes-current.js') }}"></script>

</head>

<body data-color="{{$profiles->window_bg}}" style="background-color:{{$profiles->window_bg}};">

  @include('navigations.navbar')

  <div id="wrapper" class="wrapper d-flex hideMenu">

    @include('navigations.sidebar')

    <!-- Page Content -->
    <div class="content">

      <div class="flex-center">
        <div class="top-marquee">
          <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();" loop="true" scrollamount="infinite" id="unpaid_invoice">
          </marquee>
          <span class="before"> </span>
          <span class="after"> </span>
        </div>
      </div>

      <div class="my-3"></div>
      <main>
        @yield('content')
      </main>

      @include('sweetalert::alert')
      <hr />

      @include('navigations.footer')

    </div>

  </div>

  <form id="logout_form" method="POST" action="{{ route('logout') }}" hidden>
  </form>

  <script>
    var module = "{{ $module->name }}";
    var editIcon = "{{ asset('images/edit.png') }}"
    var deleteIcon = "{{ asset('images/delete.png') }}"
  </script>

  {{-- <script src="{{ mix('js/app.js') }}"></script> <!-- Memakai Vue --> --}}
  <script src="{{ asset('js/plugins/axios.min.js') }}"></script>

  <script src="{{ asset('js/plugins/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/plugins/jquery.slimscroll.min.js') }}"></script>
  <script src="{{ asset('js/plugins/popper.min.js') }}"></script>
  <script src="{{ asset('js/plugins/intlTelInput.js') }}"></script>
  <script src="{{ asset('js/plugins/toastr.min.js') }}"></script>
  <script src="{{ asset('js/plugins/numeral.js') }}"></script>
  <script src="{{ asset('js/themes.js') }}"></script>
  <script src="{{ asset('js/number_format.js') }}"></script>
  <script src="{{ asset('js/format_date.js') }}"></script>
  <script src="{{ asset('js/validation.js') }}"></script>

  @if (!Request::is('*dashboard*'))
  <script src="{{asset('DataTables/datatables.min.js')}}"></script>
  <script src="{{ asset('js/plugins/sum.js') }}"></script>
  <script src="{{asset('DataTables/dataTables.checkboxes.min.js')}}"></script>
  @endif

  @if(Session::has('message'))
  <script>
    $(function() {
      toastr.options.positionClass = 'toast-bottom-full-width';
      toastr.success("{{ Session::get('message') }}");
  });
  </script>
  @endif

  @if(Session::has('wrong'))
  <script>
    $(function() {
      toastr.options.positionClass = 'toast-bottom-full-width';
      toastr.error("{{ Session::get('wrong') }}");
  });
  </script>
  @endif

  @if(Session::has('error'))
  <script>
    $(function() {
      toastr.options.positionClass = 'toast-bottom-full-width';
      toastr.error("{{ Session::get('error') }}");
  });
  </script>
  @endif

  <script>
    $("#nohp_code,#notelp_code").intlTelInput({
      initialCountry:"id",
      preferredCountries: ["id"],
    });

    $.each($('input[type=text]'),function(){
      var str = $(this).val().replace('&amp;', '&');
      $(this).val(str);
    });
  </script>

  @if (Auth::check())
  <script>
    /*
     *   this script is for manage the logout of timeout
     *   if user is inactive for x min
     *   he will be logout : 
     *
     * */
      var logout = 'Are you sure to logout?';
      var timeout = ({{config('session.lifetime')}} * 60000) -10 ;
      var url =  "{{route('login')}}"; // route path;

      setTimeout(function(){
        $.ajax({
          cache: false,
          url: url,
          type: "GET",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          },
          contentType: false,
          processData: false,
          success: function (response) {
            window.location.reload(1);
            window.location.href = url;
          }
        });
      }, timeout);
  </script>
  @endif

  <!-- Load invoice belum dibayar untuk top-marquee -->
  <script defer>
    $(function () {
      $("#unpaid_invoice").html('');
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
      });
      $.ajax({
        url: "{{url('api/unpaidInvoice')}}",
        method: 'get',
        data: {},
        success: function(result){
          result.forEach(el => {
            let g_total = number_format(el.grand_total, 2, '.', ',');
            $("#unpaid_invoice").append(`<span>${el.inv_no} ${el.cust_id} - ${el.cust_name} ${g_total} BELUM DIBAYAR | </span>`)
          });
        },
        error: function (e) {
          console.log(e);
        }
      });
    });
  </script>

</body>

</html>