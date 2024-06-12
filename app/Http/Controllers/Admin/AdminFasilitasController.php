<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminFasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = DB::select('SELECT * FROM fasilitas');

        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    public function create()
    {
        return view('admin.fasilitas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'harga' => 'required|integer',
            'jenis_kegiatan' => 'required|string|max:255',
        ]);

        DB::insert('INSERT INTO fasilitas (nama_fasilitas, deskripsi, harga, jenis_kegiatan)
        VALUES (?, ?, ?, ?)', [
            $request->nama_fasilitas,
            $request->deskripsi,
            $request->harga,
            $request->jenis_kegiatan,
        ]);

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil ditambahkan');
    }

    public function edit($id)
    {
        $fasilitas = DB::select('SELECT * FROM fasilitas WHERE id_fasilitas = ?', [$id])[0];

        return view('admin.fasilitas.edit', compact('fasilitas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'harga' => 'required|integer',
            'jenis_kegiatan' => 'required|string|max:255',
        ]);

        DB::update('UPDATE fasilitas SET nama_fasilitas = ?, deskripsi = ?, harga = ?, jenis_kegiatan = ?
        WHERE id_fasilitas = ?', [
            $request->nama_fasilitas,
            $request->deskripsi,
            $request->harga,
            $request->jenis_kegiatan,
            $id,
        ]);

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil diubah');
    }

    public function destroy($id)
    {

        DB::delete('DELETE FROM fasilitas WHERE id_fasilitas = ?', [$id]);

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil dihapus');
    }
}
