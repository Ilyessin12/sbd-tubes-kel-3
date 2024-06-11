@extends('admin.layout')
@section('content')
<main id="main" style="padding-top: 70px;">

        <!-- ======= Services Section ======= -->
        <section id="appointment" class="appointment section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>Tambah Voucher</h2>
                </div>

                <form action="/admin/voucher" method="post" role="form" id="form-add" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="id_voucher" id="id_voucher">
                    <div class="mb-3">
                        <label for="nama_voucher" class="form-label">Nama Voucher</label>
                        <input type="text" class="form-control" id="nama_voucher" name="nama_voucher">
                    </div>

                    <div class="mb-3">
                        <label for="presentase_diskon" class="form-label">Presentase Diskon</label>
                        <input type="number" class="form-control" name="presentase_diskon" id="presentase_diskon">
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_kadaluarsa" class="form-label">Tanggal Kadaluarsa</label>
                        <input type="date" class="form-control" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa">
                    </div>

                    <a href="admin.php"><button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Cancel</button></a>
                    <button type="submit" class="btn btn-primary text-white" name="btn-add" id="btn-add"
                        form="form-add">Tambah Voucher</button>
                </form>

            </div>
        </section>

    </main><!-- End #main -->
@endsection