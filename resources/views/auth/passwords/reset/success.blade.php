@extends('layouts.gate')

@section('content')
<div class="container">

  <!-- Logo -->
  <div class="row d-flex justify-content-center mb-3">
    <div class="logo">
      <img src="{{ asset('images/grahakomindo_logo.png') }}" alt="grahakomindo_logo" />
    </div>
  </div>

  <div class="row justify-content-center mb-2">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <div class="h6">Reset Password Anda Berhasil!</div>
          <a href="/home" class="btn btn-sm btn-primary">HOME</a>
        </div>
      </div>
    </div>
  </div>

  <div class="row d-flex justify-content-center mb-5">
    <img style="width:150px;" src="{{ asset('images/happy_friends.png') }}" alt="happy_friends" />
  </div>

</div>
@endsection