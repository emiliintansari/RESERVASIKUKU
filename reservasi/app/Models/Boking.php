<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boking extends Model
{
    use HasFactory;

    protected $table = 'bokings';

    protected $fillable = [
        'nama_catalog',
        'jumlah',
        'nama',
        'nomor_telepon',
        'tanggal',
        'waktu',
    ];
    public $timestamps=false;
    // Relasi dengan BokingDetail
    

}
