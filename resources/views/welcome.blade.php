@extends('welcome.layout')

@section('content')
    
<!-- ======= Banner Section ======= -->
<section id="hero" class="d-flex align-items-center">
  <div class="container" data-aos="zoom-out" data-aos-delay="100">
    <h1>Welcome to <span>iDoBill</span></h1>
    <h2>Solusi terbaik untuk kebutuhan Internet, TV dan Telepon</h2>
    <div class="d-flex">
      <a href="#" class="btn-get-started scrollto">Get Started</a>
      <a href="{{ asset('video/transvision-grahakomindo.mp4') }}" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
      {{-- <video autoplay muted loop id="myVideo">
        <source src="{{ asset('video/transvision-grahakomindo.mp4') }}" type="video/mp4">
        </video> --}}
      </div>
    </div>
  </section>
  <!-- End Banner -->
  @endsection

  @section('card')
    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
        <div class="container" data-aos="fade-up">
            <div class="row" style="cursor: default;">
                <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bi bi-inboxes-fill" style="font-size: 2rem;"></i></div>
                        <h4 class="title">Great Advices</a></h4>
                        <p class="description">Solusi terbaik untuk kebutuhan Internet, TV dan Telepon</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                      <div class="icon"><i class="bi bi-headset" style="font-size: 2rem;"></i></div>
                    <h4 class="title">24/7 Support</h4>
                    <p class="description">Technical support 24 jam x 7 hari adalah prioritas kami untuk anda</p>
                  </div>
                </div>
        
                <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                  <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                  <div class="icon"><i class="bx bx-tachometer"></i></div>
                  <h4 class="title">Optimal Choice</h4>
                  <p class="description">Teknologi up to date demi kenyamanan dalam digital surfing</p>
                </div>
           </div>
        </div>
      </div>
    </section>
    <!-- End Featured Services Section -->
