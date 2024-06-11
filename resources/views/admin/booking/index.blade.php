@extends('admin.layout')
@section('content')
<main id="main" style="padding-top: 70px;">

    <!-- ======= Rekam Medis Section ======= -->
    <section id="booking" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Booking</h2>
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
                    <th scope="col">Fasilitas</th>
                    <th scope="col">Voucher</th>
                    <th scope="col">Ekstra</th>
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
                    <td>{{$row->customers}}</td>
                    <td>{{$row->fasilitas}}</td>
                    <td>{{$row->vouchers}}</td>
                    <td>{{$row->extras}}</td>
                    <td>{{$row->jumlah_ekstra}}</td>
                    <td>{{$row->total_harga}}</td>
                    <td>...</td>
                    </tr>
              @endforeach
            </tbody>
        </table>

      </div>
    </section><!-- Rekam Medis Section -->
</main>
@endsection