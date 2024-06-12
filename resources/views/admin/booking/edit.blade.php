@extends('admin.layout')
@section('content')
<main id="main" style="padding-top: 70px;">

    <!-- ======= Services Section ======= -->
    <section id="appointment" class="appointment section-bg">
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
                <h2>Edit Booking</h2>
            </div>

            <?php
            // Format dulu jam nya supaya sesuai dengan format jam di html
            $jamMulaiFormatted = (new DateTime($booking->jam_mulai))->format('H:i');
            $jamSelesaiFormatted = (new DateTime($booking->jam_selesai))->format('H:i');

            ?>

            <form action="{{ route('admin.booking.update', $booking->id_booking) }}" method="post" role="form" id="form-add" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="status_booking">Status Booking</label>
                    <select class="form-select" name="status_booking" required>
                        <option value="" selected>Pilih</option>
                        <option value="pending" {{ $booking->status_booking == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="sukses" {{ $booking->status_booking == 'sukses' ? 'selected' : '' }}>Sukses</option>
                        <option value="canceled" {{ $booking->status_booking == 'canceled' ? 'selected' : '' }}>Canceled</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tanggal_booking" class="form-label">Tanggal Booking</label>
                    <input type="date" class="form-control" id="tanggal_booking" name="tanggal_booking" required value="{{ $booking->tanggal_booking }}">
                </div>

                <div class="mb-3">
                    <label for="jam_mulai" class="form-label">Jam Mulai</label>
                    <!-- Step 3: Set the formatted values in the input fields -->
                    <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required value="{{ $jamMulaiFormatted }}">
                </div>
                <div class="mb-3">
                    <label for="jam_selesai" class="form-label">Jam Selesai</label>
                    <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required value="{{ $jamSelesaiFormatted }}">
                </div>

                <div class="mb-3">
                    <label for="id_customer">Nama Customer</label>
                    <select class="form-select" name="id_customer" required>
                        <option value="" selected>Pilih</option>
                        @foreach ($customers as $customer)
                            <option value="{{$customer->id_customer}}" {{ $booking->id_customer == $customer->id_customer ? 'selected' : '' }}>{{ $customer->nama_customer }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="id_fasilitas">Fasilitas</label>
                    <select class="form-select" name="id_fasilitas" required>
                        <option value="" selected>Pilih</option>
                        @foreach ($fasilitas as $fasil)
                            <option value="{{$fasil->id_fasilitas}}" {{ $booking->id_fasilitas == $fasil->id_fasilitas ? 'selected' : '' }}>{{ $fasil->nama_fasilitas }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="id_voucher">Voucher</label>
                    <select class="form-select" name="id_voucher">
                        <option value="" selected>Pilih</option>
                        @foreach ($vouchers as $voucher)
                            <option value="{{$voucher->id_voucher}}" {{ $booking->id_voucher == $voucher->id_voucher ? 'selected' : '' }}>{{ $voucher->nama_voucher }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="id_ekstra">Ekstra</label>
                    <select class="form-select" name="id_ekstra">
                        <option value="" selected>Pilih</option>
                        @foreach ($extras as $extra)
                            <option value="{{$extra->id_ekstra}}" {{ $booking->id_ekstra == $extra->id_ekstra ? 'selected' : '' }}>{{ $extra->nama_ekstra }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="jumlah_ekstra" class="form-label">Jumlah Ekstra</label>
                    <input type="number" class="form-control" id="jumlah_ekstra" name="jumlah_ekstra" value="{{ $booking->jumlah_ekstra }}">
                </div>
                <input type="hidden" id="total_harga" name="total_harga" value="{{ $booking->total_harga }}">
                <a href="{{url('/admin/booking')}}"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button></a>
                <button type="submit" class="btn btn-primary text-white" name="btn-add" id="btn-add" form="form-add">Update Booking</button>
            </form>

        </div>
    </section>

</main><!-- End #main -->
@endsection