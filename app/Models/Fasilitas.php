<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = 'fasilitas';

    protected $primaryKey = 'id_fasilitas';

    public $timestamps = true;

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'jenis_kegiatan',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}