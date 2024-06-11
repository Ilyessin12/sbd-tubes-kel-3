<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstra extends Model
{
    use HasFactory;

    protected $table = 'ekstra';

    protected $primaryKey = 'id_ekstra';

    public $timestamps = true;

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}