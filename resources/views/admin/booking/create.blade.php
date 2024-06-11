@extends('admin.layout')
@section('content')
<main id="main" style="padding-top: 70px;">

        <!-- ======= Services Section ======= -->
        <section id="appointment" class="appointment section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>Booking</h2>
                </div>

                <form action="/create-booking" method="post" role="form" id="form-add" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="id_customer" id="id_customer" value="{{}}">
                    <div class="mb-3">
                        <label for="id_customer" class="form-label">Id Customer</label>
                        <input type="text" class="form-control" id="id_customer" name="id_customer">
                    </div>
                    <div class="mb-3">
                        <label for="no_telp_dokter" class="form-label">No Telp</label>
                        <input type="text" class="form-control" id="no_telp_dokter" name="no_telp_dokter">
                    </div>
                    <div class="mb-3">
                        <label for="jalan" class="form-label" id="lbl_jalan">Jalan</label>
                        <input type="text" class="form-control" name="address[jalan]" id="register_jalan">
                    </div>
                    <div class="mb-3">
                        <label for="provinsi" class="form-label" id="lbl_provinsi">Provinsi</label>
                        <select class="form-control" name="address[provinsi]" id="register_provinsi"></select>
                    </div>

                    <div class="mb-3">
                        <label for="kabupaten" class="form-label" id="lbl_kabupaten">Kabupaten/Kota</label>
                        <select class="form-control" name="address[kabupaten]" id="register_kabupaten"></select>
                    </div>

                    <div class="mb-3">
                        <label for="kecamatan" class="form-label" id="lbl_kecamatan">Kecamatan</label>
                        <select class="form-control" name="address[kecamatan]" id="register_kecamatan"></select>
                    </div>

                    <div class="mb-3">
                        <label for="kelurahan" class="form-label" id="lbl_kelurahan">Kelurahan</label>
                        <select class="form-control" name="address[kelurahan]" id="register_kelurahan"></select>
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin_dokter">Jenis Kelamin</label>
                        <select class="form-select" aria-label="Category" id="jenis_kelamin_dokter"
                            name="jenis_kelamin_dokter" required>
                            <option value="" selected disabled hidden>Pilih</option>
                            <option value="P">Perempuan</option>
                            <option value="L">Laki-laki</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="departmen">Department</label>
                        <select class="form-select" aria-label="Category" id="departmen" name="departmen" required>
                            <option value="" selected disabled hidden>Pilih</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="foto_dokter" class="form-label">Foto</label>
                        <input class="form-control" type="file" id="foto_dokter" name="foto_dokter" required>
                    </div>

                    <a href="admin.php"><button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Cancel</button></a>
                    <button type="submit" class="btn btn-primary text-white" name="btn-add" id="btn-add"
                        form="form-add">Tambah Dokter</button>
                </form>

            </div>
        </section>

    </main><!-- End #main -->
@endsection