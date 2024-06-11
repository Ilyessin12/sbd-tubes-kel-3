@extends('admin.layout')
@section('content')
<main id="main" style="padding-top: 70px;">

    <!-- ======= Rekam Medis Section ======= -->
    <section id="ekstra" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Ekstra</h2>
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
                    <td>...</td>
                    <td>...</td>
                </tr>
            </tbody>
        </table>

      </div>
    </section><!-- Rekam Medis Section -->
</main>
@endsection