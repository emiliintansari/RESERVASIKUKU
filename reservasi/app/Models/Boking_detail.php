<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boking_detail extends Model
{
    use HasFactory;

    protected $table = 'boking_details';

    protected $fillable = [
        'id_invoice',
        'id_catalog',
        'id_team',
        'jumlah',
        'total',
    ];

    // Relasi dengan Boking
    public function boking()
    {
        return $this->belongsTo(Boking::class, 'id_invoice');
    }

    // Relasi dengan Catalog
    public function catalog()
    {
        return $this->belongsTo(Catalog::class, 'id_catalog');
    }

    // Relasi dengan Team
    public function team()
    {
        return $this->belongsTo(Team::class, 'id_team');
    }
}
