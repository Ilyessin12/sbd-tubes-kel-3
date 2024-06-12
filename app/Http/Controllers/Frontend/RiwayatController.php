<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RiwayatController extends Controller
{
    public function index()
    {
        $id_customer = Auth::id();

        $bookings = DB::select("
            SELECT 
                b.id_booking,
                b.status_booking,
                b.tanggal_booking,
                b.jumlah_ekstra,
                b.jam_mulai,
                b.jam_selesai,
                b.total_harga,
                f.nama_fasilitas,
                v.nama_voucher,
                e.nama_ekstra
            FROM booking b
            LEFT JOIN fasilitas f ON b.id_fasilitas = f.id_fasilitas
            LEFT JOIN voucher v ON b.id_voucher = v.id_voucher
            LEFT JOIN ekstra e ON b.id_ekstra = e.id_ekstra
            WHERE b.id_customer = ?
        ", [$id_customer]);

        return view('frontend.riwayat', ['bookings' => $bookings]);
    }

    public function destroy($id)
    {
        DB::delete("DELETE FROM booking WHERE id_booking = ?", [$id]);

        return redirect()->route('frontend.riwayat')->with('success', 'Booking berhasil dihapus');
    }
}
