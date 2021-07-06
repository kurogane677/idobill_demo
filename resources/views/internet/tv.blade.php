@extends('internet.layout')
@section('content')
    
<section id="about" class="about section-bg">
    <div class="container" data-aos="fade-up">
        
        <div class="row">
            <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
                <img src="assets/img/about.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                {{-- <h3>Grahanet Internet Keren Bikin Hidupmu Makin Keren!</h3> --}}
                {{-- <p class="fst-italic">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua.
                </p> --}}
                <ul>
                    <li>
                        <div>
                            <h5>TV Cable GrahaNet</h5>
                            <p>Bekerja sama dengan provider TV di Indonesia.</p>
                            <a href="#" class="btn btn-primary" style="text-decoration: none;">Pelajari Selengkapnya <span class="bi bi-arrow-right"></span></a>
                        </div>
                    </li>
                </ul>
        </div>
    </div>
    
</div>
</section>
@endsection