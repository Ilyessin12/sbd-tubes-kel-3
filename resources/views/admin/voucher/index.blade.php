@extends('admin.layout')
@section('content')
<main id="main" style="padding-top: 70px;">

    <!-- ======= Rekam Medis Section ======= -->
    <section id="voucher" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Voucher</h2>
        </div>

        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Voucher</th>
                    <th scope="col">Presentase Diskon</th>
                    <th scope="col">Tanggal Mulai</th>
                    <th scope="col">Tanggal Kadaluarsa</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach($voucher as $vouchers)
                <tr>
                    <th scope="row">1</td>
                    <td>{{$vouchers->nama_voucher}}</td>
                    <td>{{$vouchers->presentasi_diskon}}</td>
                    <td>{{$vouchers->tanggal_mulai}}</td>
                    <td>{{$vouchers->tanggal_kadaluarsa}}</td>
                    <td>...</td>
                </tr>
            </tbody>
        </table>

      </div>
    </section><!-- Rekam Medis Section -->
</main>
@endsection