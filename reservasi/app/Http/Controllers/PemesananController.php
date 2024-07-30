<?php

namespace App\Http\Controllers;

use App\Models\pemesanan;
use App\Models\Boking_detail;
use App\Models\Boking;
use App\Models\Catalog;
use App\Models\Member;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function view()
        {
            $catalogs = Catalog::paginate(20);
            
            return view('pemesanan.pemesanan', compact('catalogs'));
        }
    
        
}
