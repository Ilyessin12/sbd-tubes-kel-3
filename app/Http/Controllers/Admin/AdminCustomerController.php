<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\support\facades\Hash;

class AdminCustomerController extends Controller
{
    public function index()
    {
        $customers = DB::select('SELECT * FROM customer');
        
        return view('admin.customer.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customer.create');
    }
    public function store(Request $request)
    {

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

        $hashedPassword = Hash::make($request->password);

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

        return redirect()->route('admin.customer.index');


    }

    public function edit($id)
    {
        $customer = DB::select('SELECT * FROM customer WHERE id_customer = ?', [$id])[0];

        return view('admin.customer.edit');
    }

    public function update(Request $request, $id)
    {
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

        $hashedPassword = Hash::make($request->password);

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


        return redirect()->route('admin.customer.index');
    }

    public function destroy($id)
    {
        DB::delete('DELETE FROM customer WHERE id_customer = ?', [$id]);

        return redirect()->route('admin.customer.index');
    }
}
