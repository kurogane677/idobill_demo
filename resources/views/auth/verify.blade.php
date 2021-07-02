@extends('layouts.gate')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          {{-- {{ __('Verify Your Email Address') }} --}}
          {{ __('Verifikasi email Anda') }}
        </div>

        <div class="card-body">
          @if (session('resent'))
          <div class="alert alert-success" role="alert">
            {{-- {{ __('A fresh verification link has been sent to your email address.') }} --}}
            {{ __('Link verifikasi baru telah dikirim ke email Anda.') }}
          </div>
          @endif

          {{-- {{ __('Before proceeding, please check your email for a verification link.') }} --}}
          {{ __('Sebelum memulai, silahkan periksa email anda untuk link verifikasi dari kami.') }}
          <br>
          <div class="mt-3 d-flex align-items-center">
            <span>
              {{-- {{ __('If you did not receive the email') }}, --}}
              {{ __('Atau jika Anda tidak menerimanya, ') }}
            </span>
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
              @csrf
              <button type="submit" class="btn btn-sm btn-success ml-2">
                {{-- {{ __('click here to request another') }} --}}
                {{ __('Click disini untuk mengirim email verifikasi sekali lagi') }}
              </button>.
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection