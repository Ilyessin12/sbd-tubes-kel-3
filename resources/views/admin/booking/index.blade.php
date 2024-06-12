@extends('admin.layout')
@section('content')
<main id="main" style="padding-top: 70px;">

    <!-- ======= Rekam Medis Section ======= -->
    <section id="booking" class="services">
      <div class="container">

        <div class="section-title">
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

           <!-- Display Success Message -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
          <h2>Booking</h2>
          <a href="{{ route('admin.booking.create') }}" class="btn btn-success">+ Add Booking</a>
        </div>

        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Status Booking</th>
                    <th scope="col">Tanggal Booking</th>
                    <th scope="col">Jam Mulai</th>
                    <th scope="col">Jam Selesai</th>
                    <th scope="col">Nama Customer</th>
                    <th scope="col">Nama Fasilitas</th>
                    <th scope="col">Nama Voucher</th>
                    <th scope="col">Nama Ekstra</th>
                    <th scope="col">Jumlah Ekstra</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($bookings as $row)
              <tr>
                    <td>{{isset($i) ? ++$i : $i = 1}}</td>
                    <td>{{$row->status_booking}}</td>
                    <td>{{$row->tanggal_booking}}</td>
                    <td>{{$row->jam_mulai}}</td>
                    <td>{{$row->jam_selesai}}</td>
                    <td>{{$row->nama_customer}}</td>
                    <td>{{$row->nama_fasilitas}}</td>
                    <td>{{$row->nama_voucher}}</td>
                    <td>{{$row->nama_ekstra}}</td>
                    <td>{{$row->jumlah_ekstra}}</td>
                    <td>{{$row->total_harga}}</td>
                    <td>
                        <a href="{{ route('admin.booking.edit', $row->id_booking) }}" class="link-warning"><i class="bi bi-pencil-square">Edit</i></a>
                        <br>
                        <a href="{{ route('admin.booking.delete', $row->id_booking) }}" onclick="return confirm('Yakin Hapus?')" class="link-danger"><i class="bi bi-trash3">Delete</i></a>
                    </td>
                    </tr>
              @endforeach
            </tbody>
        </table>

      </div>
    </section><!-- Rekam Medis Section -->
</main>
@endsection