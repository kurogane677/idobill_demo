@extends('internet.layout')

@section('content')
    
        <!-- ======= Tech Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
          
              <div class="row">
                <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    <h3>Grahanet Internet Bisnis</h3>
                    <p>Internet untuk perkantoran dengan teknologi terbaru serta menggunakan infrastruktur Fiber Optik yang mencakup area Jabodetabek dan Batam . Stabil, cepat, minim down time dan terdapat BOD (Bandwidth on Demand) jika diminta.</p>
        
                    <div class="container skills" data-aos="fade-up">
                    <div class="col-lg-12">
                        <div class="progress">
                            <span class="skill">SLA <i class="val">99%</i></span>
                            <div class="progress-bar-wrap">
                              <div class="progress-bar" role="progressbar" aria-valuenow="99" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                      <div class="progress">
                        <span class="skill">Respond Support <i class="val">97%</i></span>
                        <div class="progress-bar-wrap">
                          <div class="progress-bar" role="progressbar" aria-valuenow="97" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>

                      
                      <div class="progress">
                        <span class="skill">Custom & Upgrade Speed <i class="val">98%</i></span>
                        <div class="progress-bar-wrap">
                          <div class="progress-bar" role="progressbar" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                    </div>
        
                    <a href="{{url('https://wa.me/6285641148885')}}" class="btn btn-primary" style="text-decoration: none; max-width: 11em;">Pesan langsung <span class="bi bi-arrow-right"></span></a>
                </div>
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                    <img src="{{asset('assets/img/super.png') }}" class="img-fluid" alt="">
                </div>
                </div>
          
            </div>
        </section>
<!-- End Tech Section -->
@endsection