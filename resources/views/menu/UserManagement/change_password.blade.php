{{-- @extends('menu.custom_layout_menu')
<!-- Content Section -->
@section('content')
<!-- Munculkan Error -->
@include('Navigations.alert')


@section('menu-header')
<h5 class="pt-2">Ganti Password</h5>
@endsection

@section('menu-body')


@endsection

<div class="container-fluid d-flex justify-content-center">
  <div class="col-8">
    <form method="POST" action="{{ route("dashboard.update", $profiles->user_id) }}">
@method("PUT")
@csrf
<div class="card shadow">
  <div class="card-header bg-danger d-flex justify-content-between align-items-center">
    <h5 class="text-white">Ganti Password</h5>
    <div class="d-flex align-items-center">
      <div class="input-group input-group-sm mb-2">
        <div class="input-group-prepend field170px">
          <span class="input-group-text field170px">USER ID</span>
        </div>
        <input type="text" class="form-control form-control-sm bg-dark text-white" value="{{ $profiles->user_id }}" name="user_id" readonly>
      </div>
    </div>
  </div>
  <div class="card-body">

    <h6 class="text-center my-4"><strong>Silahkan isi dengan password anda saat ini dan password baru anda.</strong></h6>

    <div class="row d-flex justify-content-center">
      <div class="col-8">
        <!-- Password Lama -->
        <div class="input-group input-group-sm mt-2 mb-4">
          <div class="input-group-prepend field170px">
            <span class="input-group-text field170px">Password Lama</span>
          </div>
          <input type="password" id="password_lama" name="password_lama" class="form-control form-control-sm @error('password_lama') is-invalid @enderror">
          @error('password_lama')
          <span class="invalid-feedback text-right" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <!-- Password Baru -->
        <div class="input-group input-group-sm mt-2 mb-4">
          <div class="input-group-prepend field170px">
            <span class="input-group-text field170px">Password Baru</span>
          </div>
          <input type="password" id="password_baru" name="password_baru" class="form-control form-control-sm @error('password_baru') is-invalid @enderror">
          @error('password_baru')
          <span class="invalid-feedback text-right" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <!-- Confirm Password -->
        <div class="input-group input-group-sm mt-2 mb-4">
          <div class="input-group-prepend field170px">
            <span class="input-group-text field170px">Konfirmasi Password</span>
          </div>
          <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-sm">
        </div>

      </div>
    </div>

  </div>
  <div class="card-footer d-flex justify-content-between align-items-center">
    <a href="/password/reset" class="btn btn-danger btn-sm">RESET PASSWORD</a>
    <div>
      <a href="{{ url()->previous() }}" class="btn btn-dark btn-sm">CANCEL</a>
      <button type="submit" class="btn btn-success btn-sm ml-3">SUBMIT</button>
    </div>
  </div>
</div>
</form>
</div>
</div>

@endsection


@section('scripts')

@if(Session::has('message'))
<script>
  $(function() {
    toastr.options.positionClass = 'toast-bottom-full-width';
    toastr.success("{{ Session::get('message') }}");
});
</script>
@endif

@endsection
--}}


@extends('menu.custom_layout_menu')

@section('form')
<form method="POST" action="{{ route("dashboard.update", $profiles->user_id) }}">
  @csrf
  @method("PUT")
  @endsection

  @section('menu-header')
  <h5 class="pt-2">Ganti Password</h5>
  @endsection

  @section('menu-body')
  <!-- Munculkan Error -->
  {{-- @include('Navigations.alert') --}}
  <h6 class="text-center my-4"><strong>Silahkan isi dengan password anda saat ini dan password baru anda.</strong></h6>

  <div class="row d-flex justify-content-center">
    <div class="col-8">
      <!-- Password Lama -->
      <div class="input-group input-group-sm mt-2 mb-4">
        <div class="input-group-prepend field170px">
          <span class="input-group-text field170px">Password Lama</span>
        </div>
        <input type="password" id="password_lama" name="password_lama" class="form-control form-control-sm @error('password_lama') is-invalid @enderror">
        @error('password_lama')
        <span class="invalid-feedback text-right" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <!-- Password Baru -->
      <div class="input-group input-group-sm mt-2 mb-4">
        <div class="input-group-prepend field170px">
          <span class="input-group-text field170px">Password Baru</span>
        </div>
        <input type="password" id="password" name="password" class="form-control form-control-sm @error('password') is-invalid @enderror">
        @error('password')
        <span class="invalid-feedback text-right" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <!-- Confirm Password -->
      <div class="input-group input-group-sm mt-2 mb-4">
        <div class="input-group-prepend field170px">
          <span class="input-group-text field170px">Konfirmasi Password</span>
        </div>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-sm">
      </div>

    </div>
  </div>
  @endsection

  @section('menu-footer')
  <a href="/dashboard" class="btn btn-dark btn-sm">Cancel</a>
  <a href="/password/reset" class="btn btn-danger btn-sm ml-3">Reset Password</a>
  <button type="submit" class="btn btn-success btn-sm ml-3">Submit</button>
  @endsection

  @section('close-form')
</form>
@endsection

@section('scripts')

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


@endsection