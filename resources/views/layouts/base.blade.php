@extends('layouts.app')

@section('page-title')
@yield('page-title')
@endsection

<!-- Content Section -->
@section('content')

@yield('isi')
@yield('modals')
@yield('scripts')

@endsection