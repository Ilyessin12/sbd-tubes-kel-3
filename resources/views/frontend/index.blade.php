@extends('frontend.layout')
@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
  <!-- Display Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
  <div class="container">
    <h1>Selamat Datang di GOR Seling!</h1>
    <h2>Melayani dan Menjembatani</h2>
    @guest
    <a href="{{route('login')}}" class="btn-get-started scrollto">Booking Sekarang</a>
    @endguest
    @auth
    <a href="{{route('frontend.booking')}}" class="btn-get-started scrollto">Booking Sekarang</a>
    @endauth
  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- ======= Why Us Section ======= -->
  <section id="why-us" class="why-us">
    <div class="container">

      <div class="row">
        <div class="col-lg-4 d-flex align-items-stretch">
          <div class="content">
            <h3>Mengapa pilih GOR Seling?</h3>
            <p>
              1001 alasan untuk memilih kami
            </p>
            <div class="text-center">
              <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-8 d-flex align-items-stretch">
          <div class="icon-boxes d-flex flex-column justify-content-center">
            <div class="row">
              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0">
                  <i class="bx bx-receipt"></i>
                  <h4>Cepat</h4>
                  <p>Layanan kami gerak cepat</p>
                </div>
              </div>
              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0">
                  <i class="bx bx-cube-alt"></i>
                  <h4>Bersih</h4>
                  <p>Fasilitas-fasilitas yang Kami Sediakan Dijamin higienis</p>
                </div>
              </div>
              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0">
                  <i class="bx bx-images"></i>
                  <h4>Bersahabat</h4>
                  <p>Staff kami sangat ramah</p>
                </div>
              </div>
            </div>
          </div><!-- End .content-->
        </div>
      </div>

    </div>
  </section><!-- End Why Us Section -->

  <!-- ======= About Section =======
  <section id="about" class="about">
    <div class="container-fluid">

      <div class="row">
        <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
          <a href="" class="glightbox play-btn mb-4"></a>
        </div>

        <div
          class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
          <h3>KitSakit, rumah sakit berpengalaman yang akan menjadi solusi segala penyakit anda :</h3>
          <p>Tugas KitSakit, lebih daripada itu. Kucing atas pokok, kerbau masuk parit, kuda terlepas, ular dalam
            rumah... Semua kami selamatkan</p>

          <div class="icon-box">
            <div class="icon"><i class="bx bx-fingerprint"></i></div>
            <h4 class="title"><a href="">Cepat</a></h4>
            <p class="description">Tenaga medis kami sangat satset</p>
          </div>

          <div class="icon-box">
            <div class="icon"><i class="bx bx-gift"></i></div>
            <h4 class="title"><a href="">Tepat</a></h4>
            <p class="description">Tenaga medis kami tidak mungkin salah diagnosis (kayaknya)</p>
          </div>

          <div class="icon-box">
            <div class="icon"><i class="bx bx-atom"></i></div>
            <h4 class="title"><a href="">Bersahabat</a></h4>
            <p class="description">Tenaga medis kami sok asik</p>
          </div>

        </div>
      </div>

    </div>
  </section> End About Section -->

  <!-- ======= Obat Section =======
  <section id="obat" class="services">
    <div class="container">

      <div class="section-title">
        <h2>Obat</h2>
        <p>Obat-obat gacor</p>
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-4 d-flex align-items-stretch mt-4 mt-mg-0">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{asset('assets/img/obat/amoxicillin.jpeg')}}" alt="Obat">
            <div class="card-body">
              <h5 class="card-title">Amoksisilin</h5>
              <p class="card-text">Antibiotik untuk infeksi bakteri</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><b>Harga: </b>Rp119.900</li>
              <li class="list-group-item"><b>Stok: </b>24</li>
            </ul>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 d-flex align-items-stretch mt-4 mt-mg-0">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{asset('assets/img/obat/paracetamol.jpeg')}}" alt="Obat">
            <div class="card-body">
              <h5 class="card-title">Paracetamol</h5>
              <p class="card-text">Untuk mengatasi demam dan sakit</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><b>Harga: </b>Rp20.000</li>
              <li class="list-group-item"><b>Stok: </b>30</li>
            </ul>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 d-flex align-items-stretch mt-4 mt-mg-0">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{asset('assets/img/obat/ibuprofen.jpeg')}}" alt="Obat">
            <div class="card-body">
              <h5 class="card-title">Ibuprofen</h5>
              <p class="card-text">Untuk mengatasi rasa sakit, peradangan, dan demam</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><b>Harga: </b>Rp40.000</li>
              <li class="list-group-item"><b>Stok: </b>20</li>
            </ul>
          </div>
        </div>

      </div>

    </div>
  </section> End Obat Section -->

  <!-- ======= Doctors Section =======
  <section id="doctors" class="doctors section-bg">
    <div class="container">

      <div class="section-title">
        <h2>Dokter</h2>
        <p>Dokter - dokter unyuuuu</p>
      </div>

      <div class="row">

        <div class="col-lg-6">
          <div class="member d-flex align-items-center">
            <div class="pic"><img src="{{asset('assets/img/doctors/doctors-1.jpg')}}" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Ucup Sutrisno</h4>
              <p>Neurologist</p>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="member d-flex align-items-center">
            <div class="pic"><img src="{{asset('assets/img/doctors/doctors-2.jpg')}}" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Siti Sukijan</h4>
              <p>ER Specialist</p>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="member d-flex align-items-center">
            <div class="pic"><img src="{{asset('assets/img/doctors/doctors-3.jpg')}}" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Dimas Anjaymabar</h4>
              <p>Orthopedic Surgeon</p>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section> End Doctors Section -->
</main>
@endsection