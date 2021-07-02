@extends('layouts.gate')

@section('content')
<div class="container">
  <!-- Logo -->
  <div class="row d-flex justify-content-center my-5">
    <div class="logo">
      <img src="{{ asset('images/grahakomindo_logo.png') }}" alt="grahakomindo_logo" />
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">{{ __('Reset Password') }}</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <span>Anda lupa password ?, silahkan masukkan email anda yang telah terdaftar di sistem kami untuk mendapatkan link me-reset password di inbox email anda.</span>
            <!-- Email address -->
            <div class="row d-flex justify-content-center mt-2">
              <div class="col-10">
                <div class="d-flex align-items-center">
                  <div class="input-icon">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="skyblue" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg>
                  </div>
                  <input id="email" class="form-control shadow @error('email') is-invalid @enderror" type="email" name="email" value="{{old('email')}}" placeholder="{{ __('Email address') }}" required autofocus autocomplete="email" />
                </div>
              </div>
            </div>

            <!-- Buttons -->
            <div class="row d-flex justify-content-center mt-3">
              <div class="col-10 text-right">
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-dark shadow">
                  {{ __('Cancel') }}
                </a>
                <button type="submit" class="btn btn-sm ml-2 btn-primary shadow">
                  {{ __('Kirim Link Reset Password') }}
                </button>
              </div>
            </div>
          </form>

        </div>
      </div>
      <!-- Munculkan Error -->
      @if ($errors->any())
      <div class="row d-flex justify-content-center mt-5">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Maaf, email yang anda masukkan tidak/belum terdaftar, silahkan masukkan email yang lain.</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
      @endif
    </div>
  </div>
</div>
@endsection