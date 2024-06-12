@extends('admin.layout')
@section('content')
<main id="main" style="padding-top: 70px;">

    <!-- ======= Rekam Medis Section ======= -->
    <section id="fasilitas" class="services">
      <div class="container">

        <div class="section-title">
          <br>
          <h2>Fasilitas</h2>
          <a href="{{ route('admin.fasilitas.create') }}" class="btn btn-success">+ Add Fasilitas</a>
        </div>

        <!-- Display Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

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
                <td>{{$row->nama_fasilitas}}</td>
                <td>{{$row->deskripsi}}</td>
                <td>{{$row->harga}}</td>
                <td>{{$row->jenis_kegiatan}}</td>
                <td>
                  <a href="{{ route('admin.fasilitas.edit', $row->id_fasilitas) }}" class="link-warning"><i class="bi bi-pencil-square">Edit</i></a>
                  <br>
                  <a href="{{ route('admin.fasilitas.delete', $row->id_fasilitas) }}" onclick="return confirm('Yakin Hapus?')" class="link-danger"><i class="bi bi-trash3">Delete</i></a>
                </td>
                </tr>
              @endforeach
            </tbody>
        </table>

      </div>
    </section><!-- Rekam Medis Section -->
</main>
@endsection