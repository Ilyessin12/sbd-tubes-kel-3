@extends('frontend.layout')

@section('content')

<main id="main" style="padding-top: 70px;">
    <section>
        <div class="container">
            <div class="card" style="width: 18 rem">
                <div class="card-body">
                    <h5 class="card-title">Detail Booking</h5>
                    <table>
                        <tr>
                            <td>Status Booking</td>
                            <td> : </td>
                            <td>{{ $booking->status_booking }}</td>
                        </tr>
                        <tr>
                            <td>Nama Customer</td>
                            <td> : </td>
                            <td>{{ $customer->nama_customer }}</td>
                        </tr>
                        <tr>
                            <td>Nama Fasilitas</td>
                            <td> : </td>
                            <td>{{ $fasilitas->nama_fasilitas }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Booking</td>
                            <td> : </td>
                            <td>{{ $booking->tanggal_booking }}</td>
                        </tr>
                        <tr>
                            <td>Jam Mulai</td>
                            <td> : </td>
                            <td>{{ $booking->jam_mulai }}</td>
                        </tr>
                        <tr>
                            <td>Jam Selesai</td>
                            <td> : </td>
                            <td>{{ $booking->jam_selesai }}</td>
                        </tr>
                        <tr>
                            <td>Total Harga</td>
                            <td> : </td>
                            <td>{{ $booking->total_harga }}</td>
                        </tr>
                        <tr>
                            <td>Ekstra</td>
                            <td> : </td>
                            <td>{{ $ekstra->nama_ekstra ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Voucher</td>
                            <td> : </td>
                            <td>{{ $voucher->nama_voucher ?? '-' }}</td>>
                        </tr>
                    </table>
                    <button class="btn btn-primary mt-3" id="pay-button" >Bayar Sekarang</button>
                    <div id="snap-container" class="snap-container"></div>
                </div>
            </div>
        </div>
    </section>
</main>