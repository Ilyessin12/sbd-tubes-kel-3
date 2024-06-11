@extends('admin.layout')
@section('content')
<main id="main" style="padding-top: 70px;">

        <!-- ======= Services Section ======= -->
        <section id="appointment" class="appointment section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>Booking</h2>
                </div>

                <form action="{{url('/admin/booking')}}" method="patch" role="form" id="form-add" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_booking" id="id_booking">
                    <div class="mb-3">
                        <label for="status_booking">Status Booking</label>
                        <select class="form-select" name="status_booking">
                            <option value="" selected>Pilih</option>
                            <option value="pending">Pending</option>
                            <option value="sukses">Sukses</option>
                            <option value="canceled">Canceled</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_booking" class="form-label">Tanggal Booking</label>
                        <input type="date" class="form-control" id="tanggal_booking" name="tanggal_booking">
                    </div>
                    <div class="mb-3">
                        <label for="jam_mulai" class="form-label">Jam Mulai</label>
                        <input type="time" class="form-control" id="jam_mulai" name="jam_mulai">
                    </div>
                    <div class="mb-3">
                        <label for="jam_selesai" class="form-label">Jam Selesai</label>
                        <input type="time" class="form-control" id="jam_selesai" name="jam_selesai">
                    </div>
                    <div class="mb-3">
                        <label for="id_customer">Nama Customer</label>
                        <select class="form-select" name="id_customer">
                            <option value="" selected>Pilih</option>
                            @foreach ($customers as $row)
                                <option value="{{$row->id_customer}}">{{($row->nama_customer)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_fasilitas">Fasilitas</label>
                        <select class="form-select" name="id_fasilitas">
                            <option value="" selected>Pilih</option>
                            @foreach ($fasilitas as $row)
                                <option value="{{$row->id_fasilitas}}">{{($row->nama)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_voucher">Voucher</label>
                        <select class="form-select" name="id_voucher">
                            <option value="" selected>Pilih</option>
                            @foreach ($vouchers as $row)
                                <option value="{{$row->id_voucher}}">{{($row->nama_voucher)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_ekstra">Ekstra</label>
                        <select class="form-select" name="id_ekstra">
                            <option value="" selected>Pilih</option>
                            @foreach ($extras as $row)
                                <option value="{{$row->id_ekstra}}">{{($row->nama)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_ekstra" class="form-label">Jumlah Ekstra</label>
                        <input type="number" class="form-control" id="jumlah_ekstra" name="jumlah_ekstra">
                    </div>
                    <input type="hidden" id="total_harga" name="total_harga">
                    <a href="{{url('/admin/booking')}}"><button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Cancel</button></a>
                    <button type="submit" class="btn btn-primary text-white" name="btn-add" id="btn-add"
                        form="form-add">Tambah Booking</button>
                </form>

            </div>
        </section>

    </main><!-- End #main -->
@endsection