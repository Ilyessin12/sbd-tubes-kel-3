<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCustomerController extends Controller
{
    public function index()
    {
        //kita ambil dulu data yang ada di database untuk tabel customer, abis itu kita kasih data nya ke view
        // $customers = DB::select('SELECT * FROM customer');

        //nanti return viewnya buat tampilan utama customer sekaligus sama data customernya, usahain pisahin pake folder customer
        // return view('admin.customer.index', compact('customers'));
    }

    public function create()
    {
        //nanti return viewnya buat form tambah customer, usahain pisahin pake folder customer
        // return view('admin.customer.create');
    }
    public function store(Request $request)
    {
        //nanti disini buat validasi inputan, kalo validasi gagal balik ke form tambah customer
        //kalo validasi sukses, simpen ke database terus balik ke halaman utama customer

        // contoh validasi

       /*
        $request->validate([
            'nama_customer' => 'required|string|max:255',
            'email_customer' => 'required|string|email|max:255|unique:customer',
            'telp_customer' => 'required|string|max:20',
            'password' => 'required|string|min:8',
            'status_member' => 'required|string|max:255',
            'tanggal_mulai' => 'nullable|date|after_or_equal:today',
            'tanggal_selesai' => 'nullable|date|after:tanggal_mulai',
            'role' => 'required|string|max:255',
            'kuota_member' => 'required|integer',
        ]);

        // Hash the password
        $hashedPassword = \Hash::make($request->password);

        //abis di validasi, kita baru jalanin sql insert into ke database
        /*
        DB::insert('INSERT INTO customer (nama_customer, email_customer, telp_customer, password, status_member, tanggal_mulai, tanggal_selesai, role, kuota_member)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $request->nama_customer,
            $request->email_customer,
            $request->telp_customer,
            $hashedPassword,
            $request->status_member,
            $request->tanggal_mulai,
            $request->tanggal_selesai,
            $request->role,
            $request->kuota_member,
        ]);
        */

        // abis insert, balik ke halaman utama customer (index page)
        // return redirect()->route('admin.customer.index');


    }

    public function edit($id)
    {
        //ambil data customer yang mau diedit, terus kasih ke view
        // $customer = DB::select('SELECT * FROM customer WHERE id_customer = ?', [$id])[0];

        //nanti return viewnya buat form edit customer, usahain pisahin pake folder customer
        // return view('admin.customer.edit');
    }

    public function update(Request $request, $id)
    {
        //nanti disini buat validasi inputan, kalo validasi gagal balik ke form edit customer
        //kalo validasi sukses, update database terus balik ke halaman utama customer

        // contoh validasi

        /*
        $request->validate([
            'nama_customer' => 'required|string|max:255',
            'email_customer' => 'required|string|email|max:255|unique:customer,email_customer,' . $id . ',id_customer',
            'telp_customer' => 'required|string|max:20',
            'password' => 'required|string|min:8',
            'status_member' => 'required|string|max:255',
            'tanggal_mulai' => 'nullable|date|after_or_equal:today',
            'tanggal_selesai' => 'nullable|date|after:tanggal_mulai',
            'role' => 'required|string|max:255',
            'kuota_member' => 'required|integer',
        ]);

        // Hash the password
        $hashedPassword = \Hash::make($request->password);

        //abis di validasi, kita baru jalanin sql update ke database
        /*
        DB::update('UPDATE customer SET nama_customer = ?, email_customer = ?, telp_customer = ?, password = ?, status_member = ?, tanggal_mulai = ?, tanggal_selesai = ?, role = ?, kuota_member = ?
        WHERE id_customer = ?', [
            $request->nama_customer,
            $request->email_customer,
            $request->telp_customer,
            $hashedPassword,
            $request->status_member,
            $request->tanggal_mulai,
            $request->tanggal_selesai,
            $request->role,
            $request->kuota_member,
            $id,
        ]);
        */

        // abis update, balik ke halaman utama customer (index page)
        // return redirect()->route('admin.customer.index');
    }

    public function destroy($id)
    {
        //kalo delete, langsung delete dari database terus balik ke halaman utama customer

        // DB::delete('DELETE FROM customer WHERE id_customer = ?', [$id]);

        // abis delete, balik ke halaman utama customer (index page)

        // return redirect()->route('admin.customer.index');
    }
}
