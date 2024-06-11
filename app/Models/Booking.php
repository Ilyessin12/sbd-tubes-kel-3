<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';

    protected $primaryKey = 'id_booking';

    public $timestamps = true;

    protected $fillable = [
        'status_booking',
        'tanggal_booking',
        'jumlah_ekstra',
        'jam_mulai',
        'jam_selesai',
        'total_harga',
        'id_customer',
        'id_fasilitas',
        'id_voucher',
        'id_ekstra',
    ];

    protected $dates = [
        'tanggal_booking',
        'created_at',
        'updated_at',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer');
    }

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class, 'id_fasilitas');
    }

    public function voucher()
    {
        return $this->belongsTo(Voucher::class, 'id_voucher');
    }

    public function ekstra()
    {
        return $this->belongsTo(Ekstra::class, 'id_ekstra');
    }
}