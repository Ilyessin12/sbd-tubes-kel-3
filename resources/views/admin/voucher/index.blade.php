@extends('admin.layout')
@section('content')
<main id="main" style="padding-top: 70px;">

    <!-- ======= Rekam Medis Section ======= -->
    <section id="voucher" class="services">
      <div class="container">

        <div class="section-title">
          <br>
          <h2>Voucher</h2>
          <a href="{{ route('admin.voucher.create') }}" class="btn btn-success">+ Add Voucher</a>
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
                    <th scope="col">Nama Voucher</th>
                    <th scope="col">Persentase Diskon</th>
                    <th scope="col">Tanggal Mulai</th>
                    <th scope="col">Tanggal Kadaluarsa</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach($vouchers as $row)
                <tr>
                    <th scope="row">1</td>
                    <td>{{$row->nama_voucher}}</td>
                    <td>{{$row->persentase_diskon}}</td>
                    <td>{{$row->tanggal_mulai}}</td>
                    <td>{{$row->tanggal_kadaluarsa}}</td>
                    <td>
                      <a href="{{ route('admin.voucher.edit', $row->id_voucher) }}" class="link-warning"><i class="bi bi-pencil-square">Edit</i></a>
                      <br>
                      <a href="{{ route('admin.voucher.delete', $row->id_voucher) }}" onclick="return confirm('Yakin Hapus?')" class="link-danger"><i class="bi bi-trash3">Delete</i></a>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>

      </div>
    </section><!-- Rekam Medis Section -->
</main>
@endsection