@extends('layouts.gate')

@section('content')
<div class="container h-100">
  <div class="d-flex align-items-center justify-content-center flex-row h-100">

    <div class="user_card-register flex-1">
      <div class="d-flex justify-content-center">
        <div class="brand_logo_container">
          <img src="{{ asset('images/logo_erb.png') }}" class="brand_logo shadow" alt="Logo" style="background-color: white" />
        </div>
      </div>

      <div class="d-flex justify-content-center form_container">

        <form method="POST" action="{{ route('register') }}">
          @csrf

          <!-- First Name -->
          <div class="input-group mb-1">
            <div class="input-group-append">
              <span class="input-group-text">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-lines-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7 1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm2 9a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                </svg>
              </span>
            </div>
            <input id="name" class="form-control input_user" type="text" name="name" :value="old('name')" placeholder="{{ __('Name') }}" required autofocus autocomplete="name" />
          </div>

          <!-- Email -->
          <div class="input-group mb-3">
            <div class="input-group-append">
              <span class="input-group-text">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
                </svg>
              </span>
            </div>
            <input id="email" class="form-control input_user" type="email" name="email" :value="old('email')" placeholder="{{ __('Email') }}" required />
          </div>

          <!-- Password -->
          <div class="input-group mb-1">
            <div class="input-group-append">
              <span class="input-group-text">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-key-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                </svg>
              </span>
            </div>
            <input id="password" class="form-control input_pass" type="password" name="password" placeholder="{{ __('Password') }}" required autocomplete="new-password" />
          </div>

          <!-- Confirm Password -->
          <div class="input-group mb-2">
            <div class="input-group-append">
              <span class="input-group-text">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-key-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                </svg>
              </span>
            </div>
            <input id="password_confirmation" class="form-control input_pass" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}" />
          </div>

          <!-- Register Button -->
          <div class="d-flex justify-content-center mt-3 login_container">
            <button type="submit" name="button" class="btn login_btn">Register Account</button>
          </div>
        </form>

      </div>

      <div class="mt-4 to-click">
        <div class="d-flex justify-content-center links">
          @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}">{{ __('Lupa password?') }}</a>
          @endif
        </div>
        <div class="d-flex justify-content-center links">
          {{ __('Sudah memiliki account?') }}
          <a href="{{ route('login') }}" class="ml-2">{{ __('Login') }}</a>
        </div>
      </div>

    </div>

    {{-- Munculkan Error --}}
    @if ($errors->any())
    <div class="flex-1 align-self-end">
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <div class="text-center">
          <strong>Registrasi tidak berhasil</strong> Silahkan di cek:
        </div>
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
    @endif

  </div>

</div>
@endsection