@endsection

  <!-- ***** Header Area Start ***** -->
  {{-- <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="#" class="logo">iDoBill</a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#welcome" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="#about">About</a></li>
              <li class="scroll-to-section"><a href="#services">Services</a></li>
              <li class="scroll-to-section"><a href="#frequently-question">Frequently Questions</a></li>
              <li class="submenu">
                <a href="javascript:;">Drop Down</a>
                <ul>
                  <li><a href="">About Us</a></li>
                  <li><a href="">Features</a></li>
                  <li><a href="">FAQ's</a></li>
                  <li><a href="">Blog</a></li>
                </ul>
              </li>
              <li class="scroll-to-section"><a href="#contact-us">Contact Us</a></li>
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header> --}}
  <!-- ***** Header Area End ***** -->

  <!-- ***** Welcome Area Start ***** -->
  {{-- <div class="welcome-area" id="welcome"> --}}
    <!-- The video -->



    <!-- Optional: some overlay text to describe the video -->
    {{-- <div class="content text-center">
      <p>Di iDoBill anda bisa memanage pelanggan dan invoice anda!</p>
      <a href="/dashboard" class="main-button-slider">Login Sekarang</a>
    </div> --}}

    <!-- ***** Header Text Start ***** -->
    {{-- <div class="header-text">
      <div class="container">
        <div class="row">
          <div class="left-text col-lg-4 col-md-4 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
            <h5 class="text-white mb-3">Daftar sekarang dan rasakan manfaatnya!</h5>
            <a href="/dashboard" class="main-button-slider">Login</a>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
            <video autoplay muted loop id="myVideo">
              <source src="{{ asset('video/transvision-grahakomindo.mp4') }}" type="video/mp4">
            </video>
            {{-- <img src="{{ asset('welcome/images/slider-icon.png') }}" class="rounded img-fluid d-block mx-auto" alt="First Vector Graphic"> --}}
          {{-- </div>
        </div>
      </div>
    </div> --}}
    <!-- ***** Header Text End ***** -->
  {{-- </div> --}}
  <!-- ***** Welcome Area End ***** -->


  <!-- ***** Features Big Item Start ***** -->
  {{-- <section class="section" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 col-md-12 col-sm-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
          <img src="{{ asset('welcome/images/left-image.png') }}" class="rounded img-fluid d-block mx-auto" alt="App">
        </div>
        <div class="right-text col-lg-5 col-md-12 col-sm-12 mobile-top-fix">
          <div class="left-heading">
            <h5>Vivamus sodales nisi id ante molestie venenatis</h5>
          </div>
          <div class="left-text">
            <p>This template is <a href="#">last updated on 20 August 2019 </a>for main menu drop-down arrow and sub menu text color. Duis auctor dolor eu scelerisque vestibulum. Vestibulum lacinia, nisl sit amet tristique condimentum. <br><br>
              Sed a consequat velit. Morbi lectus sapien, vestibulum et sapien sit amet, ultrices malesuada odio. Donec non quam euismod, mattis dui a, ultrices nisi.</p>
            <a href="#about2" class="main-button">Discover More</a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="hr"></div>
        </div>
      </div>
    </div>
  </section> --}}
  <!-- ***** Features Big Item End ***** -->


  <!-- ***** Features Big Item Start ***** -->
  {{-- <section class="section" id="about2">
    <div class="container">
      <div class="row">
        <div class="left-text col-lg-5 col-md-12 col-sm-12 mobile-bottom-fix">
          <div class="left-heading">
            <h5>Curabitur aliquam eget tellus id porta</h5>
          </div>
          <p>Proin justo sapien, posuere suscipit tortor in, fermentum mattis elit. Aenean in feugiat purus.</p>
          <ul>
            <li>
              <img src="{{ asset('welcome/images/about-icon-01.png') }}" alt="">
              <div class="text">
                <h6>Nulla ultricies risus quis risus</h6>
                <p>You can use this website template for commercial or non-commercial purposes.</p>
              </div>
            </li>
            <li>
              <img src="{{ asset('welcome/images/about-icon-02.png') }}" alt="">
              <div class="text">
                <h6>Donec consequat commodo purus</h6>
                <p>You have no right to re-distribute this template as a downloadable ZIP file on any website.</p>
              </div>
            </li>
            <li>
              <img src="{{ asset('welcome/images/about-icon-03.png') }}" alt="">
              <div class="text">
                <h6>Sed placerat sollicitudin mauris</h6>
                <p>If you have any question or comment, please <a rel="nofollow" href="https://templatemo.com/contact">contact</a> us on TemplateMo.</p>
              </div>
            </li>
          </ul>
        </div>
        <div class="right-image col-lg-7 col-md-12 col-sm-12 mobile-bottom-fix-big" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
          <img src="{{ asset('welcome/images/right-image.png') }}" class="rounded img-fluid d-block mx-auto" alt="App">
        </div>
      </div>
    </div>
  </section> --}}
  <!-- ***** Features Big Item End ***** -->


  <!-- ***** Features Small Start ***** -->
  {{-- <section class="section" id="services">
    <div class="container">
      <div class="row">
        <div class="owl-carousel owl-theme">
          <div class="item service-item">
            <div class="icon">
              <i><img src="{{asset('welcome/images/service-icon-01.png')}}" alt=""></i>
            </div>
            <h5 class="service-title">First Box Service</h5>
            <p>Aenean vulputate massa sed neque consectetur, ac fringilla quam aliquet. Sed a enim nec eros tempor cursus at id libero.</p>
            <a href="#" class="main-button">Read More</a>
          </div>
          <div class="item service-item">
            <div class="icon">
              <i><img src="{{asset('welcome/images/service-icon-02.png')}}" alt=""></i>
            </div>
            <h5 class="service-title">Second Box Title</h5>
            <p>Pellentesque vitae urna ut nisi viverra tristique quis at dolor. In non sodales dolor, id egestas quam. Aliquam erat volutpat. </p>
            <a href="#" class="main-button">Discover More</a>
          </div>
          <div class="item service-item">
            <div class="icon">
              <i><img src="{{asset('welcome/images/service-icon-03.png')}}" alt=""></i>
            </div>
            <h5 class="service-title">Third Title Box</h5>
            <p>Quisque finibus libero augue, in ultrices quam dictum id. Aliquam quis tellus sit amet urna tincidunt bibendum.</p>
            <a href="#" class="main-button">More Detail</a>
          </div>
          <div class="item service-item">
            <div class="icon">
              <i><img src="{{asset('welcome/images/service-icon-02.png')}}" alt=""></i>
            </div>
            <h5 class="service-title">Fourth Service Box</h5>
            <p>Fusce sollicitudin feugiat risus, tempus faucibus arcu blandit nec. Duis auctor dolor eu scelerisque vestibulum.</p>
            <a href="#" class="main-button">Read More</a>
          </div>
          <div class="item service-item">
            <div class="icon">
              <i><img src="{{asset('welcome/images/service-icon-01.png')}}" alt=""></i>
            </div>
            <h5 class="service-title">Fifth Service Title</h5>
            <p>Curabitur aliquam eget tellus id porta. Proin justo sapien, posuere suscipit tortor in, fermentum mattis elit.</p>
            <a href="#" class="main-button">Discover</a>
          </div>
          <div class="item service-item">
            <div class="icon">
              <i><img src="{{asset('welcome/images/service-icon-03.png')}}" alt=""></i>
            </div>
            <h5 class="service-title">Sixth Box Title</h5>
            <p>Ut nibh velit, aliquam vitae pellentesque nec, convallis vitae lacus. Aliquam porttitor urna ut pellentesque.</p>
            <a href="#" class="main-button">Detail</a>
          </div>
          <div class="item service-item">
            <div class="icon">
              <i><img src="{{asset('welcome/images/service-icon-01.png')}}" alt=""></i>
            </div>
            <h5 class="service-title">Seventh Title Box</h5>
            <p>Sed a consequat velit. Morbi lectus sapien, vestibulum et sapien sit amet, ultrices malesuada odio. Donec non quam.</p>
            <a href="#" class="main-button">Read More</a>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
  <!-- ***** Features Small End ***** -->


  <!-- ***** Frequently Question Start ***** -->
  {{-- <section class="section" id="frequently-question">
    <div class="container">
      <!-- ***** Section Title Start ***** -->
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>Frequently Asked Questions</h2>
          </div>
        </div>
        <div class="offset-lg-3 col-lg-6">
          <div class="section-heading">
            <p>Vivamus venenatis eu mi ac mattis. Maecenas ut elementum sapien. Nunc euismod risus ac lobortis congue. Sed erat quam.</p>
          </div>
        </div>
      </div> --}}
      <!-- ***** Section Title End ***** -->

      {{-- <div class="row">
        <div class="left-text col-lg-6 col-md-6 col-sm-12">
          <h5>Class aptent taciti sociosqu ad litora torquent per conubia</h5>
          <div class="accordion-text">
            <p>Curabitur placerat diam in risus lobortis, laoreet porttitor est elementum. Nulla ultricies risus quis risus scelerisque, a aliquam tellus maximus. Cras pretium nulla ac convallis iaculis. Aenean bibendum erat vitae odio sodales, in facilisis tellus volutpat.</p>
            <p>Sed lobortis pellentesque magna ac congue. Suspendisse quis molestie magna, id eleifend ex. Ut mollis ultricies diam nec dictum. Morbi commodo hendrerit mi vel vulputate. Proin non tincidunt dui. Lorem ipsum dolor sit amet.</p>
            <span>Email: <a href="#">email@company.com</a><br></span>
            <a href="#contact-us" class="main-button">Contact Us</a>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="accordions is-first-expanded">
            <article class="accordion">
              <div class="accordion-head">
                <span>First Common Question</span>
                <span class="icon">
                  <i class="icon fa fa-chevron-right"></i>
                </span>
              </div>
              <div class="accordion-body">
                <div class="content">
                  <p>Duis vulputate porttitor urna sit amet pretium. Phasellus sed pulvinar eros, condimentum consequat ex. Suspendisse potenti.
                    <br><br>
                    Pellentesque maximus lorem sed elit imperdiet mattis. Duis posuere mauris ut eros rutrum sodales. Aliquam erat volutpat.</p>
                </div>
              </div>
            </article>
            <article class="accordion">
              <div class="accordion-head">
                <span>Second Question Answer</span>
                <span class="icon">
                  <i class="icon fa fa-chevron-right"></i>
                </span>
              </div>
              <div class="accordion-body">
                <div class="content">
                  <p>Sed odio elit, cursus sed consequat at, rutrum eget augue. Cras ac eros iaculis, tempor quam sit amet, scelerisque mi. Quisque eu risus eget nunc porttitor vestibulum at a ante.
                    <br><br>
                    Praesent ut placerat turpis, vel pellentesque dolor. Sed rutrum eleifend tortor, eu luctus orci sagittis in. In blandit fringilla mollis.</p>
                </div>
              </div>
            </article>
            <article class="accordion">
              <div class="accordion-head">
                <span>Third Answer for you</span>
                <span class="icon">
                  <i class="icon fa fa-chevron-right"></i>
                </span>
              </div>
              <div class="accordion-body">
                <div class="content">
                  <p>Proin feugiat ante ut vulputate rutrum. Nam quis erat turpis. Nullam maximus pharetra lorem, eu condimentum est iaculis ut. Pellentesque mattis ultrices dignissim.
                    <br><br>
                    Etiam et enim finibus, feugiat massa efficitur, finibus sapien. Sed cursus lacus quis arcu scelerisque, eget ornare risus maximus. Aenean non lectus id odio rhoncus pharetra.</p>
                </div>
              </div>
            </article>
            <article class="accordion">
              <div class="accordion-head">
                <span>Fourth Question Asked</span>
                <span class="icon">
                  <i class="icon fa fa-chevron-right"></i>
                </span>
              </div>
              <div class="accordion-body">
                <div class="content">
                  <p>Phasellus eu purus ornare, eleifend orci nec, egestas nulla. Sed sed aliquet sapien. Proin placerat, ipsum eu posuere blandit, tellus quam consectetur nisi, id sollicitudin diam ex at nisi.
                    <br><br>
                    Aenean fermentum eget turpis egestas semper. Sed finibus mollis venenatis. Praesent at sem in massa iaculis pharetra.</p>
                </div>
              </div>
            </article>
            <article class="accordion">
              <div class="accordion-head">
                <span>Fifth Ever Question</span>
                <span class="icon">
                  <i class="icon fa fa-chevron-right"></i>
                </span>
              </div>
              <div class="accordion-body">
                <div class="content">
                  <p>Quisque aliquet ipsum ut magna rhoncus, euismod lacinia elit rhoncus. Sed sapien elit, mollis ut ultricies quis, fermentum nec ante.
                    <br><br>
                    Sed nec ex nec tortor fermentum sollicitudin id ut ligula. Ut sagittis rutrum lectus, non sagittis ante euismod eu. </p>
                </div>
              </div>
            </article>
            <article class="accordion">
              <div class="accordion-head">
                <span>Sixth Sense Question</span>
                <span class="icon">
                  <i class="icon fa fa-chevron-right"></i>
                </span>
              </div>
              <div class="accordion-body">
                <div class="content">
                  <p>Suspendisse potenti. Ut dapibus leo ut massa vulputate semper. Pellentesque maximus lorem sed elit imperdiet mattis. Duis posuere mauris ut eros rutrum sodales. Aliquam erat volutpat.</p>
                </div>
              </div>
            </article>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
  <!-- ***** Frequently Question End ***** -->


  <!-- ***** Contact Us Start ***** -->
  {{-- <section class="section" id="contact-us">
    <div class="container-fluid">
      <div class="row">
        <!-- ***** Contact Map Start ***** -->
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div id="map"> --}}
            <!-- How to change your own map point
                           1. Go to Google Maps
                           2. Click on your location point
                           3. Click "Share" and choose "Embed map" tab
                           4. Copy only URL and paste it within the src="" field below
                    -->
            {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1197183.8373802372!2d-1.9415093691103689!3d6.781986417238027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdb96f349e85efd%3A0xb8d1e0b88af1f0f5!2sKumasi+Central+Market!5e0!3m2!1sen!2sth!4v1532967884907" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe> --}}
          {{-- </div>
        </div> --}}
        <!-- ***** Contact Map End ***** -->

        <!-- ***** Contact Form Start ***** -->
        {{-- <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="contact-form">
            <form id="contact" action="" method="post">
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <fieldset>
                    <input name="name" type="text" id="name" placeholder="Full Name" required="" class="contact-field">
                  </fieldset>
                </div>
                <div class="col-md-6 col-sm-12">
                  <fieldset>
                    <input name="email" type="text" id="email" placeholder="E-mail" required="" class="contact-field">
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <textarea name="message" rows="6" id="message" placeholder="Your Message" required="" class="contact-field"></textarea>
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <button type="submit" id="form-submit" class="main-button">Send It</button>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- ***** Contact Form End ***** -->
      </div>
    </div>
  </section> --}}
  <!-- ***** Contact Us End ***** -->


  
  {{-- <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> --}}


  {{-- <link rel="stylesheet" href="{{ asset('welcome/css/owl-carousel.css') }}" /> --}}

  <!-- jQuery -->
  {{-- <script src="{{asset('welcome/js/jquery-2.1.0.min.js')}}"></script> --}}

  <!-- Bootstrap -->
  {{-- <script src="{{asset('welcome/js/popper.js')}}"></script> --}}
  {{-- <script src="{{asset('welcome/js/bootstrap.min.js')}}"></script> --}}

  <!-- Plugins -->
  {{-- <script src="{{asset('welcome/js/owl-carousel.js')}}"></script> --}}
  {{-- <script src="{{asset('welcome/js/scrollreveal.min.js')}}"></script> --}}
  {{-- <script src="{{asset('welcome/js/waypoints.min.js')}}"></script> --}}
  {{-- <script src="{{asset('welcome/js/jquery.counterup.min.js')}}"></script> --}}
  {{-- <script src="{{asset('welcome/js/imgfix.min.js')}}"></script> --}}

  <!-- Global Init -->
  {{-- <script src="{{asset('welcome/js/custom.js')}}"></script> --}}

  
  
</body>

</html>