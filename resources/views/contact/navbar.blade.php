  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:cs@idobill.com" style="text-decoration: none;">cs@idobill.com</a></i>
        <i class="bi bi-whatsapp d-flex align-items-center ms-4"><a href="https://wa.me/6281914000665" style="text-decoration: none;"><span>Tech WhatsApp</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="https://wa.me/6285641148885" style="text-decoration: none;"><i class="bi bi-info-circle"> Partnership RT/RW Net.</i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/grahanet.official/" class="instagram"><i class="bi bi-instagram"></i></a>
        {{-- <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a> --}}
      </div>
    </div>
  </section>
  <!-- ======= END Top Bar ======= -->

<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
  <div class="container d-flex align-items-center justify-content-between">

    {{-- <h1 class="logo"><a href="#"><img src="{{asset('images/grahakomindo_logo.png') }}"/></a></h1> --}}
    <!-- Uncomment below if you prefer to use an image logo -->
    <a href="#" class="logo"><img src="{{asset('images/grahakomindo_logo.png') }}" alt=""></a>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto" href="{{url('/')}}">Home</a></li>
        <li class="dropdown"><a class="nav-link scrollto" href="#">About Us<i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a class="nav-link scrollto" href="#">Partnership</a></li>
            <li><a class="nav-link scrollto" href="{{url('/staff')}}">Our Team</a></li>
          </ul>
        </li>
        <li class="dropdown"><a class="nav-link scrollto" href="#">Products<i class="bi bi-chevron-down"></i></a>
          <ul>
            <li class="dropdown"><a class="nav-link scrollto" href="#"><span>Super Internet</span> <i class="bi bi-chevron-right"></i></a>
              <ul>
                <li><a style="text-decoration: none;" href="{{url('/apart')}}">Internet Apartemen</a></li>
                <li><a style="text-decoration: none;" href="{{url('/bisnis')}}">Internet Bisnis</a></li>
                <li><a style="text-decoration: none;" href="{{url('/desa')}}">Internet Desa</a></li>
              </ul>
            </li>
            <li><a style="text-decoration: none;" href="{{url('/tv-cable')}}">TV Cable</a></li>
          </ul>
        </li>
        <li><a class="nav-link scrollto " href="#">Gallery</a></li>
        <li class="dropdown"><a class="nav-link active" href="#">Support  <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="#" class="nav-link scrollto" style="text-decoration: none;">Speedtest</a></li>
            <li><a href="{{url('/contact')}}" class="nav-link scrollto active" style="text-decoration: none;">Contact</a></li>
          </ul>
        </li>
        {{-- <li>
      <a class="nav-link scrollto btn btn-primary" style="color: #fff;" href="{{url('/dashboard')}}">Login</a>
        </li> --}}
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
  </div>
</header>
<!-- End Header -->