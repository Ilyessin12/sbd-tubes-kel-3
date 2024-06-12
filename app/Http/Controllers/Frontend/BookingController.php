<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $fasilitas = DB::select('select * from fasilitas');
        $voucher = DB::select('select * from voucher');
        $ekstra = DB::select('select * from ekstra');
        //ambil data customer yang saat ini sedang login
        $customer = DB::select('select * from customer where id_customer = ?', [Auth::id()])[0];


        return view('frontend.booking', compact('fasilitas', 'voucher', 'ekstra', 'customer'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'tanggal_booking' => 'required|date|after_or_equal:today',
            'jumlah_ekstra' => 'integer',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'id_fasilitas' => 'required|integer|exists:fasilitas,id_fasilitas',
            'id_voucher' => 'nullable|integer|exists:voucher,id_voucher',
            'id_ekstra' => 'nullable|integer|exists:ekstra,id_ekstra',
        ]);

        // Retrieve the ID of the currently logged-in user
        $id_user = Auth::id();

        DB::insert('INSERT INTO booking (tanggal_booking, jumlah_ekstra, jam_mulai, jam_selesai, total_harga, id_customer, id_fasilitas, id_voucher, id_ekstra)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $request->tanggal_booking,
            $request->jumlah_ekstra,
            $request->jam_mulai,
            $request->jam_selesai,
            0, //total harga is calculated with a trigger
            $id_user,
            $request->id_fasilitas,
            $request->id_voucher,
            $request->id_ekstra,
        ]);

         // Retrieve the last inserted ID
        $lastInsertId = DB::select('SELECT LAST_INSERT_ID() as last_id');
        $bookingId = $lastInsertId[0]->last_id;

        return redirect()->route('frontend.checkout', ['id' => $bookingId])->with('success', 'Booking berhasil ditambahkan');
    }

    public function checkout($id)
    {
        $booking = DB::select('select * from booking where id_booking = ?', [$id])[0];
        $fasilitas = DB::select('select * from fasilitas where id_fasilitas = ?', [$booking->id_fasilitas])[0];
        
        // Initialize $voucher and $ekstra as null
        $voucher = null;
        $ekstra = null;

        // Conditionally fetch voucher details if id_voucher is not null
        if (!is_null($booking->id_voucher)) {
            $voucher = DB::select('select * from voucher where id_voucher = ?', [$booking->id_voucher])[0];
        }

        // Conditionally fetch ekstra details if id_ekstra is not null
        if (!is_null($booking->id_ekstra)) {
            $ekstra = DB::select('select * from ekstra where id_ekstra = ?', [$booking->id_ekstra])[0];
        }

        // Assuming customer details are always available
        $customer = DB::select('select * from customer where id_customer = ?', [$booking->id_customer])[0];

        return view('frontend.checkout', compact('booking', 'fasilitas', 'voucher', 'ekstra', 'customer'));
    }
    
    public function updateStatusAndRedirect($id)
    {
        $sql = "UPDATE booking SET status_booking = ? WHERE id_booking = ?";
        DB::update($sql, ['sukses', $id]);

        return redirect('/')->with('success', 'Booking berhasil dibayar');
    }
}
