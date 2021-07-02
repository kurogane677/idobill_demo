@extends('layouts.app')

@section('content')

<div class="h500px flex-center flex-column">
  <div class="flex-center">
    <img src="{{ asset('images/warning.png') }}" class="w60px mr-4" alt="Warning" />
    <h4 class="display-6">You are not the owner of this profile!</h4>
  </div>
  <a href="{{url('/dashboard')}}" class="btn btn-sm btn-dark mt-3">Kembali</a>
</div>

@endsection