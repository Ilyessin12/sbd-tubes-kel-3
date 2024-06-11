@extends('admin.layout')
@section('content')
<main id="main" style="padding-top: 70px;">

    <!-- ======= Rekam Medis Section ======= -->
    <section id="fasilitas" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Fasilitas</h2>
        </div>

        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Fasilitas</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jenis Kegiatan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($fasilitas as $row)
              <tr>
                <td>{{isset($i) ? ++$i : $i = 1}}</td>
                <td>{{$row->nama}}</td>
                <td>{{$row->deskripsi}}</td>
                <td>{{$row->harga}}</td>
                <td>{{$row->jenis_kegiatan}}</td>
                <td>...</td>
                </tr>
              @endforeach
            </tbody>
        </table>

      </div>
    </section><!-- Rekam Medis Section -->
</main>
@endsection