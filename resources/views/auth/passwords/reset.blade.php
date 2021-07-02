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
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Reset Password</div>

        <div class="card-body">
          <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <!-- Email address -->
            <div class="row d-flex justify-content-center">
              <span class="text-center">Silahkan masukkan password anda yang baru untuk mengganti password anda yang lama.</span>
              <div class="col-10 mt-2">
                <div class="d-flex align-items-center">
                  <div class="input-icon">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="skyblue" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg>
                  </div>
                  <input id="email" class="form-control shadow @error('email') is-invalid @enderror" type="email" name="email" value="{{ $email ?? old('email') }}" placeholder="{{ __('Email address') }}" required autocomplete="email" readonly />
                </div>
              </div>
            </div>

            {{-- <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
        </div> --}}


        <!-- Password -->
        <div class="row d-flex justify-content-center mt-2">
          <div class="col-10">
            <div class="d-flex align-items-center">
              <div class="input-icon bg-skyblue">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-key-fill" fill="white" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                </svg>
              </div>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autofocus autocomplete="new-password" placeholder="Password">
            </div>
          </div>
          @error('password')
          <span class="invalid-feedback text-right" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        {{-- <div class="form-group row">
          <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-6">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">


        </div>
      </div> --}}

      <!-- Konfirmasi Password -->
      <div class="row d-flex justify-content-center mt-2">
        <div class="col-10">
          <div class="d-flex align-items-center">
            <div class="input-icon bg-skyblue">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-key-fill" fill="white" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
              </svg>
            </div>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Password">
          </div>
        </div>
        @error('password_confirmation')
        <span class="invalid-feedback text-right" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror

      </div>


      {{-- <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

      <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
      </div>
    </div> --}}

    <!-- Buttons -->
    <div class="row d-flex justify-content-center mt-3">
      <div class="col-10 text-right">
        <button type="submit" class="btn btn-sm ml-2 btn-primary shadow">
          {{ __('Reset Password') }}
        </button>
      </div>
    </div>

    {{-- <div class="form-group row mb-0">
      <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
          {{ __('Reset Password') }}
    </button>
  </div>
</div> --}}
</form>
</div>
</div>
</div>
</div>
</div>
@endsection