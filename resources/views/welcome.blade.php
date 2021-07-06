@extends('welcome.layout')

@section('content')
    
<!-- ======= Banner Section ======= -->
<section id="hero" class="d-flex align-items-center">
  <div class="container" data-aos="zoom-out" data-aos-delay="100">
    <h1>Welcome to <span>iDoBill</span></h1>
    <h2>Solusi terbaik untuk kebutuhan Internet, TV dan Telepon</h2>
    <div class="d-flex">
      <a href="{{url('https://wa.me/6282213122686')}} " class="btn-get-started scrollto">Get Started</a>
      <a href="{{ asset('video/transvision-grahakomindo.mp4') }}" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
      {{-- <video autoplay muted loop id="myVideo">
        <source src="{{ asset('video/transvision-grahakomindo.mp4') }}" type="video/mp4">
        </video> --}}
      </div>
    </div>
  </section>
  <!-- End Banner -->
  @endsection

  