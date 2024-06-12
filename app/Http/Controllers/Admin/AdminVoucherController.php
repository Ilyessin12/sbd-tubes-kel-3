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

        return view('admin.voucher.index', compact('vouchers'));
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
            'tanggal_mulai' => 'required|date|after_or_equal:today',
            'tanggal_kadaluarsa' => 'required|date|after:tanggal_mulai',
        ]);

        DB::insert('INSERT INTO voucher (nama_voucher, persentase_diskon, tanggal_mulai, tanggal_kadaluarsa)
        VALUES (?, ?, ?, ?)', [
            $request->nama_voucher,
            $request->persentase_diskon,
            $request->tanggal_mulai,
            $request->tanggal_kadaluarsa,
        ]);

        return redirect()->route('admin.voucher.index')->with('success', 'Voucher berhasil ditambahkan');
    }

    public function edit($id)
    {
        $voucher = DB::select('SELECT * FROM voucher WHERE id_voucher = ?', [$id])[0];

        return view('admin.voucher.edit', compact('voucher'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_voucher' => 'required|string|max:255',
            'persentase_diskon' => 'required|integer',
            'tanggal_mulai' => 'required|date|after_or_equal:today',
            'tanggal_kadaluarsa' => 'required|date|after:tanggal_mulai',
        ]);

        DB::update('UPDATE voucher SET nama_voucher = ?, persentase_diskon = ?, tanggal_mulai = ?, tanggal_kadaluarsa = ?
        WHERE id_voucher = ?', [
            $request->nama_voucher,
            $request->persentase_diskon,
            $request->tanggal_mulai,
            $request->tanggal_kadaluarsa,
            $id,
        ]);

        return redirect()->route('admin.voucher.index')->with('success', 'Voucher berhasil diubah');
    }

    public function destroy($id)
    {

        DB::delete('DELETE FROM voucher WHERE id_voucher = ?', [$id]);

        return redirect()->route('admin.voucher.index')->with('success', 'Voucher berhasil dihapus');
    }
}
