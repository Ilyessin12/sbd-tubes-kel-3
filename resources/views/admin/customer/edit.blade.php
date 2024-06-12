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
                <h2>Edit Customer</h2>
            </div>

            <form action="{{ route('admin.customer.update', $customer->id_customer) }}" method="post" role="form" id="form-add" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_customer" class="form-label">Nama Customer</label>
                    <input type="text" class="form-control" id="nama_customer" name="nama_customer" required value="{{ $customer->nama_customer }}">
                </div>
                <div class="mb-3">
                    <label for="email_customer" class="form-label">Email Customer</label>
                    <input type="text" class="form-control" id="email_customer" name="email_customer" required value="{{ $customer->email_customer }}">
                </div>
                <div class="mb-3">
                    <label for="telp_customer" class="form-label">Telepon Customer</label>
                    <input type="tel" class="form-control" id="telp_customer" name="telp_customer" required value="{{ $customer->telp_customer }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="status_member">Status Member</label>
                    <select class="form-select" aria-label="Category" id="status_member" name="status_member" required>
                        <option value="" disabled hidden>Pilih</option>
                        <option value="member" {{ $customer->status_member == 'member' ? 'selected' : '' }}>Member</option>
                        <option value="non-member" {{ $customer->status_member == 'non-member' ? 'selected' : '' }}>Non-member</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ $customer->tanggal_mulai }}">
                </div>
                <div class="mb-3">
                    <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="{{ $customer->tanggal_selesai }}">
                </div>
                <div class="mb-3">
                    <label for="role">Role</label>
                    <select class="form-select" aria-label="Category" id="role" name="role" required>
                        <option value="" disabled hidden>Pilih</option>
                        <option value="admin" {{ $customer->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user" {{ $customer->role == 'user' ? 'selected' : '' }}>User</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kuota_member" class="form-label">Kuota Member</label>
                    <input type="number" class="form-control" id="kuota_member" name="kuota_member" required value="{{ $customer->kuota_member }}">
                </div>
                <a href="{{url('/admin/customer')}}"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button></a>
                <button type="submit" class="btn btn-primary text-white" name="btn-add" id="btn-add" form="form-add">Update Customer</button>
            </form>

        </div>
    </section>

</main><!-- End #main -->
@endsection