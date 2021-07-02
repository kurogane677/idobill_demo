@extends('layouts.gate')

@section('content')

<div class="container">

  <form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Logo -->
    <div class="row d-flex justify-content-center my-5">
      <div class="logo">
        <img src="{{ asset('images/grahakomindo_logo.png') }}" alt="grahakomindo_logo" />
      </div>
    </div>

    <!-- Email address -->
    <div class="row d-flex justify-content-center">
      <div class="col-5">
        <div class="d-flex align-items-center">
          <div class="input-icon">
            <svg width="1rem" height="1rem" viewBox="0 0 16 16" class="bi bi-person-fill" fill="skyblue" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
            </svg>
          </div>
          {{-- <input id="user_id" class="form-control shadow" type="text" name="user_id" value="{{old('user_id')}}" placeholder="{{ __('Email address') }}" required autofocus /> --}}

          <input id="login" type="text" class="form-control" name="login" value="{{ old('user_id') ?: old('email') }}" placeholder="{{ __('Email/ID Pelanggan') }}" required autofocus>

        </div>
      </div>
    </div>

    <!-- Password -->
    <div class="row d-flex justify-content-center mt-3">
      <div class="col-5">
        <div class="d-flex align-items-center">
          <div class="input-icon">
            <svg width="1rem" height="1rem" viewBox="0 0 16 16" class="bi bi-key-fill" fill="skyblue" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
            </svg>
          </div>
          <input id="password" class="form-control shadow" type="password" name="password" placeholder="{{ __('Password') }}" required autofocus />
        </div>
      </div>
    </div>

    <!-- Remember me & Login Button -->
    <div class="row d-flex justify-content-center mt-3">
      <div class="col-5 d-flex justify-content-between align-items-center">
        <div class="custom-control custom-checkbox">
          <input id="remember_me" type="checkbox" class="custom-control-input" name="remember" />
          <label for="remember_me" class="custom-control-label">Remember me</label>
        </div>
        <div>
          <a href="{{ url('/password/reset') }}" class="btn btn-sm btn-danger shadow">Lupa password ?</a>
          <button type="submit" name="button" class="btn btn-sm btn-success shadow ml-2">Login</button>
        </div>
      </div>
    </div>

    <div class="row d-flex justify-content-center mt-5">
      <a href="{{ url('/') }}" class="btn btn-sm btn-primary shadow">Kembali ke Halaman Utama</a>
    </div>

    <!-- Munculkan Error -->
    @if ($errors->any())
    <div class="row d-flex justify-content-center mt-5">
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Login gagal.</strong> Email/ID atau password salah, silahkan periksa Email/ID atau password anda.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
    @endif
</div>

</form>
</div>



@endsection