@extends('admin.layout')
@section('content')
<main id="main" style="padding-top: 70px;">

        <!-- ======= Services Section ======= -->
        <section id="appointment" class="appointment section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>Tambah Fasilitas</h2>
                </div>

                <form action="/admin/fasilitas" method="post" role="form" id="form-add" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="id_fasilitas" id="id_fasilitas">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Fasilitas</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control"></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="harga" class="form-label" id="harga">Harga</label>
                        <input type="number" class="form-control" name="harga" id="harga">
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kegiatan" class="form-label">Jenis Kegiatan</label>
                        <input type="text" class="form-control" id="jenis_kegiatan" name="jenis_kegiatan">
                    </div>

                    <a href="admin.php"><button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Cancel</button></a>
                    <button type="submit" class="btn btn-primary text-white" name="btn-add" id="btn-add"
                        form="form-add">Tambah Fasilitas</button>
                </form>

            </div>
        </section>

    </main><!-- End #main -->
@endsection