<?php

namespace App\Http\Controllers;
use App\Models\Boking_detail;
use App\Models\Boking;
use App\Models\Catalog;
use App\Models\Member;
use App\Models\Team;
use App\Models\User;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /*public function index()
    {
    
        $teams = Team::all();
        $catalogs = Catalog::all();
        //dd($catalog);
        return view('home.index', compact('teams', 'catalogs'));
    }

    public function catalog($id_catalog)
    {
        $catalogs = Catalog::where('id_catalog', $id_catalog)->get();
        return view('home.catalog', compact('catalogs'));
    }*/

    public function index()
    {
        $teams = Team::all();
        $catalogs = Catalog::all();
        return view('home.index', compact('teams', 'catalogs'));
    }
}
