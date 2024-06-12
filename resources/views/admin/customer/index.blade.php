@extends('admin.layout')
@section('content')
<main id="main" style="padding-top: 70px;">

    <!-- ======= Customer Section ======= -->
    <section id="customer" class="services">
      <div class="container">

        <div class="section-title">
          <br>
          <h2>Customer</h2>
          <a href="{{ route('admin.customer.create') }}" class="btn btn-success">+ Add Customer</a>
        </div>

         <!-- Display Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Customer</th>
                    <th scope="col">Email Customer</th>
                    <th scope="col">Telpon Customer</th>
                    <th scope="col">Status Member</th>
                    <th scope="col">Tanggal Mulai</th>
                    <th scope="col">Tanggal Selesai</th>
                    <th scope="col">Role</th>
                    <th scope="col">Kuota Member</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($customers as $row)
              <tr>
                <td>{{isset($i) ? ++$i : $i = 1}}</td>
                <td>{{$row->nama_customer}}</td>
                <td>{{$row->email_customer}}</td>
                <td>{{$row->telp_customer}}</td>
                <td>{{$row->status_member}}</td>
                <td>{{$row->tanggal_mulai}}</td>
                <td>{{$row->tanggal_selesai}}</td>
                <td>{{$row->role}}</td>
                <td>{{$row->kuota_member}}</td>
                <td>
                  <a href="{{ route('admin.customer.edit', $row->id_customer) }}" class="link-warning"><i class="bi bi-pencil-square">Edit</i></a>
                  <br>
                  <a href="{{ route('admin.customer.delete', $row->id_customer) }}" onclick="return confirm('Yakin Hapus?')" class="link-danger"><i class="bi bi-trash3">Delete</i></a>
                </td>
              @endforeach
            </tbody>
        </table>

      </div>
    </section><!-- Rekam Medis Section -->
</main>
@endsection