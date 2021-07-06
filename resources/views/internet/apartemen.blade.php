@extends('internet.layout')
@section('content')
    
<!-- ======= Banner Section ======= -->
<section id="hero" class="d-flex align-items-center">
  <div class="container" data-aos="zoom-out" data-aos-delay="100">
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

   <!-- ======= About Section ======= -->
   <section id="about" class="about ">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h3>GrahaNet Internet Apartemen</h3>
    </div>
        <div class="col-lg-12 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-left" data-aos-delay="100">
            <p>GrahaNet Internet Apartemen area Jakarta. Internet yang menggunakan jaringan Fiber Optik Triple Play dan pastinya kuota unlimited serta dapat melakukan custom connection jika di perlukan. Yuk segera berlangganan dengan cara klik tombol “Google Login” dan pilih paket yang anda. inginkan.</p>
        </div>
    </div>
  </section><!-- End About Section -->

  <section id="faq" class="faq section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>F.A.Q</h2>
        <h3>Frequently Asked <span>Questions</span></h3>
        <p>Pertanyaan yang mungkin akan Anda atau banyak orang tanyakan</p>
      </div>

      <div class="row justify-content-center">
        <div class="col-xl-10">
          <ul class="faq-list">

            <li>
              <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Bagaimana cara melihat produk GrahaNet? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
              <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                <p>
                    Untuk melihat produk kami, silahkan melakukan login dengan akun google anda dengan cara menekan tombol “Google Login”. Setelah berhasil melakukan login, silahkan memilih apartemen yang tersedia pada kolom yang tampil.</p>
              </div>
            </li>

            <li>
              <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Apakah terdapat promo? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
              <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                <p>
                    Silahkan menghubungi marketing kami di sini terkait ketersediaan promo </p>
              </div>
            </li>

            <li>
              <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Permintaan akses ke server tertentu (custom connection) <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
              <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                <p>
                    Anda dapat menanyakannya terlebih dahulu kepada marketing atau customer services kami, apakah request tersebut masih masuk dalam kriteria kami </p>
              </div>
            </li>

            <li>
              <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Bagaimana cara melakukan permbayaran registrasi baru? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
              <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                <p>
                    Setelah order kami terima, maka anda akan mendapatkan konfirmasi nomor virtual account dari finance grahanet</p>
              </div>
            </li>

            <li>
              <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Berapa lama instalasi paket setelah registrasi? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
              <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                <p>
                    Normalnya adalah 3 hari kerja setelah melakukan pembayaran</p>
              </div>
            </li>

            <li>
              <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">Bagaimana jika terjadi gangguan? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
              <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                <p>
                    Anda dapat menghubungi ke customer services 24 jam kami di telepon 02180683000  atau whatsapp ke tim support 24 jam di 081914000665 . </p>
              </div>
            </li>

          </ul>
        </div>
      </div>

    </div>
  </section><!-- End Frequently Asked Questions Section -->
@endsection