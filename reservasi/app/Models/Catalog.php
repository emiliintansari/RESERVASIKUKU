<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // Tambahkan impor ini
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Tambahkan impor ini

class Catalog extends Model
{
    use HasFactory;

    protected $fillable = ['id_team', 'nama_catalog', 'deskripsi', 'harga', 'gambar'];

    // Mendefinisikan relasi dengan Boking_detail
    public function boking_detail(): HasMany
    {
        return $this->hasMany(Boking_detail::class, 'id_catalog', 'id'); // Perbaiki typo: hashMany -> hasMany
    }

    // Mendefinisikan relasi dengan Team
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'id_team', 'id');
    }

    
}

