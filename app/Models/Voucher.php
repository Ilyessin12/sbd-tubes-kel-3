<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $table = 'voucher';

    protected $primaryKey = 'id_voucher';

    public $timestamps = true;

    protected $fillable = [
        'nama_voucher',
        'persentase_diskon',
        'tanggal_mulai',
        'tanggal_kadaluarsa',
    ];

    protected $dates = [
        'tanggal_mulai',
        'tanggal_kadaluarsa',
        'created_at',
        'updated_at',
    ];
}