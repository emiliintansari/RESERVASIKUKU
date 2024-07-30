<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = ['nama_team', 'deskripsi', 'gambar'];

    public function catalog()
    {
        return $this->hashMany(Catalog::class, 'id_team', 'id');
    }
}


