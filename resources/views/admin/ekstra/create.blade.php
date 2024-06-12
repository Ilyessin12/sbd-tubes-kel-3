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
                    <br>
                    <h2>Tambah Ekstra</h2>
                </div>

                <form action="{{route('admin.ekstra.store')}}" method="post" role="form" id="form-add" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_ekstra" id="id_ekstra">
                    <div class="mb-3">
                        <label for="nama_ekstra" class="form-label">Nama Ekstra</label>
                        <input type="text" class="form-control" id="nama_ekstra" name="nama_ekstra" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control" required></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="harga" class="form-label" id="harga">Harga</label>
                        <input type="number" class="form-control" name="harga" id="harga" required>
                    </div>

                    <a href="{{route('admin.ekstra.index')}}"><button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Cancel</button></a>
                    <button type="submit" class="btn btn-primary text-white" name="btn-add" id="btn-add"
                        form="form-add">Tambah Ekstra</button>
                </form>

            </div>
        </section>

    </main><!-- End #main -->
@endsection