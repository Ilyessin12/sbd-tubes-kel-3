<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminBookingController extends Controller
{
    public function index()
    {
        $bookings = DB::select('SELECT booking.*, customer.nama_customer, fasilitas.nama, voucher.nama_voucher, ekstra.nama FROM booking 
        LEFT JOIN customer ON booking.id_customer = customer.id_customer 
        LEFT JOIN fasilitas ON booking.id_fasilitas = fasilitas.id_fasilitas
        LEFT JOIN voucher ON booking.id_voucher = voucher.id_voucher
        LEFT JOIN ekstra ON booking.id_ekstra = ekstra.id_ekstra');
        
        return view('admin.booking.index', compact('bookings'));
    }

    public function create()
    {
        $customers = DB::select('SELECT id_customer, nama_customer FROM customer');
        $fasilitas = DB::select('SELECT id_fasilitas, nama FROM fasilitas');
        $vouchers = DB::select('SELECT id_voucher, nama_voucher FROM voucher');
        $extras = DB::select('SELECT id_ekstra, nama FROM ekstra');
        
        return view('admin.booking.create', compact('customers', 'fasilitas', 'vouchers', 'extras'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'status_booking' => 'required|string|max:255',
            'tanggal_booking' => 'required|date|after_or_equal:today',
            'jumlah_ekstra' => 'required|integer',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'total_harga' => 'required',
            'id_customer' => 'required|integer|exists:customer,id_customer',
            'id_fasilitas' => 'required|integer|exists:fasilitas,id_fasilitas',
            'id_voucher' => 'nullable|integer|exists:voucher,id_voucher',
            'id_ekstra' => 'nullable|integer|exists:ekstra,id_ekstra',
        ]);

        DB::insert('INSERT INTO booking (status_booking, tanggal_booking, jumlah_ekstra, jam_mulai, jam_selesai, total_harga, id_customer, id_fasilitas, id_voucher, id_ekstra)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $request->status_booking,
            $request->tanggal_booking,
            $request->jumlah_ekstra,
            $request->jam_mulai,
            $request->jam_selesai,
            $request->total_harga,
            $request->id_customer,
            $request->id_fasilitas,
            $request->id_voucher,
            $request->id_ekstra,
        ]);

        return redirect()->route('admin.booking.index');
    }

    public function edit($id)
    {
        $bookings = DB::select('SELECT booking.*, customer.nama_customer, fasilitas.nama, voucher.nama_voucher, ekstra.nama FROM booking 
        LEFT JOIN customer ON booking.id_customer = customer.id_customer 
        LEFT JOIN fasilitas ON booking.id_fasilitas = fasilitas.id_fasilitas
        LEFT JOIN voucher ON booking.id_voucher = voucher.id_voucher
        LEFT JOIN ekstra ON booking.id_ekstra = ekstra.id_ekstra
        WHERE id_booking = ?', [$id])[0];

        $customers = DB::select('SELECT id_customer, nama_customer FROM customer');
        $fasilitas = DB::select('SELECT id_fasilitas, nama FROM fasilitas');
        $vouchers = DB::select('SELECT id_voucher, nama_voucher FROM voucher');
        $extras = DB::select('SELECT id_ekstra, nama FROM ekstra');

        return view('admin.booking.edit', compact('bookings', 'customers', 'fasilitas', 'vouchers', 'extras'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status_booking' => 'required|string|max:255',
            'tanggal_booking' => 'required|date|after_or_equal:today',
            'jumlah_ekstra' => 'required|integer',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'total_harga' => 'required',
            'id_customer' => 'required|integer|exists:customer,id_customer',
            'id_fasilitas' => 'required|integer|exists:fasilitas,id_fasilitas',
            'id_voucher' => 'nullable|integer|exists:voucher,id_voucher',
            'id_ekstra' => 'nullable|integer|exists:ekstra,id_ekstra',
        ]);

        DB::update('UPDATE booking SET status_booking = ?, tanggal_booking = ?, jumlah_ekstra = ?, jam_mulai = ?, jam_selesai = ?, total_harga = ?, id_customer = ?, id_fasilitas = ?, id_voucher = ?, id_ekstra = ?
        WHERE id_booking = ?', [
            $request->status_booking,
            $request->tanggal_booking,
            $request->jumlah_ekstra,
            $request->jam_mulai,
            $request->jam_selesai,
            $request->total_harga,
            $request->id_customer,
            $request->id_fasilitas,
            $request->id_voucher,
            $request->id_ekstra,
            $id,
        ]);

        return redirect()->route('admin.booking.index');
    }

    public function destroy($id)
    {
        DB::delete('DELETE FROM booking WHERE id_booking = ?', [$id]);

        return redirect()->route('admin.booking.index');
    }
}
