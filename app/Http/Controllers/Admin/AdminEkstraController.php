<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminEkstraController extends Controller
{
    public function index()
    {
        $ekstra = DB::select('SELECT * FROM ekstra');

        return view('admin.ekstra.index', compact('ekstra'));
    }

    public function create()
    {
        return view('admin.ekstra.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'harga' => 'required|integer',
        ]);

        DB::insert('INSERT INTO ekstra (nama, deskripsi, harga)
        VALUES (?, ?, ?)', [
            $request->nama,
            $request->deskripsi,
            $request->harga,
        ]);

        return redirect()->route('admin.ekstra.index')->with('success', 'Ekstra berhasil ditambahkan');
    }

    public function edit($id)
    {
        $ekstra = DB::select('SELECT * FROM ekstra WHERE id_ekstra = ?', [$id])[0];

        return view('admin.ekstra.edit', compact('ekstra'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'harga' => 'required|integer',
        ]);

        DB::update('UPDATE ekstra SET nama = ?, deskripsi = ?, harga = ?
        WHERE id_ekstra = ?', [
            $request->nama,
            $request->deskripsi,
            $request->harga,
            $id,
        ]);

        return redirect()->route('admin.ekstra.index')->with('success', 'Ekstra berhasil diubah');
    }

    public function destroy($id)
    {

        DB::delete('DELETE FROM ekstra WHERE id_ekstra = ?', [$id]);

        return redirect()->route('admin.ekstra.index')->with('success', 'Ekstra berhasil dihapus');
    }
}
