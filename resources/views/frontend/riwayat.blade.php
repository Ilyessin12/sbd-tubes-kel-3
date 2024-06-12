@extends('frontend.layout')

@section('content')
<main id="main" style="padding-top: 70px;">
    <!-- ======= Riwayat Section ======= -->
    <section id="riwayat" class="services">
      <div class="container">

        <div class="section-title">
        @if(session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
        @endif
          <br>
          <h2>Riwayat</h2>
        </div>

        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal Booking</th>
                    <th scope="col">Jam Mulai</th>
                    <th scope="col">Jam Selesai</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Nama Fasilitas</th>
                    <th scope="col">Ekstra</th>
                    <th scope="col">Jumlah Ekstra</th>
                    <th scope="col">Voucher</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $index => $booking)
                <tr>
                    <th scope="row">{{ $index + 1 }}</td>
                    <td>{{ $booking->tanggal_booking }}</td>
                    <td>{{ $booking->jam_mulai }}</td>
                    <td>{{ $booking->jam_selesai }}</td>
                    <td>{{ $booking->total_harga }}</td>
                    <td>{{ $booking->nama_fasilitas }}</td>
                    <td>{{ $booking->nama_ekstra ?? '-' }}</td>
                    <td>{{ $booking->jumlah_ekstra }}</td>
                    <td>{{ $booking->nama_voucher ?? '-' }}</td>
                    <td>
                        @if($booking->status_booking == 'pending')
                            <a href="{{ route('frontend.checkout', ['id' => $booking->id_booking]) }}" class="btn btn-warning">Checkout</a>
                        @else
                            <button class="btn btn-success">Sukses</button>
                        @endif
                        <a href="{{ route('frontend.riwayat.delete', $booking->id_booking) }}" onclick="return confirm('Yakin Hapus?')" class="link-danger"><i class="bi bi-trash3">Delete</i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

      </div>
    </section>
</main>
@endsection