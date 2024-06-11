<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminVoucherController extends Controller
{
    public function index()
    {
        $vouchers = DB::select('SELECT * FROM voucher');

        return view('admin.voucher.index', compact('voucher'));
    }

    public function create()
    {
        return view('admin.voucher.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_voucher' => 'required|string|max:255',
            'persentase_diskon' => 'required|integer',
            'tanggal_mulai' => 'nullable|date|after_or_equal:today',
            'tanggal_kadaluarsa' => 'nullable|date|after:tanggal_mulai',
        ]);

        DB::insert('INSERT INTO voucher (nama_voucher, persentase_diskon, tanggal_mulai, tanggal_selesai)
        VALUES (?, ?, ?, ?, ?)', [
            $request->nama_voucher,
            $request->persentase_diskon,
            $request->tanggal_mulai,
            $request->tanggal_selesai,
        ]);

        return redirect()->route('admin.voucher.index');
    }

    public function edit($id)
    {
        $voucher = DB::select('SELECT * FROM voucher WHERE id_voucher = ?', [$id])[0];

        return view('admin.voucher.edit');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_voucher' => 'required|string|max:255',
            'persentase_diskon' => 'required|integer',
            //required karena voucher harus ada tanggalnya, di database soalnnya NOT NULL
            'tanggal_mulai' => 'required|date|after_or_equal:today',
            //required karena voucher harus ada tanggalnya, di database soalnnya NOT NULL, dan tanggal kadaluarsanya harus
            // setelah tanggal mulai
            'tanggal_kadaluarsa' => 'required|date|after:today',
        ]);

        DB::update('UPDATE voucher SET nama_voucher = ?, persentase_diskon = ?, tanggal_mulai = ?, tanggal_selesai = ?
        WHERE id_voucher = ?', [
            $request->nama_voucher,
            $request->persentase_diskon,
            $request->tanggal_mulai,
            $request->tanggal_selesai,
            $id,
        ]);

        return redirect()->route('admin.voucher.index');
    }

    public function destroy($id)
    {

        DB::delete('DELETE FROM voucher WHERE id_voucher = ?', [$id]);

        return redirect()->route('admin.voucher.index');
    }
}
