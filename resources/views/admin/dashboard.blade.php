@extends('frontend.layout')
@section('content')
  <main id="main" style="padding-top: 70px;">

    <!-- ======= Rekam Medis Section ======= -->
    <section id="rekam_medis" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Rekam Medis</h2>
          <a href="" class="btn btn-success">+ Add Rekam Medis</a>
        </div>

        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pasien</th>
                    <th scope="col">Nama Dokter</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Diagnosa</th>
                    <th scope="col" width="200px">Catatan</th>
                    <th scope="col" width="150px">Resep Obat</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</td>
                    <td>...</td>
                    <td>...</td>
                    <td>...</td>
                    <td>...</td>
                    <td>...</td>
                    <td><a href="">Lihat Resep Obat</a></td>
                    <td>
                        <a href="" class="link-warning"><i class="bi bi-pencil-square">Edit</i></a>
                        <br>
                        <a href="" onclick="return confirm('Yakin Hapus?')" class="link-danger"><i class="bi bi-trash3">Delete</i></a>
                    </td>
                </tr>
            </tbody>
        </table>

      </div>
    </section><!-- Rekam Medis Section -->

    <!-- ======= Obat Section ======= -->
    <section id="obat" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Obat</h2>
          <a href="" class="btn btn-success">+ Add Obat</a>
        </div>

        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Obat</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
              <tr>
                  <th scope="row">...</td>
                  <td>...</td>
                  <td>...</td>
                  <td>...</td>
                  <td>...</td>
                  <td>
                      <div class="gallery-item">
                          <a href="{{asset('assets/img/obat/default.jpg')}}" class="galelry-lightbox">
                              <img src="{{asset('assets/img/obat/default.jpg')}}" alt="Obat" width="75px">
                          </a>
                      </div>
                  </td>
                  <td>
                      <a href="" class="link-warning"><i class="bi bi-pencil-square">Edit</i></a>
                      <a href="" onclick="return confirm('Yakin Hapus?')" class="link-danger"><i class="bi bi-trash3">Delete</i></a>
                  </td>
              </tr>
            </tbody>
        </table>

      </div>
    </section><!-- Obat Section -->

    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Dokter</h2>
          <a href="" class="btn btn-success">+ Add Dokter</a>
        </div>

        <div class="row">
          
          <div class="col-lg-6">
            <div class="member d-flex align-items-center">
              <div class="pic"><img src="" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>...</h4>
                <p>...</p>
                <a href="" class="link-warning"><i class="bi bi-pencil-square">Edit</i></a>
                <a href="" onclick="return confirm('Yakin Hapus?')" class="link-danger"><i class="bi bi-trash3">Delete</i></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Doctors Section -->

  </main><!-- End #main -->
@endsection